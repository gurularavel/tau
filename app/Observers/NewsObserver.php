<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Cache;

class NewsObserver
{
    /**
     * Handle the News "creating" event.
     */
    public function creating(News $news): void
    {
        // if (!$news->getAttribute('user_id')) {
        //     $news->setAttribute('user_id', auth()->id());
        // }

        // $locale = 'az';
        // $slug = str($news->{"title:$locale"})->slug();
        // $originalSlug = $slug;
        // $i = 1;

        // while (News::where('slug', $slug)->exists()) {
        //     $slug = $originalSlug . '-' . $i;
        //     $i++;
        // }

        // $news->setAttribute('slug', $slug);
    }

    /**
     * Handle the News "saved" event (after create or update).
     */
    public function saved(News $news): void
    {
        // Cache təmizlənir
        Cache::forget('home.news');
    }

    /**
     * Handle the News "deleted" event.
     */
    public function deleted(News $news): void
    {
        // Cache təmizlənir
        Cache::forget('home.news');
    }

    /**
     * Handle the News "force deleted" event.
     */
    public function forceDeleted(News $news): void
    {
        Cache::forget('home.news');
    }
}
