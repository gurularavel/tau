<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\CareerPage;

use App\Models\Partner;
use App\Models\Vacancy;
use App\Services\VacancyService;

use function PHPSTORM_META\map;

class CareerPageController extends Controller
{
    public function __construct(private readonly VacancyService $vacancyService) {}

    public function index()
    {
        $careerPage = CareerPage::with('translations')->first();
        $vacancies = Vacancy::active()->get();

        $metaTitle = $careerPage->meta_title;
        $metaDescription = $careerPage->meta_description;
        $metaKeywords = $careerPage->meta_keywords;


        return view('front.careerPage.index', compact('vacancies', 'careerPage',  'metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function show(Vacancy $vacancy)
    {
        if (!$vacancy->is_active) {
            abort(404);
        }
        $metaTitle = $vacancy->meta_title;
        $metaDescription = $vacancy->meta_description;
        $metaKeywords = $vacancy->meta_keywords;
        $title = __('translate.Vacancies');
        $this->vacancyService->viewCount($vacancy);

        return view(
            'front.careerPage.show',
            compact(
                'vacancy',
                'title',

                'metaTitle',
                'metaDescription',
                'metaKeywords',
            ),
        );
    }
}
