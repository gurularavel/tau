<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramRequest;
use App\Models\Dynamic;
use App\Models\DynamicImage;
use App\Models\DynamicItem;
use App\Models\Program;
use App\Models\ProgramDynamic;
use App\Models\ProgramDynamicImage;
use App\Models\ProgramDynamicItem;
use App\Models\Project;
use App\Services\Contracts\ProgramServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
class ProgramController extends Controller
{
    private const PATH = 'admin.programs.';

    private const TITLE = 'Programs';

    public function __construct(private readonly ProgramServiceInterface $programService)
    {
        // $this->authorizeResource(Program::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Program();
        $attributes = $model::attributes();

        $programs = Program::with('translations')
            ->get()
            ->map(function ($program) {
                return [
                    'id' => $program->id,
                    'description' => $program->title, // accessor varsa
                ];
            })
            ->toArray();
        return view(self::PATH . 'create', [
            'attributes' => $attributes,
            'model' => $model,
            'title' => self::TITLE,
            'programs' => $programs,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program): RedirectResponse
    {
        $this->programService->delete($program);
        $dynamicIds = $program->program_dynamic_ids ?? [];

        if (!empty($dynamicIds)) {
            ProgramDynamic::whereIn('id', $dynamicIds)->delete();
        }

        return redirect()->route('admin.programs.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program): View
    {
        $attributes = $program::attributes();

        $programs = Program::where('id', '!=', $program->id)
            ->with('translations')
            ->get()
            ->map(function ($program) {
                return [
                    'id' => $program->id,
                    'description' => $program->title, // accessor varsa
                ];
            })
            ->toArray();
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $program,
            'title' => self::TITLE,
            'programs' => $programs,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param ProgramRequest $request
     * @return View
     */
    public function index(ProgramRequest $request): View
    {
        $models = $this->programService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'slug', 'is_active']);
        $attributes = Program::attributes();
        $headerAttributes = Program::headerAttributes();

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
    public function show(Program $program): View
    {
        return view(self::PATH . 'show', [
            'model' => $program,
            'title' => self::TITLE,
        ]);
    }
    public function update(ProgramRequest $request, Program $program): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $payload = $request->validated();

            foreach (getLocales() as $locale) {
                $payload['description:' . $locale] = saveImageWithoutBASE64($payload['description:' . $locale] ?? '');
            }

            $this->programService->update($program, updateSlug($payload, $program), $request->file('image'), $request->file('image2'));

            // Delete marked dynamics
            if ($request->has('delete_program_dynamics')) {
                foreach ($request->delete_dynamics as $dynamicId) {
                    $dynamicToDelete = ProgramDynamic::find($dynamicId);
                    if ($dynamicToDelete) {
                        // Delete associated images
                        if ($dynamicToDelete->image) {
                            $this->deleteImage($dynamicToDelete->image, 'uploads/program_dynamics');
                        }
                        $dynamicToDelete->delete();
                    }
                }
            }

            // Delete marked dynamic items
            if ($request->has('delete_program_dynamic_items')) {
                foreach ($request->delete_program_dynamic_items as $itemId) {
                    $itemToDelete = ProgramDynamicItem::find($itemId);
                    if ($itemToDelete && $itemToDelete->image) {
                        $this->deleteImage($itemToDelete->image, 'uploads/program_dynamic_items');
                    }
                }
                ProgramDynamicItem::whereIn('id', $request->delete_program_dynamic_items)->delete();
            }

            if ($request->has('program_dynamics')) {
                $dynamicIds = [];

                foreach ($request->program_dynamics as $index => $dynamicData) {
                    // Update or create dynamic
                    if (isset($dynamicData['id'])) {
                        $dynamic = ProgramDynamic::find($dynamicData['id']);
                    } else {
                        $dynamic = new ProgramDynamic();
                    }

                    $dynamic->type = $dynamicData['type'];
                    $dynamic->order = $dynamicData['order'] ?? 0;
                    $dynamic->is_active = $dynamicData['is_active'] ?? 1;

                    // Handle single image (type 3)

                    if ($dynamicData['type'] == 3) {
                        if ($request->hasFile("program_dynamics.{$index}.image")) {
                            // Delete old image if exists
                            if ($dynamic->image) {
                                $this->deleteImage($dynamic->image, 'uploads/program_dynamics');
                            }

                            // Upload new image
                            $dynamic->image = $this->uploadImage($request->file("program_dynamics.{$index}.image"), 'uploads/program_dynamics');
                        } elseif (isset($dynamicData['keep_image']) && $dynamicData['keep_image'] == '0') {
                            // Delete image if marked for deletion
                            if ($dynamic->image) {
                                $this->deleteImage($dynamic->image, 'uploads/program_dynamics');
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
                                $this->deleteImage($img->image, 'uploads/program_dynamics');
                            }
                            $dynamic->images()->whereNotIn('id', $dynamicData['keep_images'])->delete();
                        } else {
                            foreach ($dynamic->images as $img) {
                                $this->deleteImage($img->image, 'uploads/program_dynamics');
                            }
                            $dynamic->images()->delete();
                        }

                        // Add new images
                        if ($request->hasFile("program_dynamics.{$index}.images")) {
                            $existingCount = $dynamic->images()->count();
                            foreach ($request->file("program_dynamics.{$index}.images") as $imgIndex => $image) {
                                $filename = $this->uploadImage($image, 'uploads/program_dynamics');

                                ProgramDynamicImage::create([
                                    'program_dynamic_id' => $dynamic->id,
                                    'image' => $filename,
                                    'order' => $existingCount + $imgIndex,
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
                                $item = ProgramDynamicItem::find($itemData['id']);
                            } else {
                                $item = new ProgramDynamicItem();
                                $item->program_dynamic_id = $dynamic->id;
                            }
                            $item->order = $itemData['order'] ?? 0;
                            $item->is_active = $itemData['is_active'] ?? 1;
                            $item->hour = $itemData['hour'] ?? null;
                            $item->room = $itemData['room'] ?? null;
                            $item->code = $itemData['code'] ?? null;
                            $item->credit = $itemData['credit'] ?? null;
                            $item->type = $itemData['type'] ?? null;
                            $item->email = $itemData['email'] ?? null;
                            $item->phone = $itemData['phone'] ?? null;
                            $item->url = $itemData['url'] ?? null;

                            $item->deadline = $itemData['deadline'] ?? now();
                            $item->created_at = $itemData['created_at'] ?? now();
                            // Handle item image
                            if ($request->hasFile("program_dynamics.{$index}.items.{$itemIndex}.image")) {
                                // Delete old image
                                if ($item->image) {
                                    $this->deleteImage($item->image, 'uploads/program_dynamic_items');
                                }

                                // Upload new image
                                $item->image = $this->uploadImage($request->file("program_dynamics.{$index}.items.{$itemIndex}.image"), 'uploads/program_dynamic_items');
                            } elseif (isset($itemData['keep_image']) && $itemData['keep_image'] == '0') {
                                // Delete if marked for deletion
                                if ($item->image) {
                                    $this->deleteImage($item->image, 'uploads/program_dynamic_items');
                                    $item->image = null;
                                }
                            }

                            $item->save();

                            // Save item translations
                            if (isset($itemData['translations'])) {
                                foreach ($itemData['translations'] as $locale => $translation) {
                                    $item->translateOrNew($locale)->title = $translation['title'] ?? null;
                                    $item->translateOrNew($locale)->description = $translation['description'] ?? null;
                                    $item->translateOrNew($locale)->name = $translation['name'] ?? null;
                                    $item->translateOrNew($locale)->profession = $translation['profession'] ?? null;
                                    $item->translateOrNew($locale)->subject_name = $translation['subject_name'] ?? null;
                                    $item->translateOrNew($locale)->education_type = $translation['education_type'] ?? null;
                                    $item->translateOrNew($locale)->examine_type = $translation['profession'] ?? null;
                                    $item->translateOrNew($locale)->day = $translation['day'] ?? null;
                                    $item->translateOrNew($locale)->professor = $translation['professor'] ?? null;
                                    $item->translateOrNew($locale)->subtitle = $translation['subtitle'] ?? null;
                                }
                                $item->save();
                            }

                            $itemIds[] = $item->id;
                        }

                        $dynamic->program_dynamic_item_ids = $itemIds;
                        $dynamic->save();
                    }

                    $dynamicIds[] = $dynamic->id;
                }

                $program->program_dynamic_ids = $dynamicIds;
                $program->save();
            }

            DB::commit();

            return redirect()->route('admin.programs.edit', $program->id)->with('success', 'Program updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }
    }

    public function store(ProgramRequest $request): RedirectResponse
    {
        DB::beginTransaction();

        try {
            $payload = $request->validated();

            foreach (getLocales() as $locale) {
                $payload['description:' . $locale] = saveImageWithoutBASE64($payload['description:' . $locale] ?? '');
            }

            $program = $this->programService->create(storeSlug($payload, Program::class), $request->file('image'), $request->file('image2'));

            DB::commit();

            return redirect()->route('admin.programs.edit', $program)->with('success', 'Program created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
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

    public function duplicate(Program $program): RedirectResponse
    {
        DB::beginTransaction();

        try {
            // Clone program
            $newProgram = $program->replicate();
            $newProgram->slug = $program->slug . '-copy-' . time();
            $newProgram->is_active = 0;
            $newProgram->program_dynamic_ids = null;
            $newProgram->save();

            // Copy translations
            foreach ($program->translations as $translation) {
                $newProgram->translateOrNew($translation->locale)->title = $translation->title;
                $newProgram->translateOrNew($translation->locale)->content = $translation->content;
                $newProgram->translateOrNew($translation->locale)->meta_title = $translation->meta_title;
                $newProgram->translateOrNew($translation->locale)->meta_description = $translation->meta_description;
                $newProgram->translateOrNew($translation->locale)->meta_keywords = $translation->meta_keywords;
            }
            $newProgram->save();

            // Clone program dynamics
            $oldDynamicIds = $program->program_dynamic_ids ?? [];
            if (!empty($oldDynamicIds)) {
                $dynamics = ProgramDynamic::with(['translations', 'images', 'items.translations'])
                    ->whereIn('id', $oldDynamicIds)
                    ->get()
                    ->keyBy('id');

                $newDynamicIds = [];

                foreach ($oldDynamicIds as $oldId) {
                    $dynamic = $dynamics[$oldId] ?? null;
                    if (!$dynamic) continue;

                    $newDynamic = $dynamic->replicate();
                    $newDynamic->program_dynamic_item_ids = null;
                    $newDynamic->save();

                    // Copy dynamic translations
                    foreach ($dynamic->translations as $t) {
                        $newDynamic->translateOrNew($t->locale)->title = $t->title;
                        $newDynamic->translateOrNew($t->locale)->description = $t->description;
                    }
                    $newDynamic->save();

                    // Copy images (type 5)
                    foreach ($dynamic->images as $img) {
                        ProgramDynamicImage::create([
                            'program_dynamic_id' => $newDynamic->id,
                            'image' => $img->image,
                            'order' => $img->order,
                        ]);
                    }

                    // Copy items (type 6)
                    $newItemIds = [];
                    foreach ($dynamic->items as $item) {
                        $newItem = $item->replicate();
                        $newItem->program_dynamic_id = $newDynamic->id;
                        $newItem->save();

                        foreach ($item->translations as $t) {
                            $newItem->translateOrNew($t->locale)->title = $t->title ?? null;
                            $newItem->translateOrNew($t->locale)->description = $t->description ?? null;
                            $newItem->translateOrNew($t->locale)->name = $t->name ?? null;
                            $newItem->translateOrNew($t->locale)->profession = $t->profession ?? null;
                            $newItem->translateOrNew($t->locale)->subject_name = $t->subject_name ?? null;
                            $newItem->translateOrNew($t->locale)->education_type = $t->education_type ?? null;
                            $newItem->translateOrNew($t->locale)->subtitle = $t->subtitle ?? null;
                            $newItem->translateOrNew($t->locale)->day = $t->day ?? null;
                            $newItem->translateOrNew($t->locale)->professor = $t->professor ?? null;
                        }
                        $newItem->save();

                        $newItemIds[] = $newItem->id;
                    }

                    if (!empty($newItemIds)) {
                        $newDynamic->program_dynamic_item_ids = $newItemIds;
                        $newDynamic->save();
                    }

                    $newDynamicIds[] = $newDynamic->id;
                }

                $newProgram->program_dynamic_ids = $newDynamicIds;
                $newProgram->save();
            }

            DB::commit();

            return redirect()->route('admin.programs.edit', $newProgram->id)
                ->with('success', __('translate.Successfully completed'));

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updateDynamicsLayout(Request $request)
    {
        $request->validate([
            'layout' => 'required|array',
            'layout.*.id' => 'required|exists:program_dynamics,id',
            'layout.*.layout_row' => 'required|integer|min:1',
            'layout.*.layout_column' => 'required|integer|min:1',
            'layout.*.layout_width' => 'required|in:half,full',
        ]);

        try {
            foreach ($request->layout as $item) {
                ProgramDynamic::where('id', $item['id'])->update([
                    'layout_row' => $item['layout_row'],
                    'layout_column' => $item['layout_column'],
                    'layout_width' => $item['layout_width'],
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Layout updated successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Error updating layout: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }
}
