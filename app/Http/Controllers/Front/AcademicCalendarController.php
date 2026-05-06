<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AcademicCalendar;
use Illuminate\Http\Request;

class AcademicCalendarController extends Controller
{
    public function index(Request $request)
    {
        $calendars = AcademicCalendar::where('is_active', 1)
            ->orderBy('order', 'asc')
            ->get();

        $metaTitle = __('translate.Academic calendar');
        $metaDescription = '';
        $metaKeywords = '';

        return view('front.academicCalendar.index', compact(
            'calendars',
            'metaTitle',
            'metaDescription',
            'metaKeywords'
        ));
    }
}
