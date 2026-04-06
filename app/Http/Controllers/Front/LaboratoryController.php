<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use App\Models\LaboratoryPage;

use function PHPSTORM_META\map;

class LaboratoryController extends Controller
{
    public function __construct() {}

    public function index()
    {
        $laboratoryPage = LaboratoryPage::with('translations')->first();
        $laboratories = Laboratory::active()->paginate(6);



        $metaTitle = $laboratoryPage->meta_title;
        $metaDescription = $laboratoryPage->meta_description;
        $metaKeywords = $laboratoryPage->meta_keywords;

        return view('front.laboratoryPage.index', compact('laboratories', 'laboratoryPage', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function show(Laboratory $laboratory)
    {
        if (!$laboratory->is_active) {
            abort(404);
        }
        $metaTitle = $laboratory->meta_title;
        $metaDescription = $laboratory->meta_description;
        $metaKeywords = $laboratory->meta_keywords;

        return view('front.laboratoryPage.show', compact('laboratory', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }
}
