<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;

use function PHPSTORM_META\map;

class GalleryItemController extends Controller
{

    public function __construct(

    )
    {
    }

    public function index()
    {
        $items                  = GalleryItem::active()->get();


        $metaTitle              = __('translate.Gallery');
        $metaDescription        = __('translate.Gallery');
        $metaKeywords           = __('translate.Gallery');


        return view('front.mediaPage.index', compact(
            'items',
            'metaTitle',
            'metaDescription',
            'metaKeywords'
        ));

    }

}
