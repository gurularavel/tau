<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AcademicCalendar;
use Illuminate\Http\Request;

class AcademicCalendarController extends Controller
{
    public function index(Request $request)
    {
        $calendar = AcademicCalendar::with('translations')->first();

        $metaTitle = __('translate.Academic calendar');
        $metaDescription = '';
        $metaKeywords = '';

        return view('front.academicCalendar.index', compact(
            'calendar',
            'metaTitle',
            'metaDescription',
            'metaKeywords'
        ));
    }
}
