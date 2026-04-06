<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Dynamic;
use App\Models\DynamicImage;
use App\Models\DynamicItem;
use App\Models\Page;
use App\Models\Project;
use App\Services\Contracts\PageServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
class PageController extends Controller
{
    private const PATH = 'admin.pages.';

    private const TITLE = 'Pages';

    public function __construct(private readonly PageServiceInterface $pageService)
    {
        $this->authorizeResource(Page::class);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Page();
        $attributes = $model::attributes();

        return view(self::PATH . 'create', [
            'attributes' => $attributes,
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page): RedirectResponse
    {
        $this->pageService->delete($page);

        return redirect()
        ->route('admin.pages.index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page): View
    {
        $attributes = $page::attributes();

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $page,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param PageRequest $request
     * @return View
     */
    public function index(PageRequest $request): View
    {
        $models = $this->pageService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'slug','is_active'],
        );
        $attributes = Page::attributes();
        $headerAttributes = Page::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page): View
    {
        return view(self::PATH . 'show', [
            'model' => $page,
            'title' => self::TITLE,
        ]);
    }
public function update(PageRequest $request, Page $page): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $payload = $request->validated();

            foreach (getLocales() as $locale) {
                $payload['description:'. $locale] = saveImageWithoutBASE64($payload['description:'. $locale] ?? '');
            }

            $this->pageService->update($page, updateSlug($payload, $page),$request->file('image'));

            // Delete marked dynamics
            if ($request->has('delete_dynamics')) {
                foreach ($request->delete_dynamics as $dynamicId) {
                    $dynamicToDelete = Dynamic::find($dynamicId);
                    if ($dynamicToDelete) {
                        // Delete associated images
                        if ($dynamicToDelete->image) {
                            $this->deleteImage($dynamicToDelete->image, 'uploads/dynamics');
                        }
                        $dynamicToDelete->delete();
                    }
                }
            }

            // Delete marked dynamic items
            if ($request->has('delete_dynamic_items')) {
                foreach ($request->delete_dynamic_items as $itemId) {
                    $itemToDelete = DynamicItem::find($itemId);
                    if ($itemToDelete && $itemToDelete->image) {
                        $this->deleteImage($itemToDelete->image, 'uploads/dynamic_items');
                    }
                }
                DynamicItem::whereIn('id', $request->delete_dynamic_items)->delete();
            }

            if ($request->has('dynamics')) {
                $dynamicIds = [];

                foreach ($request->dynamics as $index => $dynamicData) {
                    // Update or create dynamic
                    if (isset($dynamicData['id'])) {
                        $dynamic = Dynamic::find($dynamicData['id']);
                    } else {
                        $dynamic = new Dynamic();
                    }

                    $dynamic->type = $dynamicData['type'];
                    $dynamic->order = $dynamicData['order'] ?? 0;
                    $dynamic->is_active = $dynamicData['is_active'] ?? 1;

                    // Handle single image (type 3)

                    if ($dynamicData['type'] == 3) {
                        if ($request->hasFile("dynamics.{$index}.image")) {
                            // Delete old image if exists
                            if ($dynamic->image) {
                                $this->deleteImage($dynamic->image, 'uploads/dynamics');
                            }

                            // Upload new image
                            $dynamic->image = $this->uploadImage(
                                $request->file("dynamics.{$index}.image"),
                                'uploads/dynamics'
                            );

                        } elseif (isset($dynamicData['keep_image']) && $dynamicData['keep_image'] == '0') {
                            // Delete image if marked for deletion
                            if ($dynamic->image) {
                                $this->deleteImage($dynamic->image, 'uploads/dynamics');
                                $dynamic->image = null;
                            }
                        }
                    }

                    // Handle video (type 4)
                    if ($dynamicData['type'] == 4 && isset($dynamicData['video'])) {
                        $dynamic->video = $dynamicData['video'];
                    }

                    $dynamic->save();

                    // Save translations
                    if (isset($dynamicData['translations'])) {
                        foreach ($dynamicData['translations'] as $locale => $translation) {
                            if (isset($translation['title'])) {
                                $dynamic->translateOrNew($locale)->title = $translation['title'];
                            }
                            if (isset($translation['description'])) {
                                $dynamic->translateOrNew($locale)->description = $translation['description'];
                            }


                        }
                        $dynamic->save();
                    }

                    // Handle multiple images (type 5)
                    if ($dynamicData['type'] == 5) {
                        // Remove images not in keep_images array
                        if (isset($dynamicData['keep_images'])) {
                            $imagesToDelete = $dynamic->images()->whereNotIn('id', $dynamicData['keep_images'])->get();
                            foreach ($imagesToDelete as $img) {
                                $this->deleteImage($img->image, 'uploads/dynamics');
                            }
                            $dynamic->images()->whereNotIn('id', $dynamicData['keep_images'])->delete();
                        } else {
                            foreach ($dynamic->images as $img) {
                                $this->deleteImage($img->image, 'uploads/dynamics');
                            }
                            $dynamic->images()->delete();
                        }

                        // Add new images
                        if ($request->hasFile("dynamics.{$index}.images")) {
                            $existingCount = $dynamic->images()->count();
                            foreach ($request->file("dynamics.{$index}.images") as $imgIndex => $image) {
                                $filename = $this->uploadImage($image, 'uploads/dynamics');

                                DynamicImage::create([
                                    'dynamic_id' => $dynamic->id,
                                    'image' => $filename,
                                    'order' => $existingCount + $imgIndex
                                ]);
                            }
                        }
                    }

                    // Handle dynamic items (type 6)
                    if ($dynamicData['type'] == 6 && isset($dynamicData['items'])) {
                        $itemIds = [];

                        foreach ($dynamicData['items'] as $itemIndex => $itemData) {
                            // Update or create item
                            if (isset($itemData['id'])) {
                                $item = DynamicItem::find($itemData['id']);
                            } else {
                                $item = new DynamicItem();
                                $item->dynamic_id = $dynamic->id;
                            }

                            $item->order = $itemData['order'] ?? 0;
                            $item->is_active = $itemData['is_active'] ?? 1;
                            $item->type = $itemData['type'] ?? 1;
                            // Handle item image
                            if ($request->hasFile("dynamics.{$index}.items.{$itemIndex}.image")) {
                                // Delete old image
                                if ($item->image) {
                                    $this->deleteImage($item->image, 'uploads/dynamic_items');
                                }

                                // Upload new image
                                $item->image = $this->uploadImage(
                                    $request->file("dynamics.{$index}.items.{$itemIndex}.image"),
                                    'uploads/dynamic_items'
                                );

                            } elseif (isset($itemData['keep_image']) && $itemData['keep_image'] == '0') {
                                // Delete if marked for deletion
                                if ($item->image) {
                                    $this->deleteImage($item->image, 'uploads/dynamic_items');
                                    $item->image = null;
                                }
                            }

                            $item->save();

                            // Save item translations
                            if (isset($itemData['translations'])) {
                                foreach ($itemData['translations'] as $locale => $translation) {
                                    $item->translateOrNew($locale)->title = $translation['title'] ?? null;
                                    $item->translateOrNew($locale)->description = $translation['description'] ?? null;
                                    $item->translateOrNew($locale)->phone = $translation['phone'] ?? null;
                                    $item->translateOrNew($locale)->email = $translation['email'] ?? null;
                                    $item->translateOrNew($locale)->name = $translation['name'] ?? null;
                                    $item->translateOrNew($locale)->profession = $translation['profession'] ?? null;
                                }
                                $item->save();
                            }

                            $itemIds[] = $item->id;
                        }

                        $dynamic->dynamic_item_ids = $itemIds;
                        $dynamic->save();
                    }

                    $dynamicIds[] = $dynamic->id;
                }

                $page->dynamic_ids = $dynamicIds;
                $page->save();
            }

            DB::commit();

            return redirect()->route('admin.pages.edit', $page->id)->with('success', 'Page updated successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function store(PageRequest $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $payload = $request->validated();

            foreach (getLocales() as $locale) {
                $payload['description:'. $locale] = saveImageWithoutBASE64($payload['description:'. $locale] ?? '');
            }

            $page = $this->pageService->create(storeSlug($payload, Page::class),$request->file('image'));

            // Process dynamics if they exist
            if ($request->has('dynamics')) {
                $dynamicIds = [];

                foreach ($request->dynamics as $index => $dynamicData) {
                    $dynamic = new Dynamic();
                    $dynamic->type = $dynamicData['type'];
                    $dynamic->order = $dynamicData['order'] ?? 0;
                    $dynamic->is_active = $dynamicData['is_active'] ?? 1;

                    // Handle image for type 3
                    if ($dynamicData['type'] == 3 && $request->hasFile("dynamics.{$index}.image")) {
                        $dynamic->image = $this->uploadImage(
                            $request->file("dynamics.{$index}.image"),
                            'uploads/dynamics'
                        );
                    }

                    // Handle video for type 4
                    if ($dynamicData['type'] == 4 && isset($dynamicData['video'])) {
                        $dynamic->video = $dynamicData['video'];
                    }

                    $dynamic->save();

                    // Save translations
                    if (isset($dynamicData['translations'])) {
                        foreach ($dynamicData['translations'] as $locale => $translation) {
                            if (isset($translation['title'])) {
                                $dynamic->translateOrNew($locale)->title = $translation['title'];
                            }
                            if (isset($translation['description'])) {
                                $dynamic->translateOrNew($locale)->description = $translation['description'];
                            }
                        }
                        $dynamic->save();
                    }

                    // Handle multiple images for type 5
                    if ($dynamicData['type'] == 5 && $request->hasFile("dynamics.{$index}.images")) {
                        foreach ($request->file("dynamics.{$index}.images") as $imgIndex => $image) {
                            $filename = $this->uploadImage($image, 'uploads/dynamics');

                            DynamicImage::create([
                                'dynamic_id' => $dynamic->id,
                                'image' => $filename,
                                'order' => $imgIndex
                            ]);
                        }
                    }

                    // Handle dynamic items for type 6
                    if ($dynamicData['type'] == 6 && isset($dynamicData['items'])) {
                        $itemIds = [];

                        foreach ($dynamicData['items'] as $itemIndex => $itemData) {
                            $item = new DynamicItem();
                            $item->dynamic_id = $dynamic->id;
                            $item->order = $itemData['order'] ?? 0;
                            $item->is_active = $itemData['is_active'] ?? 1;
                            $item->type = $itemData['type'] ?? 1;

                            // Handle item image
                            if ($request->hasFile("dynamics.{$index}.items.{$itemIndex}.image")) {
                                $item->image = $this->uploadImage(
                                    $request->file("dynamics.{$index}.items.{$itemIndex}.image"),
                                    'uploads/dynamic_items'
                                );
                            }

                            $item->save();

                            // Save item translations
                            if (isset($itemData['translations'])) {
                                foreach ($itemData['translations'] as $locale => $translation) {
                                    $item->translateOrNew($locale)->title = $translation['title'] ?? null;
                                    $item->translateOrNew($locale)->description = $translation['description'] ?? null;
                                    $item->translateOrNew($locale)->phone = $translation['phone'] ?? null;
                                    $item->translateOrNew($locale)->email = $translation['email'] ?? null;
                                    $item->translateOrNew($locale)->name = $translation['name'] ?? null;
                                    $item->translateOrNew($locale)->profession = $translation['profession'] ?? null;
                                }
                                $item->save();
                            }

                            $itemIds[] = $item->id;
                        }

                        $dynamic->dynamic_item_ids = $itemIds;
                        $dynamic->save();
                    }

                    $dynamicIds[] = $dynamic->id;
                }

                $page->dynamic_ids = $dynamicIds;
                $page->save();
            }

            DB::commit();

            return redirect()->route('admin.pages.edit', $page)->with('success', 'Page created successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Upload image to public folder
     */
    private function uploadImage($file, $folder = 'uploads/dynamics')
    {
        if (!$file) {
            return null;
        }

        // Generate unique filename
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Define public path
        $destinationPath = public_path($folder);

        // Create folder if not exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Move file
        $file->move($destinationPath, $filename);

        return $filename;
    }

    /**
     * Delete image from public folder
     */
    private function deleteImage($filename, $folder = 'uploads/dynamics')
    {
        if (!$filename) {
            return;
        }

        $filePath = public_path($folder . '/' . $filename);

        if (File::exists($filePath)) {
            File::delete($filePath);
        }
    }

        public function updateDynamicsLayout(Request $request)
    {
        $request->validate([
            'layout' => 'required|array',
            'layout.*.id' => 'required|exists:dynamics,id',
            'layout.*.layout_row' => 'required|integer|min:1',
            'layout.*.layout_column' => 'required|integer|min:1',
            'layout.*.layout_width' => 'required|in:half,full',
        ]);

        try {
            foreach ($request->layout as $item) {
                Dynamic::where('id', $item['id'])
                    ->update([
                        'layout_row' => $item['layout_row'],
                        'layout_column' => $item['layout_column'],
                        'layout_width' => $item['layout_width'],
                    ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Layout updated successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating layout: ' . $e->getMessage()
            ], 500);
        }
    }

}
