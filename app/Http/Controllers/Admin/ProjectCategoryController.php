<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategoryRequest;
use App\Models\ProjectCategory;
use App\Services\Contracts\ProjectCategoryServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectCategoryController extends Controller
{
    private const PATH = 'admin.project_categories.';

    private const TITLE = 'Project categories';

    public function __construct(private readonly ProjectCategoryServiceInterface $projectCategoryService)
    {
        $this->authorizeResource(ProjectCategory::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new ProjectCategory();
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
    public function destroy(ProjectCategory $project_category): RedirectResponse
    {
        $this->projectCategoryService->delete($project_category);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectCategory $project_category): View
    {
        $attributes = $project_category::attributes();

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $project_category,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param ProjectCategoryRequest $request
     * @return View
     */
    public function index(ProjectCategoryRequest $request): View
    {
        $models = $this->projectCategoryService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'is_active'],
        );
        $attributes = ProjectCategory::attributes();
        $headerAttributes = ProjectCategory::headerAttributes();

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
    public function show(ProjectCategory $project_category): View
    {
        return view(self::PATH . 'show', [
            'model' => $project_category,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(ProjectCategoryRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->projectCategoryService->create(storeSlug($payload, ProjectCategory::class));

        return redirect()
            ->route('admin.project_categories.index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectCategoryRequest $request, ProjectCategory $project_category): RedirectResponse
    {
        $payload = $request->validated();

        $this->projectCategoryService->update($project_category, updateSlug($payload, $project_category));

        return redirect()
            ->route('admin.project_categories.edit', $project_category)
            ->with('success', __('translate.Successfully completed'));
    }
}
