<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CampusGalleryPage;
use App\Models\ContactPage;

use function PHPSTORM_META\map;

class CampusGalleryPageController extends Controller
{

    public function __construct(

    )
    {
    }

    public function index()
    {
        $campusGalleryPage      = CampusGalleryPage::with('translations')->first();
        $title                  = $campusGalleryPage->title ?? '';

        $metaTitle              = $campusGalleryPage->meta_title ?? '';
        $metaDescription        = $campusGalleryPage->meta_description ?? '';
        $metaKeywords           = $campusGalleryPage->meta_keywords ?? '';


        return view('front.campusGalleryPage.index', compact(
            'campusGalleryPage',
            'title',
            'metaTitle',
            'metaDescription',
            'metaKeywords'
        ));

    }
}
