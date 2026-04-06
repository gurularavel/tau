<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class NewsController extends Controller
{
    public function __construct(private readonly NewsService $newsService) {}

    public function index(Request $request)
    {
        $query = News::query()->with('translations')->latest();

        if ($search = $request->input('q')) {
            $query->where(function ($q) use ($search) {
                $q->whereTranslationLike('title', "%{$search}%")->orWhereTranslationLike('description', "%{$search}%");
            });
        }

        if ($request->filled('years')) {
            $years = array_filter(explode(',', $request->years));
            if (!empty($years)) {
                $query->whereIn(\DB::raw('YEAR(created_at)'), $years);
            }
        }

        $items = $query->paginate(6);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('front.news.news-items', compact('items'))->render(),
                'hasMore' => $items->hasMorePages(),
            ]);
        }
        $availableYears = News::selectRaw('YEAR(created_at) as year')->groupBy('year')->orderByDesc('year')->pluck('year');

        $recentNews = News::latest()->get();

        $metaTitle = __('translate.News');
        $metaDescription = __('translate.News');
        $metaKeywords = __('translate.News');

        return view('front.news.index', compact('items', 'availableYears', 'recentNews', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function show(News $news)
    {
        $news->status == News::IS_ACTIVE ?: abort(404);
        $metaTitle = $news->meta_title;
        $metaDescription = $news->meta_description;
        $metaKeywords = $news->meta_keywords;
        $title = __('translate.News');
        $recentNews = News::latest()->get();
        $this->newsService->viewCount($news);

        $popularTags = $news
            ::query()
            ->pluck('tags')
            ->flatMap(function ($tags) {
                return collect(explode(',', $tags))->map(fn($tag) => trim($tag))->filter();
            })
            ->unique()
            ->values()
            ->toArray();

        return view('front.news.show', compact('news', 'recentNews', 'title', 'metaTitle', 'metaDescription', 'metaKeywords', 'popularTags'));
    }
}
