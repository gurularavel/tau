<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\News;
use App\Services\AnnouncementService;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class AnnouncementController extends Controller
{
    public function __construct(private readonly AnnouncementService $announcementService) {}

    public function index(Request $request)
    {
        $query = Announcement::query()->with('translations')->latest();

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
                'html' => view('front.announcements.announcements-items', compact('items'))->render(),
                'hasMore' => $items->hasMorePages(),
            ]);
        }
        $availableYears = Announcement::selectRaw('YEAR(created_at) as year')->groupBy('year')->orderByDesc('year')->pluck('year');

        $recentAnnouncements = Announcement::latest()->get();
        $metaTitle = __('translate.Announcements');
        $metaDescription = __('translate.Announcements');
        $metaKeywords = __('translate.Announcements');
        return view('front.announcements.index', compact('items', 'availableYears', 'recentAnnouncements', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }

    public function show(Announcement $announcement)
    {
        $announcement->status == Announcement::IS_ACTIVE ?: abort(404);
        $metaTitle = $announcement->meta_title;
        $metaDescription = $announcement->meta_description;
        $metaKeywords = $announcement->meta_keywords;
        $title = __('translate.Announcements');
        $recentAnnouncement = Announcement::latest()->get();
        $this->announcementService->viewCount($announcement);

        $popularTags = $announcement
            ::query()
            ->pluck('tags')
            ->flatMap(function ($tags) {
                return collect(explode(',', $tags))->map(fn($tag) => trim($tag))->filter();
            })
            ->unique()
            ->values()
            ->toArray();

        return view('front.announcements.show', compact('announcement', 'recentAnnouncement', 'title', 'metaTitle', 'metaDescription', 'metaKeywords', 'popularTags'));
    }
}
