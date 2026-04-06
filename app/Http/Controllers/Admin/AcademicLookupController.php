<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EducationLevel;
use App\Models\EducationType;
use App\Models\EventType;
use App\Models\Faculty;
use App\Models\Semester;
use Illuminate\Http\Request;

class AcademicLookupController extends Controller
{
    public function index()
    {
        return view('admin.academic_lookups.index', [
            'semesters' => Semester::with('translations')->get(),
            'educationLevels' => EducationLevel::with('translations')->get(),
            'faculties' => Faculty::with('translations')->get(),
            'educationTypes' => EducationType::with('translations')->get(),
            'eventTypes' => EventType::with('translations')->get(),
        ]);
    }

    private function saveTranslations($model, $request)
    {
        foreach (getLocales() as $locale) {
            $model->translateOrNew($locale)->name = $request->name[$locale] ?? null;
        }

        $model->save();
    }

    // 🔵 SEMESTER
    public function semesterStore(Request $request)
    {
        $model = Semester::updateOrCreate(['id' => $request->id]);
        $this->saveTranslations($model, $request);

        return back()->with('success', 'Saved');
    }

    // 🔵 FACULTY
    public function facultyStore(Request $request)
    {
        $model = Faculty::updateOrCreate(['id' => $request->id]);
        $this->saveTranslations($model, $request);

        return back()->with('success', 'Saved');
    }

    // 🔵 EDUCATION LEVEL
    public function educationLevelStore(Request $request)
    {
        $model = EducationLevel::updateOrCreate(['id' => $request->id]);
        $this->saveTranslations($model, $request);

        return back()->with('success', 'Saved');
    }

    // 🔵 EDUCATION TYPE
    public function educationTypeStore(Request $request)
    {
        $model = EducationType::updateOrCreate(['id' => $request->id]);
        $this->saveTranslations($model, $request);

        return back()->with('success', 'Saved');
    }

    // 🔵 EVENT TYPE
    public function eventTypeStore(Request $request)
    {
        $model = EventType::updateOrCreate(['id' => $request->id]);
        $this->saveTranslations($model, $request);

        return back()->with('success', 'Saved');
    }
}
