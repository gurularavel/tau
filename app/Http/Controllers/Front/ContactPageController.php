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
        $title                  = __('translate.Contact Us');

        $metaTitle              = __('translate.Contact Us');
        $metaDescription        = __('translate.Contact Us');
        $metaKeywords           = __('translate.Contact Us');


        return view('front.contactPage.index', compact(
            'contactPage',
            'title',
            'metaTitle',
            'metaDescription',
            'metaKeywords'
        ));

    }
}
