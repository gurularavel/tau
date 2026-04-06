<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LaboratoryRequest;
use App\Models\Laboratory;
use App\Models\LaboratoryImage;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\LaboratoryServiceInterface;
use App\Services\LaboratoryCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LaboratoryController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.laboratories.';

    private const TITLE = 'Laboratories';

    public function __construct(private readonly LaboratoryServiceInterface $laboratoryService)
    {
        // $this->authorizeResource(Laboratory::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Laboratory();
        return view(self::PATH . 'create', [
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratory): RedirectResponse
    {
        $this->laboratoryService->delete($laboratory);

        return redirect()->route('admin.laboratoryPage.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratory $laboratory): View
    {
        $attributes = $laboratory::attributes();
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $laboratory,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param LaboratoryRequest $request
     * @return View
     */
    public function index(LaboratoryRequest $request): View
    {
        $models = $this->laboratoryService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'is_active', 'slug']);
        $attributes = Laboratory::attributes();
        $headerAttributes = Laboratory::headerAttributes();

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
    public function show(Laboratory $laboratory): View
    {
        return view(self::PATH . 'show', [
            'model' => $laboratory,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LaboratoryRequest $request
     * @return RedirectResponse
     */
    public function store(LaboratoryRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $laboratory = $this->laboratoryService->create(storeSlug($payload, Laboratory::class), $request->file('image'));


        return redirect()->route('admin.laboratoryPage.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LaboratoryRequest $request, Laboratory $laboratory)
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->laboratoryService->update($laboratory, updateSlug($payload, $laboratory), $request->file('image'));



        return back()->with('success', __('translate.Successfully completed'));
    }

    public function showImageOrder(Laboratory $laboratory): View
    {
        return view('admin.laboratories.order-images', [
            'title' => self::TITLE,
            'model' => $laboratory,
            'images' => $laboratory->images()->orderBy('order')->get(),
        ]);
    }

    public function updateImageOrder(Laboratory $laboratory): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        foreach ($imageOrders as $imageId => $order) {
            LaboratoryImage::where('id', $imageId)
                ->where('laboratory_id', $laboratory->id)
                ->update(['order' => $order]);
        }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeLaboratoriesMedia()
    {
        $mediaId = request()->mediaId;
        $media = LaboratoryImage::findOrFail($mediaId);

        $this->deleteFile('laboratory_images', $media->image);
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }
}
