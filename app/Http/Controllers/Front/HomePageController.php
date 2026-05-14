<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AcademicCalendar;
use App\Models\Announcement;
use App\Models\HeroSlide;
use App\Models\HomePage;
use App\Models\News;
use App\Models\Program;

use function PHPSTORM_META\map;

class HomePageController extends Controller
{

    public function __construct(

    )
    {
    }

    public function index()
    {
        $homePage        = HomePage::with('translations')->first();
        $heroSlides      = HeroSlide::with('translations')->active()->get();

        $news            = News::active()->get();
        $announcements          = Announcement::active()->get();
        $programs            = Program::active()->where('type', 1)->take(4)->get();

        $metaTitle       = $homePage->meta_title;
        $metaDescription = $homePage->meta_description;
        $metaKeywords    = $homePage->meta_keywords;


        $calendar = AcademicCalendar::with('translations')->first();

        return view('front.homePage.index', compact(
            'homePage',
            'heroSlides',
            'calendar',
            'news',
            'announcements',
            'metaTitle',
            'metaDescription',
            'metaKeywords',
            'programs'
        ));
    }

}
