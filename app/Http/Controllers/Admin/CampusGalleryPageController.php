<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CampusGalleryPageRequest;
use App\Services\Contracts\CampusGalleryPageServiceInterface;
use App\Models\CampusGalleryPage;
use App\Traits\FileManagable;

class CampusGalleryPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.campusGalleryPage.';

    private const TITLE = 'Campus Gallery page';

    public function __construct(
        private readonly CampusGalleryPageServiceInterface $campusGalleryPageService,



        ) {
        // $this->authorizeResource(CampusGalleryPage::class);
    }
    public function index()
    {
        $campusGalleryPage = CampusGalleryPage::first();

        return view(self::PATH . 'edit', [
            'model' => $campusGalleryPage,
            'title' => self::TITLE,
        ]);
    }

    public function update(CampusGalleryPageRequest $request, CampusGalleryPage $campusGalleryPage)
    {
        $payload = $request->validated();
        $this->campusGalleryPageService->update($campusGalleryPage,$payload,$request->file('image'),$request->file('image2'),$request->file('image3'),$request->file('image4'),$request->file('image5'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }


}
