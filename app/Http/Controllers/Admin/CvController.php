<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VacancyRequest;
use App\Models\CareerPage;
use App\Models\Cv;
use App\Models\Vacancy;
use App\Services\Contracts\VacancyServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
class CvController extends Controller
{
    private const PATH = 'admin.cvs.';

    private const TITLE = 'CV';

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cv $cv)
    {
        $filePath = public_path('uploads/cvs/' . $cv->file);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        $cv->delete();

        return response()->json(['ok' => true]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param VacancyRequest $request
     * @return View
     */
    public function index(): View
    {
        $models = CV::all();
        $attributes = CV::attributes();
        $headerAttributes = CV::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
        ]);
    }
}
