<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GraduateRequest;
use App\Models\Graduate;
use App\Models\GraduateImage;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\GraduateServiceInterface;
use App\Services\GraduateCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GraduateController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.graduates.';

    private const TITLE = 'Graduates';

    public function __construct(private readonly GraduateServiceInterface $studentCubService)
    {
        // $this->authorizeResource(Graduate::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Graduate();
        return view(self::PATH . 'create', [
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Graduate $student_club): RedirectResponse
    {
        $this->studentCubService->delete($student_club);

        return redirect()->route('admin.graduatePage.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Graduate $student_club): View
    {
        $attributes = $student_club::attributes();
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $student_club,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param GraduateRequest $request
     * @return View
     */
    public function index(GraduateRequest $request): View
    {
        $models = $this->studentCubService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'is_active', 'slug']);
        $attributes = Graduate::attributes();
        $headerAttributes = Graduate::headerAttributes();

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
    public function show(Graduate $student_club): View
    {
        return view(self::PATH . 'show', [
            'model' => $student_club,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GraduateRequest $request
     * @return RedirectResponse
     */
    public function store(GraduateRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $student_club = $this->studentCubService->create(storeSlug($payload, Graduate::class), $request->file('image'));


        return redirect()->route('admin.graduatePage.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GraduateRequest $request, Graduate $student_club)
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->studentCubService->update($student_club, updateSlug($payload, $student_club), $request->file('image'));



        return back()->with('success', __('translate.Successfully completed'));
    }

    public function showImageOrder(Graduate $student_club): View
    {
        return view('admin.student_clubs.order-images', [
            'title' => self::TITLE,
            'model' => $student_club,
            'images' => $student_club->images()->orderBy('order')->get(),
        ]);
    }

    public function updateImageOrder(Graduate $student_club): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        foreach ($imageOrders as $imageId => $order) {
            GraduateImage::where('id', $imageId)
                ->where('student_club_id', $student_club->id)
                ->update(['order' => $order]);
        }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeGraduatesMedia()
    {
        $mediaId = request()->mediaId;
        $media = GraduateImage::findOrFail($mediaId);

        $this->deleteFile('student_club_images', $media->image);
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }
}
