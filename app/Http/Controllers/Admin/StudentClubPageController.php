<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentClubPageRequest;
use App\Models\StudentClub;
use App\Models\StudentClubCategory;
use App\Services\Contracts\StudentClubPageServiceInterface;
use App\Models\StudentClubPage;
use App\Services\Contracts\StudentClubServiceInterface;
use App\Traits\FileManagable;

class StudentClubPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.studentClubPage.';

    private const TITLE = 'Student Clubs page';

    public function __construct(
        private readonly StudentClubPageServiceInterface $studentClubPageService,
        private readonly StudentClubServiceInterface   $studentClubService,




        ) {
        // $this->authorizeResource(StudentClubPage::class);
    }
    public function index()
    {
        $studentClubPage = StudentClubPage::first();
        $studentClubs = $this->studentClubService->getAll(
            limit: 5,
            columns: ['id','image','is_active'],
            sorting:'-created_at'
        );
        return view(self::PATH . 'edit', [
            'model' => $studentClubPage,
            'studentClubs' => $studentClubs,
            'title' => self::TITLE,
        ]);
    }

    public function update(StudentClubPageRequest $request, StudentClubPage $studentClub_page)
    {
        $payload = $request->validated();
        $this->studentClubPageService->update($studentClub_page,$payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }



}
