<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareerPageRequest;
use App\Services\Contracts\CareerPageServiceInterface;
use App\Models\CareerPage;
use App\Models\Vacancy;
use App\Traits\FileManagable;

class CareerPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.careerPage.';

    private const TITLE = 'Career section';

    public function __construct(
        private readonly CareerPageServiceInterface $careerPageService,



        ) {
        // $this->authorizeResource(CareerPage::class);
    }
    public function index()
    {
        $careerPage = CareerPage::first();
        $vacancies = Vacancy::latest()->get();
        return view(self::PATH . 'edit', [
            'model' => $careerPage,
            'title' => self::TITLE,
            'vacancies' => $vacancies
        ]);
    }

    public function update(CareerPageRequest $request, CareerPage $careerPage)
    {
        $payload = $request->validated();
        $this->careerPageService->update($careerPage,$payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }



}
