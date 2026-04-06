<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cv;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function uploadCv(Request $request, Vacancy $vacancy)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $cvName = time() . '_' . $cv->getClientOriginalName();
            $cv->move(public_path('uploads/cvs'), $cvName);

            Cv::create([
                'vacancy_id' => $vacancy->id,
                'file' => $cvName,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => __('translate.CV sent successfully!'),
            ]);
        }

        return response()->json(['status' => 'error', 'message' => 'Fayl tapılmadı'], 400);
    }
}
