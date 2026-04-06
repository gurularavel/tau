<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InternshipProgramPageRequest;
use App\Models\InternshipProgram;
use App\Models\InternshipProgramCategory;
use App\Services\Contracts\InternshipProgramPageServiceInterface;
use App\Models\InternshipProgramPage;
use App\Services\Contracts\InternshipProgramServiceInterface;
use App\Services\Contracts\PartnerServiceInterface;
use App\Traits\FileManagable;

class InternshipProgramPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.internshipProgramPage.';

    private const TITLE = 'Internship programs page';

    public function __construct(private readonly InternshipProgramPageServiceInterface $internshipProgramPageService,
    private readonly InternshipProgramServiceInterface $internshipProgramService,
        private readonly PartnerServiceInterface $partnerService



    )
    {
        // $this->authorizeResource(InternshipProgramPage::class);
    }
    public function index()
    {
        $internshipProgramPage = InternshipProgramPage::first();
        $internshipPrograms = $this->internshipProgramService->getAll(columns: ['id', 'image', 'is_active'], sorting: '-created_at');
        $partners = $this->partnerService->getAll(columns: ['id', 'image', 'is_active'], sorting: '-created_at');

        return view(self::PATH . 'edit', [
            'model' => $internshipProgramPage,
            'internshipPrograms' => $internshipPrograms,
            'partners' => $partners,
            'title' => self::TITLE,
        ]);
    }

    public function update(InternshipProgramPageRequest $request, InternshipProgramPage $internshipProgram_page)
    {
        $payload = $request->validated();
        $this->internshipProgramPageService->update($internshipProgram_page, $payload, $request->file('image'));

        $internshipProgram_page->items()->delete();

        foreach ($request->internship_program_page_items ?? [] as $itemData) {
            $item = $internshipProgram_page->items()->create();

            foreach ($itemData as $locale => $data) {
                if (!empty($data['title'])) {
                    $item->translateOrNew($locale)->title = $data['title'];
                }
                if (!empty($data['description'])) {
                    $item->translateOrNew($locale)->description = $data['description'];
                }
            }

            $item->save();
        }

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }
}
