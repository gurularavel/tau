<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HistoryPage;
use App\Models\HistoryPageInfo;

class HistoryPageController extends Controller
{
    public function index()
    {
        $historyPage = HistoryPage::with('translations')->first();
        $infos = HistoryPageInfo::with('translations')->orderBy('order')->get();

        return view('front.historyPage.index', [
            'historyPage'     => $historyPage,
            'infos'           => $infos,
            'metaTitle'       => $historyPage?->meta_title,
            'metaDescription' => $historyPage?->meta_description,
            'metaKeywords'    => $historyPage?->meta_keywords,
        ]);
    }
}
