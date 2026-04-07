<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CareerOpportunity;
use App\Models\CareerOpportunityCategory;
use App\Models\CareerOpportunityPage;

use function PHPSTORM_META\map;

class CareerOpportunityController extends Controller
{
    public function __construct() {}

public function index(?CareerOpportunityCategory $career_opportunity_category = null)
{
    $query = CareerOpportunity::with(['category'])->active();

    if ($career_opportunity_category) {
        $query->where('career_opportunity_category_id', $career_opportunity_category->id);
    }

    $career_opportunities = $query->paginate(6);

    $careerOpportunityPage = CareerOpportunityPage::with('translations')->first();
    $pCategories = CareerOpportunityCategory::with('translations')->active()->get();

    $metaTitle       = $careerOpportunityPage->meta_title;
    $metaDescription = $careerOpportunityPage->meta_description;
    $metaKeywords    = $careerOpportunityPage->meta_keywords;

    return view('front.careerOpportunityPage.index', compact(
        'career_opportunities',
        'careerOpportunityPage',
        'metaTitle',
        'metaDescription',
        'metaKeywords',
        'career_opportunity_category',
        'pCategories'
    ));
}

    public function show(CareerOpportunity $career_opportunity)
    {
        $career_opportunity->is_active == CareerOpportunity::IS_ACTIVE ?: abort(404);
        $metaTitle = $career_opportunity->meta_title;
        $metaDescription = $career_opportunity->meta_description;
        $metaKeywords = $career_opportunity->meta_keywords;

        return view('front.careerOpportunityPage.show', compact('career_opportunity', 'metaTitle', 'metaDescription', 'metaKeywords'));
    }
}
