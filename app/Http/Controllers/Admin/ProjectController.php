<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\ProjectServiceInterface;
use App\Services\ProjectCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.projects.';

    private const TITLE = 'Projects';

    public function __construct(private readonly ProjectServiceInterface $projectService, private readonly ProjectCategoryService $categoryService)
    {
        $this->authorizeResource(Project::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Project();
        $categories = $this->categoryService->getAll(columns: ['id'], conditions: [['is_active', '=', ProjectCategory::IS_ACTIVE]]);
        return view(self::PATH . 'create', [
            'model' => $model,
            'categories' => $categories,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $this->projectService->delete($project);

        return redirect()->route('admin.projects.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project): View
    {
        $attributes = $project::attributes();
        $categories = $this->categoryService->getAll(columns: ['id'], conditions: [['is_active', '=', ProjectCategory::IS_ACTIVE]]);
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'categories' => $categories,
            'model' => $project,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param ProjectRequest $request
     * @return View
     */
    public function index(ProjectRequest $request): View
    {
        $models = $this->projectService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'is_active', 'slug']);
        $attributes = Project::attributes();
        $headerAttributes = Project::headerAttributes();

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
    public function show(Project $project): View
    {
        return view(self::PATH . 'show', [
            'model' => $project,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     * @return RedirectResponse
     */
    public function store(ProjectRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $project = $this->projectService->create(storeSlug($payload, Project::class), $request->file('image'));

        foreach ($request->project_items ?? [] as $itemData) {
            $item = $project->items()->create();

            foreach ($itemData as $locale => $data) {
                if (!empty($data['title'])) {
                    $item->translateOrNew($locale)->title = $data['title'];
                }
            }

            $item->save();
        }

        return redirect()->route('admin.projects.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->projectService->update($project, updateSlug($payload, $project), $request->file('image'));

        $project->items()->delete();

        foreach ($request->project_items ?? [] as $itemData) {
            $item = $project->items()->create();

            foreach ($itemData as $locale => $data) {
                if (!empty($data['title'])) {
                    $item->translateOrNew($locale)->title = $data['title'];
                }
            }

            $item->save();
        }

        return back()->with('success', __('translate.Successfully completed'));
    }

    public function showImageOrder(Project $project): View
    {
        return view('admin.projects.order-images', [
            'title' => self::TITLE,
            'model' => $project,
            'images' => $project->images()->orderBy('order')->get(),
        ]);
    }

    public function updateImageOrder(Project $project): RedirectResponse
    {
        $imageOrders = request('imageOrders');

        foreach ($imageOrders as $imageId => $order) {
            ProjectImage::where('id', $imageId)
                ->where('project_id', $project->id)
                ->update(['order' => $order]);
        }

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }

    public function removeProjectsMedia()
    {
        $mediaId = request()->mediaId;
        $media = ProjectImage::findOrFail($mediaId);

        $this->deleteFile('project_images', $media->image);
        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully']);
    }
}
