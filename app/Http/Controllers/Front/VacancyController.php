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
        try {
            $request->validate(
                [
                    'cv' => 'required|mimes:pdf,doc,docx|max:5120',
                ],
                [
                    'cv.max' => __('translate.File size cannot exceed 5 MB'), // Burada artıq 5 MB yaza bilərsən
                    'cv.mimes' => __('translate.Only PDF, DOC and DOCX formats are allowed'),
                ],
            );

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

            return response()->json(['status' => 'error', 'message' => __('translate.File not found')], 400);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'errors' => $e->errors(),
                    'message' => __('translate.Validation error'),
                ],
                422,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => __('translate.Server error'),
                ],
                500,
            );
        }
    }
}
