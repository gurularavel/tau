<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactPageRequest;
use App\Services\Contracts\ContactPageServiceInterface;
use App\Models\ContactPage;
use App\Traits\FileManagable;

class ContactPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.contactPage.';

    private const TITLE = 'Contact section';

    public function __construct(
        private readonly ContactPageServiceInterface $contactPageService,



        ) {
        // $this->authorizeResource(ContactPage::class);
    }
    public function index()
    {
        $contactPage = ContactPage::first();

        return view(self::PATH . 'edit', [
            'model' => $contactPage,
            'title' => self::TITLE,
        ]);
    }

    public function update(ContactPageRequest $request, ContactPage $contactPage)
    {
        $payload = $request->validated();
        $this->contactPageService->update($contactPage,$payload);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }


}
