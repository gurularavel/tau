<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AcademicCalendar;
use App\Models\Announcement;
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

        $news            = News::active()->get();
        $announcements          = Announcement::active()->get();
        $programs            = Program::active()->where('type', 1)->take(4)->get();

        $metaTitle       = $homePage->meta_title;
        $metaDescription = $homePage->meta_description;
        $metaKeywords    = $homePage->meta_keywords;


          $academicYears = AcademicCalendar::distinct()->pluck('academic_year')->filter()->values();

        // 2. Query Builder-i başladırıq
        $query = AcademicCalendar::with([
            'semester',
            'educationLevel',
            'faculty',
            'educationType',
            'eventType'
        ])->where('is_active', 1);
        $calendars = $query->orderBy('order', 'asc')->get();

        return view('front.homePage.index', compact(
            'homePage',
            'calendars',
            'news',
            'announcements',
            'metaTitle',
            'metaDescription',
            'metaKeywords',
            'programs'
        ));
    }

}
