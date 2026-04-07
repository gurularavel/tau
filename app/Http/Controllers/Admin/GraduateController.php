<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GraduateRequest;
use App\Models\Graduate;
use App\Models\GraduateImage;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\GraduateServiceInterface;
use App\Services\GraduateCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GraduateController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.graduates.';

    private const TITLE = 'Graduates';

    public function __construct(private readonly GraduateServiceInterface $graduateService)
    {
        // $this->authorizeResource(Graduate::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Graduate();
        return view(self::PATH . 'create', [
            'model' => $model,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Graduate $graduate): RedirectResponse
    {
        $this->graduateService->delete($graduate);

        return redirect()->route('admin.graduatePage.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Graduate $graduate): View
    {
        $attributes = $graduate::attributes();
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $graduate,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param GraduateRequest $request
     * @return View
     */
    public function index(GraduateRequest $request): View
    {
        $models = $this->graduateService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'image', 'is_active', 'slug']);
        $attributes = Graduate::attributes();
        $headerAttributes = Graduate::headerAttributes();

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
    public function show(Graduate $graduate): View
    {
        return view(self::PATH . 'show', [
            'model' => $graduate,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GraduateRequest $request
     * @return RedirectResponse
     */
    public function store(GraduateRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $graduate = $this->graduateService->create(storeSlug($payload, Graduate::class), $request->file('image'));


        return redirect()->route('admin.graduates.edit', $graduate)->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GraduateRequest $request, Graduate $graduate)
    {
        $payload = $request->validated();
        $payload['images'] = $request->file('images');

        $this->graduateService->update($graduate, updateSlug($payload, $graduate), $request->file('image'));



        return back()->with('success', __('translate.Successfully completed'));
    }


}
