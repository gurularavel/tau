<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;

use function PHPSTORM_META\map;

class PageController extends Controller
{
    public function show(Page $page)
    {
        abort_unless($page->is_active == Page::IS_ACTIVE, 404);
        $metaTitle = $page->meta_title;
        $metaKeywords = $page->meta_keywords;
        $metaDescription = $page->meta_description;

        $dynamics = $page->dynamics();

        $rows = [];
        foreach ($dynamics as $dynamic) {
            $rows[$dynamic->layout_row][] = $dynamic;
        }
        ksort($rows);
        return view('front.pages.show', compact('page', 'rows', 'metaTitle', 'metaKeywords', 'metaDescription'));
    }
}
