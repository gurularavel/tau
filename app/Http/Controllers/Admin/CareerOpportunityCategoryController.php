<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareerOpportunityCategoryRequest;
use App\Models\CareerOpportunityCategory;
use App\Services\Contracts\CareerOpportunityCategoryServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CareerOpportunityCategoryController extends Controller
{
    private const PATH = 'admin.career_opportunity_categories.';

    private const TITLE = 'Career opportunity categories';

    public function __construct(private readonly CareerOpportunityCategoryServiceInterface $careerOpportunityCategoryService)
    {
        // $this->authorizeResource(CareerOpportunityCategory::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new CareerOpportunityCategory();
        $attributes = $model::attributes();

        return view(self::PATH . 'create', [
            'attributes' => $attributes,
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerOpportunityCategory $career_opportunity_category): RedirectResponse
    {
        $this->careerOpportunityCategoryService->delete($career_opportunity_category);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareerOpportunityCategory $career_opportunity_category): View
    {
        $attributes = $career_opportunity_category::attributes();

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $career_opportunity_category,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param CareerOpportunityCategoryRequest $request
     * @return View
     */
    public function index(CareerOpportunityCategoryRequest $request): View
    {
        $models = $this->careerOpportunityCategoryService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'is_active'],
        );
        $attributes = CareerOpportunityCategory::attributes();
        $headerAttributes = CareerOpportunityCategory::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CareerOpportunityCategory $career_opportunity_category): View
    {
        return view(self::PATH . 'show', [
            'model' => $career_opportunity_category,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CareerOpportunityCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CareerOpportunityCategoryRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->careerOpportunityCategoryService->create(storeSlug($payload, CareerOpportunityCategory::class));

        return redirect()
            ->route('admin.career_opportunity_categories.index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CareerOpportunityCategoryRequest $request, CareerOpportunityCategory $career_opportunity_category): RedirectResponse
    {
        $payload = $request->validated();

        $this->careerOpportunityCategoryService->update($career_opportunity_category, updateSlug($payload, $career_opportunity_category));

        return redirect()
            ->route('admin.career_opportunity_categories.edit', $career_opportunity_category)
            ->with('success', __('translate.Successfully completed'));
    }
}
