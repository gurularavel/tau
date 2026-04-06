<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomePageRequest;
use App\Services\Contracts\HomePageServiceInterface;
use App\Models\HomePage;

use App\Traits\FileManagable;

class HomePageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.homePage.';

    private const TITLE = 'Home page';

    public function __construct(
        private readonly HomePageServiceInterface $homePageService,



        ) {
        // $this->authorizeResource(HomePage::class);
    }
    public function index()
    {
        $homePage = HomePage::first();

        return view(self::PATH . 'edit', [
            'model' => $homePage,
            'title' => self::TITLE,
        ]);
    }

    public function update(HomePageRequest $request, HomePage $homePage)
    {
        $payload = $request->validated();

        $this->homePageService->update($homePage,$payload, $request->file('image'),$request->file('image2'),$request->file('image3'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }


}
