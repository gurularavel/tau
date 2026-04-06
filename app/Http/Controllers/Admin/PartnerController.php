<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerRequest;
use App\Models\PartnerCategory;
use App\Models\Partner;
use App\Models\PartnerImage;
use App\Services\Contracts\PartnerCategoryServiceInterface;
use App\Services\Contracts\PartnerServiceInterface;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PartnerController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.partners.';

    private const TITLE = 'Partners';

    public function __construct(private readonly PartnerServiceInterface $partnerService)
    {
        $this->authorizeResource(Partner::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Partner();

        return view(self::PATH . 'create', [
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner): RedirectResponse
    {
        $this->partnerService->delete($partner);

        return redirect()->route('admin.partners.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner): View
    {
        $attributes = $partner::attributes();

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $partner,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param PartnerRequest $request
     * @return View
     */
    public function index(PartnerRequest $request): View
    {
        $models = $this->partnerService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'is_active']);
        $attributes = Partner::attributes();
        $headerAttributes = Partner::headerAttributes();

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
    public function show(Partner $partner): View
    {
        return view(self::PATH . 'show', [
            'model' => $partner,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PartnerRequest $request
     * @return RedirectResponse
     */
    public function store(PartnerRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $this->partnerService->create($payload, $request->file('image'));

        return redirect()->route('admin.partners.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerRequest $request, Partner $partner): RedirectResponse
    {
        $payload = $request->validated();

        $this->partnerService->update($partner, $payload, $request->file('image'));

        return redirect()->back()->with('success', __('translate.Successfully completed'));
    }
}
