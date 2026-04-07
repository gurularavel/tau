<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CareerOpportunityPageRequest;
use App\Models\CareerOpportunity;
use App\Models\CareerOpportunityCategory;
use App\Services\Contracts\CareerOpportunityPageServiceInterface;
use App\Models\CareerOpportunityPage;
use App\Services\Contracts\CareerOpportunityServiceInterface;
use App\Traits\FileManagable;

class CareerOpportunityPageController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.careerOpportunityPage.';

    private const TITLE = 'Career opportunities page';

    public function __construct(
        private readonly CareerOpportunityPageServiceInterface $careerOpportunityPageService,
        private readonly CareerOpportunityServiceInterface   $careerOpportunityService,




        ) {
        // $this->authorizeResource(CareerOpportunityPage::class);
    }
    public function index()
    {
        $careerOpportunityPage = CareerOpportunityPage::first();
        $careerOpportunities = $this->careerOpportunityService->getAll(
            limit: 5,
            columns: ['id','image','is_active'],
            sorting:'-created_at'
        );
        return view(self::PATH . 'edit', [
            'model' => $careerOpportunityPage,
            'careerOpportunities' => $careerOpportunities,
            'title' => self::TITLE,
        ]);
    }

    public function update(CareerOpportunityPageRequest $request, CareerOpportunityPage $career_opportunity_page)
    {
        $payload = $request->validated();
        $this->careerOpportunityPageService->update($career_opportunity_page,$payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }



}
