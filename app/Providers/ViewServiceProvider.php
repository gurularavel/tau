<?php

namespace App\Providers;

use App\Composers\ActiveLanguageComposer;
use App\Composers\FormAttributeComposer;
use App\Composers\LanguageComposer;
use App\Composers\LocaleComposer;
use App\Composers\NavigationComposer;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        view()->composer('*', LocaleComposer::class);

    }
}
