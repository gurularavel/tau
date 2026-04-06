<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentClubRequest;
use App\Models\StudentClub;
use App\Models\StudentClubImage;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\StudentClubServiceInterface;
use App\Services\StudentClubCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentClubController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.student_clubs.';

    private const TITLE = 'Student Clubs';

    public function __construct(private readonly StudentClubServiceInterface $studentCubService)
    {
        // $this->authorizeResource(StudentClub::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new StudentClub();
        return view(self::PATH . 'create', [
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentClub $student_club): RedirectResponse
    {
        $this->studentCubService->delete($student_club);

        return redirect()->route('admin.studentClubPage.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentClub $student_club): View
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
     * @param StudentClubRequest $request
     * @return View
     */
    public function index(StudentClubRequest $request): View
    {
        $models = $this->studentCubService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'is_active', 'slug']);
        $attributes = StudentClub::attributes();
        $headerAttributes = StudentClub::headerAttributes();

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
    public function show(StudentClub $student_club): View
    {
        return view(self::PATH . 'show', [
            'model' => $student_club,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentClubRequest $request
     * @return RedirectResponse
     */
    public function store(StudentClubRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $student_club = $this->studentCubService->create(storeSlug($payload, StudentClub::class), $request->file('image'));


        return redirect()->route('admin.studentClubPage.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentClubRequest $request, StudentClub $student_club)
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->studentCubService->update($student_club, updateSlug($payload, $student_club), $request->file('image'));



        return back()->with('success', __('translate.Successfully completed'));
    }

    public function showImageOrder(StudentClub $student_club): View
    {
        return view('admin.student_clubs.order-images', [
            'title' => self::TITLE,
            'model' => $student_club,
            'images' => $student_club->images()->orderBy('order')->get(),
        ]);
    }

    public function updateImageOrder(StudentClub $student_club): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        foreach ($imageOrders as $imageId => $order) {
            StudentClubImage::where('id', $imageId)
                ->where('student_club_id', $student_club->id)
                ->update(['order' => $order]);
        }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeStudentClubsMedia()
    {
        $mediaId = request()->mediaId;
        $media = StudentClubImage::findOrFail($mediaId);

        $this->deleteFile('student_club_images', $media->image);
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }
}
