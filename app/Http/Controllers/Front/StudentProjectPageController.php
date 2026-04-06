<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\StudentProject;
use App\Models\StudentProjectPage;

use function PHPSTORM_META\map;

class StudentProjectPageController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $studentProjectPage = StudentProjectPage::with('translations')->first();
        $studentProjects = StudentProject::active()->paginate(6);



        $metaTitle = $studentProjectPage->meta_title;
        $metaDescription = $studentProjectPage->meta_description;
        $metaKeywords = $studentProjectPage->meta_keywords;

        return view('front.studentProjectPage.index', compact('studentProjects', 'studentProjectPage', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function show(StudentProject $studentProject)
    {
        if (!$studentProject->is_active) {
            abort(404);
        }
        $metaTitle = $studentProject->meta_title;
        $metaDescription = $studentProject->meta_description;
        $metaKeywords = $studentProject->meta_keywords;

        return view('front.studentProjectPage.show', compact('studentProject', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }
}
