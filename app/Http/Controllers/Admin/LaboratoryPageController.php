<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LaboratoryPageRequest;
use App\Models\Laboratory;
use App\Models\LaboratoryCategory;
use App\Services\Contracts\LaboratoryPageServiceInterface;
use App\Models\LaboratoryPage;
use App\Services\Contracts\LaboratoryServiceInterface;
use App\Traits\FileManagable;

class LaboratoryPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.laboratoryPage.';

    private const TITLE = 'Laboratories page';

    public function __construct(
        private readonly LaboratoryPageServiceInterface $laboratoryPageService,
        private readonly LaboratoryServiceInterface   $laboratoryService,




        ) {
        // $this->authorizeResource(LaboratoryPage::class);
    }
    public function index()
    {
        $laboratoryPage = LaboratoryPage::first();
        $laboratories = $this->laboratoryService->getAll(
            limit: 5,
            columns: ['id','image','is_active'],
            sorting:'-created_at'
        );
        return view(self::PATH . 'edit', [
            'model' => $laboratoryPage,
            'laboratories' => $laboratories,
            'title' => self::TITLE,
        ]);
    }

    public function update(LaboratoryPageRequest $request, LaboratoryPage $laboratory_page)
    {
        $payload = $request->validated();
        $this->laboratoryPageService->update($laboratory_page,$payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }



}
