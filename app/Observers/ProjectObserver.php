<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    /**
     * @param Project $article
     * @return void
     */
    public function creating(Project $project): void
    {
        // $locale = 'az';

        // $slug = str($project->{"title:$locale"})->slug();

        // $originalSlug = $slug;
        // $i = 1;

        // while (Project::where('slug', $slug)->exists()) {
        //     $slug = $originalSlug . '-' . $i;
        //     $i++;
        // }

        // $project->setAttribute('slug', $slug);
    }

    public function updating(Project $project): void
    {
        // $locale = 'az';

        // $slug = str($project->{"title:$locale"})->slug();

        // $originalSlug = $slug;
        // $i = 1;

        // while (Project::where('slug', $slug)->where('id', '!=', $project->id)->exists()) {
        //     $slug = $originalSlug . '-' . $i;
        //     $i++;
        // }

        // $project->setAttribute('slug', $slug);
    }
}
