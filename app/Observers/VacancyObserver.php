<?php

namespace App\Observers;

use App\Models\Vacancy;

class VacancyObserver
{
    /**
     * @param Vacancy $vacancy
     * @return void
     */


    public function creating(Vacancy $vacancy): void
    {
        // $locale = 'az';

        // $slug = str($vacancy->{"title:$locale"})->slug();

        // $originalSlug = $slug;
        // $i = 1;

        // while (Vacancy::where('slug', $slug)->exists()) {
        //     $slug = $originalSlug . '-' . $i;
        //     $i++;
        // }

        // $vacancy->setAttribute('slug', $slug);
    }

    public function updating(Vacancy $vacancy): void
    {
        // $locale = 'az';

        // $slug = str($vacancy->{"title:$locale"})->slug();

        // $originalSlug = $slug;
        // $i = 1;

        // while (Vacancy::where('slug', $slug)->where('id', '!=', $vacancy->id)->exists()) {
        //     $slug = $originalSlug . '-' . $i;
        //     $i++;
        // }

        // $vacancy->setAttribute('slug', $slug);
    }
}
