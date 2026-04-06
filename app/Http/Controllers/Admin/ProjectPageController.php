<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectPageRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Services\Contracts\ProjectPageServiceInterface;
use App\Models\ProjectPage;
use App\Services\Contracts\ProjectServiceInterface;
use App\Traits\FileManagable;

class ProjectPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.projectPage.';

    private const TITLE = 'Projects page';

    public function __construct(
        private readonly ProjectPageServiceInterface $projectPageService,
        private readonly ProjectServiceInterface   $projectService,




        ) {
        // $this->authorizeResource(ProjectPage::class);
    }
    public function index()
    {
        $projectPage = ProjectPage::first();
        $projects = $this->projectService->getAll(
            columns: ['id','image','is_active'],
            sorting:'-created_at'
        );
        return view(self::PATH . 'edit', [
            'model' => $projectPage,
            'projects' => $projects,
            'title' => self::TITLE,
        ]);
    }

    public function update(ProjectPageRequest $request, ProjectPage $project_page)
    {
        $payload = $request->validated();
        $this->projectPageService->update($project_page,$payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }



}
