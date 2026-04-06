<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AcademicCalendar;
use App\Models\Semester;
use App\Models\EducationLevel;
use App\Models\Faculty;
use App\Models\EducationType;
use App\Models\EventType;
use Illuminate\Http\Request;

class AcademicCalendarController extends Controller
{
    public function index(Request $request)
    {
        // 1. Filtrlər üçün lazım olan bütün dataları bazadan çəkirik
        $semesters = Semester::all();
        $levels = EducationLevel::all();
        $faculties = Faculty::all();
        $types = EducationType::all();
        $eventTypes = EventType::all();

        // Akademik illəri unikal olaraq bazadan götürürük
        $academicYears = AcademicCalendar::distinct()->pluck('academic_year')->filter()->values();

        // 2. Query Builder-i başladırıq
        $query = AcademicCalendar::with([
            'semester',
            'educationLevel',
            'faculty',
            'educationType',
            'eventType'
        ])->where('is_active', 1);

        // 3. Dinamik Filtrləmə Məntiqi
        if ($request->filled('academic_year')) {
            $query->where('academic_year', $request->academic_year);
        }

        if ($request->filled('semester_id')) {
            $query->where('semester_id', $request->semester_id);
        }

        if ($request->filled('education_level_id')) {
            $query->where('education_level_id', $request->education_level_id);
        }

        if ($request->filled('faculty_id')) {
            $query->where('faculty_id', $request->faculty_id);
        }

        if ($request->filled('education_type_id')) {
            $query->where('education_type_id', $request->education_type_id);
        }

        if ($request->filled('event_type_id')) {
            $query->where('event_type_id', $request->event_type_id);
        }

        // Sıralama (Order sütununa görə)
        $calendars = $query->orderBy('order', 'asc')->get();

        // 4. AJAX Yoxlanışı
        if ($request->ajax()) {
            // Əgər sorğu AJAX-dırsa, yalnız cədvəlin içini (partial) render edib qaytarırıq
            return view('front.academicCalendar.partials.table', compact('calendars'))->render();
        }

        // 5. Normal sorğu (Səhifə ilk dəfə açılanda)
        $metaTitle = __('translate.Academic calendar');
        $metaDescription = ""; // İstəyə bağlı meta data
        $metaKeywords = "";

        return view('front.academicCalendar.index', compact(
            'semesters',
            'levels',
            'faculties',
            'types',
            'eventTypes',
            'academicYears',
            'calendars',
            'metaTitle',
            'metaDescription',
            'metaKeywords'
        ));
    }
}
