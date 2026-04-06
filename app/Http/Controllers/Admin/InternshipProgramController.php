<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InternshipProgramRequest;
use App\Models\InternshipProgram;
use App\Models\InternshipProgramCategory;
use App\Models\InternshipProgramImage;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\InternshipProgramServiceInterface;
use App\Services\InternshipProgramCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InternshipProgramController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.internship_programs.';

    private const TITLE = 'Internship Programs';

    public function __construct(private readonly InternshipProgramServiceInterface $internshipProgramService)
    {
        // $this->authorizeResource(InternshipProgram::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new InternshipProgram();
        return view(self::PATH . 'create', [
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InternshipProgram $internshipProgram): RedirectResponse
    {
        $this->internshipProgramService->delete($internshipProgram);

        return redirect()->route('admin.internship_programs.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InternshipProgram $internshipProgram): View
    {
        $attributes = $internshipProgram::attributes();
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $internshipProgram,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param InternshipProgramRequest $request
     * @return View
     */
    public function index(InternshipProgramRequest $request): View
    {
        $models = $this->internshipProgramService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'is_active', 'slug']);
        $attributes = InternshipProgram::attributes();
        $headerAttributes = InternshipProgram::headerAttributes();

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
    public function show(InternshipProgram $internshipProgram): View
    {
        return view(self::PATH . 'show', [
            'model' => $internshipProgram,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InternshipProgramRequest $request
     * @return RedirectResponse
     */
    public function store(InternshipProgramRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $internshipProgram = $this->internshipProgramService->create(storeSlug($payload, InternshipProgram::class), $request->file('image'));

        foreach ($request->internship_items ?? [] as $itemData) {
            $item = $internshipProgram->items()->create();

            foreach ($itemData as $locale => $data) {
                if (!empty($data['title'])) {
                    $item->translateOrNew($locale)->title = $data['title'];
                }
            }

            $item->save();
        }

        foreach ($request->advantage_items ?? [] as $advantageItemData) {
            $advantageItem = $internshipProgram->advantageItems()->create();

            foreach ($advantageItemData as $locale => $data) {
                if (!empty($data['title'])) {
                    $advantageItem->translateOrNew($locale)->title = $data['title'];
                }
            }

            $advantageItem->save();
        }


        return redirect()->route('admin.internship_programs.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InternshipProgramRequest $request, InternshipProgram $internshipProgram)
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->internshipProgramService->update($internshipProgram, updateSlug($payload, $internshipProgram), $request->file('image'));

        $internshipProgram->items()->delete();

        foreach ($request->internship_items ?? [] as $itemData) {
            $item = $internshipProgram->items()->create();

            foreach ($itemData as $locale => $data) {
                if (!empty($data['title'])) {
                    $item->translateOrNew($locale)->title = $data['title'];
                }
            }

            $item->save();
        }

        $internshipProgram->advantageItems()->delete();

        foreach ($request->advantage_items ?? [] as $advantageItemData) {
            $advantageItem = $internshipProgram->advantageItems()->create();

            foreach ($advantageItemData as $locale => $data) {
                if (!empty($data['title'])) {
                    $advantageItem->translateOrNew($locale)->title = $data['title'];
                }
            }

            $advantageItem->save();
        }

        return back()->with('success', __('translate.Successfully completed'));
    }

    public function showImageOrder(InternshipProgram $internshipProgram): View
    {
        return view('admin.internship_programs.order-images', [
            'title' => self::TITLE,
            'model' => $internshipProgram,
            'images' => $internshipProgram->images()->orderBy('order')->get(),
        ]);
    }

    public function updateImageOrder(InternshipProgram $internshipProgram): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        // foreach ($imageOrders as $imageId => $order) {
        //     InternshipProgramImage::where('id', $imageId)
        //         ->where('internshipProgram_id', $internshipProgram->id)
        //         ->update(['order' => $order]);
        // }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeInternshipProgramsMedia()
    {
        // $mediaId = request()->mediaId;
        // $media = InternshipProgramImage::findOrFail($mediaId);

        // $this->deleteFile('internship_program_images', $media->image);
        // $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }
}
