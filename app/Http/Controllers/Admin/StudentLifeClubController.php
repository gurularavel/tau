<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StudentLifeClubRequest;
use App\Services\Contracts\StudentLifeClubServiceInterface;
use App\Models\StudentLifeClub;
use App\Traits\FileManagable;

class StudentLifeClubController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.studentLifeClub.';

    private const TITLE = 'Student Life Club page';

    public function __construct(
        private readonly StudentLifeClubServiceInterface $studentLifeClubService,
        ) {
    }

    public function index()
    {
        $studentLifeClub = StudentLifeClub::first();
        return view(self::PATH . 'edit', [
            'model' => $studentLifeClub,
            'title' => self::TITLE,
        ]);
    }

    public function update(StudentLifeClubRequest $request, StudentLifeClub $studentLifeClub)
    {
        $payload = $request->validated();
        $this->studentLifeClubService->update($studentLifeClub, $payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }
}
