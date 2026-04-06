<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactPage;

use function PHPSTORM_META\map;

class ContactPageController extends Controller
{

    public function __construct(

    )
    {
    }

    public function index()
    {
        $contactPage            = ContactPage::with('translations')->first();

        $metaTitle              = $contactPage->meta_title;
        $metaDescription        = $contactPage->meta_description;
        $metaKeywords           = $contactPage->meta_keywords;


        return view('front.contactPage.index', compact(
            'contactPage',
            'metaTitle',
            'metaDescription',
            'metaKeywords'
        ));

    }
}
