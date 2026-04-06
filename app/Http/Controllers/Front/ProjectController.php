<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectPage;

use function PHPSTORM_META\map;

class ProjectController extends Controller
{
    public function __construct() {}

public function index(?ProjectCategory $project_category = null)
{
    $query = Project::with(['category', 'Items'])->active();

    if ($project_category) {
        $query->where('project_category_id', $project_category->id);
    }

    $projects = $query->paginate(6);

    $projectPage = ProjectPage::with('translations')->first();
    $pCategories = ProjectCategory::with('translations')->active()->get();

    $metaTitle       = $projectPage->meta_title;
    $metaDescription = $projectPage->meta_description;
    $metaKeywords    = $projectPage->meta_keywords;

    return view('front.projectPage.index', compact(
        'projects',
        'projectPage',
        'metaTitle',
        'metaDescription',
        'metaKeywords',
        'project_category',
        'pCategories'
    ));
}

    public function show(Project $project)
    {
        $project->is_active == Project::IS_ACTIVE ?: abort(404);
        $metaTitle = $project->meta_title;
        $metaDescription = $project->meta_description;
        $metaKeywords = $project->meta_keywords;
        $projects = Project::active()->get();

        return view('front.projectPage.show', compact('project', 'projects', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }
}
