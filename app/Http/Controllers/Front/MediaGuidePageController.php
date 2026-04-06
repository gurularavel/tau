<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\MediaGuidePage;
use App\Models\ContactPage;

use function PHPSTORM_META\map;

class MediaGuidePageController extends Controller
{

    public function __construct(

    )
    {
    }

    public function index()
    {
        $mediaGuidePage         = MediaGuidePage::with('translations')->first();
        $title                  = $mediaGuidePage->title ?? '';

        $metaTitle              = $mediaGuidePage->meta_title ?? '';
        $metaDescription        = $mediaGuidePage->meta_description ?? '';
        $metaKeywords           = $mediaGuidePage->meta_keywords ?? '';


        return view('front.mediaGuidePage.index', compact(
            'mediaGuidePage',
            'title',
            'metaTitle',
            'metaDescription',
            'metaKeywords'
        ));

    }
}
