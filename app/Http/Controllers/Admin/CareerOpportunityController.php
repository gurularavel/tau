<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareerOpportunityRequest;
use App\Models\CareerOpportunity;
use App\Models\CareerOpportunityCategory;
use App\Models\CareerOpportunityImage;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\CareerOpportunityServiceInterface;
use App\Services\CareerOpportunityCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CareerOpportunityController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.career_opportunities.';

    private const TITLE = 'Career opportunities';

    public function __construct(private readonly CareerOpportunityServiceInterface $careerOpportunityService, private readonly CareerOpportunityCategoryService $categoryService)
    {
        // $this->authorizeResource(CareerOpportunity::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new CareerOpportunity();
        $categories = $this->categoryService->getAll(columns: ['id'], conditions: [['is_active', '=', CareerOpportunityCategory::IS_ACTIVE]]);
        return view(self::PATH . 'create', [
            'model' => $model,
            'categories' => $categories,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerOpportunity $career_opportunity): RedirectResponse
    {
        $this->careerOpportunityService->delete($career_opportunity);

        return redirect()->route('admin.career_opportunities.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareerOpportunity $career_opportunity): View
    {
        $attributes = $career_opportunity::attributes();
        $categories = $this->categoryService->getAll(columns: ['id'], conditions: [['is_active', '=', CareerOpportunityCategory::IS_ACTIVE]]);
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'categories' => $categories,
            'model' => $career_opportunity,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param CareerOpportunityRequest $request
     * @return View
     */
    public function index(CareerOpportunityRequest $request): View
    {
        $models = $this->careerOpportunityService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'is_active', 'slug']);
        $attributes = CareerOpportunity::attributes();
        $headerAttributes = CareerOpportunity::headerAttributes();

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
    public function show(CareerOpportunity $career_opportunity): View
    {
        return view(self::PATH . 'show', [
            'model' => $career_opportunity,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CareerOpportunityRequest $request
     * @return RedirectResponse
     */
    public function store(CareerOpportunityRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $career_opportunity = $this->careerOpportunityService->create(storeSlug($payload, CareerOpportunity::class), $request->file('image'));


        return redirect()->route('admin.career_opportunities.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CareerOpportunityRequest $request, CareerOpportunity $career_opportunity)
    {
        $payload = $request->validated();

        $this->careerOpportunityService->update($career_opportunity, updateSlug($payload, $career_opportunity), $request->file('image'));


        return back()->with('success', __('translate.Successfully completed'));
    }


}
