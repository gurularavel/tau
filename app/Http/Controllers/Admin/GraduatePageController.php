<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GraduatePageRequest;
use App\Models\Graduate;
use App\Models\GraduateCategory;
use App\Services\Contracts\GraduatePageServiceInterface;
use App\Models\GraduatePage;
use App\Services\Contracts\GraduateServiceInterface;
use App\Traits\FileManagable;

class GraduatePageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.graduatePage.';

    private const TITLE = 'Graduates page';

    public function __construct(
        private readonly GraduatePageServiceInterface $graduatePageService,
        private readonly GraduateServiceInterface   $graduateService,




        ) {
        // $this->authorizeResource(GraduatePage::class);
    }
    public function index()
    {
        $graduatePage = GraduatePage::first();
        $graduates = $this->graduateService->getAll(
            columns: ['id','image','is_active'],
            sorting:'-created_at'
        );
        return view(self::PATH . 'edit', [
            'model' => $graduatePage,
            'graduates' => $graduates,
            'title' => self::TITLE,
        ]);
    }

    public function update(GraduatePageRequest $request, GraduatePage $graduate_page)
    {
        $payload = $request->validated();
        $this->graduatePageService->update($graduate_page,$payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }



}
