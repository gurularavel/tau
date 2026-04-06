<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\StudentClub;
use App\Models\StudentClubPage;

use function PHPSTORM_META\map;

class StudentClubController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $studentClubPage = StudentClubPage::with('translations')->first();
        $studentClubs = StudentClub::active()->paginate(6);



        $metaTitle = $studentClubPage->meta_title;
        $metaDescription = $studentClubPage->meta_description;
        $metaKeywords = $studentClubPage->meta_keywords;

        return view('front.studentClubPage.index', compact('studentClubs', 'studentClubPage', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function show(StudentClub $studentClub)
    {
        if (!$studentClub->is_active) {
            abort(404);
        }
        $metaTitle = $studentClub->meta_title;
        $metaDescription = $studentClub->meta_description;
        $metaKeywords = $studentClub->meta_keywords;

        return view('front.studentClubPage.show', compact('studentClub', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }
}
