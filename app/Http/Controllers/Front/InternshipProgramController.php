<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\InternshipProgram;
use App\Models\InternshipProgramPage;
use App\Models\Partner;

use function PHPSTORM_META\map;

class InternshipProgramController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $internshipProgramPage = InternshipProgramPage::with('translations')->first();
        $internshipPrograms = InternshipProgram::active()->paginate(6);
        $partners = Partner::active()->get();



        $metaTitle = $internshipProgramPage->meta_title;
        $metaDescription = $internshipProgramPage->meta_description;
        $metaKeywords = $internshipProgramPage->meta_keywords;

        return view('front.internshipProgramPage.index', compact('partners','internshipPrograms', 'internshipProgramPage', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }

    // public function show(InternshipProgram $internshipProgram)
    // {
    //     if (!$internshipProgram->is_active) {
    //         abort(404);
    //     }
    //     $metaTitle = $internshipProgram->meta_title;
    //     $metaDescription = $internshipProgram->meta_description;
    //     $metaKeywords = $internshipProgram->meta_keywords;

    //     return view('front.internshipProgramPage.show', compact('internshipProgram', 'metaTitle', 'metaDescription', 'metaKeywords'));
    // }
}
