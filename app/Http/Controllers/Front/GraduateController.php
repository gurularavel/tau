<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Graduate;
use App\Models\GraduatePage;

use function PHPSTORM_META\map;

class GraduateController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $graduatePage = GraduatePage::with('translations')->first();
        $graduates = Graduate::active()->paginate(6);



        $metaTitle = $graduatePage->meta_title;
        $metaDescription = $graduatePage->meta_description;
        $metaKeywords = $graduatePage->meta_keywords;

        return view('front.graduatePage.index', compact('graduates', 'graduatePage', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function show(Graduate $graduate)
    {
        if (!$graduate->is_active) {
            abort(404);
        }
        $metaTitle = $graduate->meta_title;
        $metaDescription = $graduate->meta_description;
        $metaKeywords = $graduate->meta_keywords;

        return view('front.graduatePage.show', compact('graduate', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }
}
