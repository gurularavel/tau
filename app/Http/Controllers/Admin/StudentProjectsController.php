<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentProjectRequest;
use App\Models\StudentProject;
use App\Models\StudentProjectImage;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\StudentProjectServiceInterface;
use App\Services\StudentProjectCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentProjectsController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.student_projects.';

    private const TITLE = 'Student projects';

    public function __construct(private readonly StudentProjectServiceInterface $studentCubService)
    {
        // $this->authorizeResource(StudentProject::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new StudentProject();
        return view(self::PATH . 'create', [
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentProject $student_project): RedirectResponse
    {
        $this->studentCubService->delete($student_project);

        return redirect()->route('admin.studentProjectPage.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentProject $student_project): View
    {
        $attributes = $student_project::attributes();
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $student_project,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param StudentProjectRequest $request
     * @return View
     */
    public function index(StudentProjectRequest $request): View
    {
        $models = $this->studentCubService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'is_active', 'slug']);
        $attributes = StudentProject::attributes();
        $headerAttributes = StudentProject::headerAttributes();

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
    public function show(StudentProject $student_project): View
    {
        return view(self::PATH . 'show', [
            'model' => $student_project,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentProjectRequest $request
     * @return RedirectResponse
     */
    public function store(StudentProjectRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $student_project = $this->studentCubService->create(storeSlug($payload, StudentProject::class), $request->file('image'));


        return redirect()->route('admin.studentProjectPage.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentProjectRequest $request, StudentProject $student_project)
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->studentCubService->update($student_project, updateSlug($payload, $student_project), $request->file('image'));



        return back()->with('success', __('translate.Successfully completed'));
    }

    public function showImageOrder(StudentProject $student_project): View
    {
        return view('admin.student_projects.order-images', [
            'title' => self::TITLE,
            'model' => $student_project,
            'images' => $student_project->images()->orderBy('order')->get(),
        ]);
    }

    public function updateImageOrder(StudentProject $student_project): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        foreach ($imageOrders as $imageId => $order) {
            StudentProjectImage::where('id', $imageId)
                ->where('student_project_id', $student_project->id)
                ->update(['order' => $order]);
        }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeStudentProjectsMedia()
    {
        $mediaId = request()->mediaId;
        $media = StudentProjectImage::findOrFail($mediaId);

        $this->deleteFile('student_project_images', $media->image);
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }
}
