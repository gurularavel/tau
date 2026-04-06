<?php

namespace App\Providers;

use App\Models\Page;
use App\Observers\PageObserver;
use Crud\Providers\CrudServiceProvider;
use Illuminate\Support\ServiceProvider;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\ProjectImage;
use App\Observers\NewsImageObserver;
use App\Observers\NewsObserver;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\StudentClubImage;
use App\Observers\ProjectImageObserver;
use App\Observers\ServiceImageObserver;
use App\Observers\ServiceObserver;
use App\Observers\StudentClubImageObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(CrudServiceProvider::class);
        $this->app->register(ViewServiceProvider::class);

        if (app()->isProduction()) {
            return;
        }
        $this->app->register(FakerServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // DB::listen(function ($query) {
        //     Log::info($query->sql, $query->bindings, $query->time);
        // });

        Page::observe(PageObserver::class);
        News::observe(NewsObserver::class);
        NewsImage::observe(NewsImageObserver::class);
        ProjectImage::observe(ProjectImageObserver::class);
        StudentClubImage::observe(StudentClubImageObserver::class);

    }
}
