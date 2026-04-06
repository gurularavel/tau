<?php

namespace App\Composers;

use App\Models\Language;
use Illuminate\View\View;

class LocaleComposer
{
    public function compose(View $view): void
    {
        $languages = Language::active();

        if ($languages->exists()) {
            $locales = $languages->pluck('locale')->toArray();
        } else {
            $locales = config('translatable.locales', []);
        }

        $view->with('locales', $locales);
    }
}
