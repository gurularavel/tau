<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentProjectPageRequest;
use App\Models\StudentProject;
use App\Models\StudentProjectCategory;
use App\Services\Contracts\StudentProjectPageServiceInterface;
use App\Models\StudentProjectPage;
use App\Services\Contracts\StudentProjectServiceInterface;
use App\Traits\FileManagable;

class StudentProjectPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.studentProjectPage.';

    private const TITLE = 'Student Projects page';

    public function __construct(
        private readonly StudentProjectPageServiceInterface $studentProjectPageService,
        private readonly StudentProjectServiceInterface   $studentProjectService,




        ) {
        // $this->authorizeResource(StudentProjectPage::class);
    }
    public function index()
    {
        $studentProjectPage = StudentProjectPage::first();
        $studentProjects = $this->studentProjectService->getAll(
            limit: 5,
            columns: ['id','image','is_active'],
            sorting:'-created_at'
        );
        return view(self::PATH . 'edit', [
            'model' => $studentProjectPage,
            'studentProjects' => $studentProjects,
            'title' => self::TITLE,
        ]);
    }

    public function update(StudentProjectPageRequest $request, StudentProjectPage $studentProject_page)
    {
        $payload = $request->validated();
        $this->studentProjectPageService->update($studentProject_page,$payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }



}
