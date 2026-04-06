<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FooterRequest;
use App\Models\Footer;
use App\Models\FooterCategory;
use App\Models\FooterImage;
use App\Models\Page;
use App\Models\Program;
use App\Services\Contracts\ProductServiceInterface;
use App\Services\Contracts\FooterServiceInterface;
use App\Services\FooterCategoryService;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FooterController extends Controller
{
    use FileManagable;

    private const PATH = 'admin.footers.';

    private const TITLE = 'Footer';

    public function __construct(private readonly FooterServiceInterface $footerService)
    {
        // $this->authorizeResource(Footer::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $pages = Page::active()->get();
        $programs = Program::active()->where('type', 1)->get();

        $model = new Footer();
        return view(self::PATH . 'create', [
            'model' => $model,
            'pages' => $pages,
            'programs' => $programs,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Footer $footer): RedirectResponse
    {
        $this->footerService->delete($footer);

        return redirect()->route('admin.footers.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Footer $footer): View
    {
        $pages = Page::active()->get();
        $programs = Program::active()->where('type', 1)->get();

        $attributes = $footer::attributes();
        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $footer,
            'title' => self::TITLE,
            'pages' => $pages,
            'programs' => $programs
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param FooterRequest $request
     * @return View
     */
    public function index(FooterRequest $request): View
    {
        $models = Footer::orderBy('order', 'asc')->get();
        $attributes = Footer::attributes();
        $headerAttributes = Footer::headerAttributes();

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
    public function show(Footer $footer): View
    {
        return view(self::PATH . 'show', [
            'model' => $footer,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FooterRequest $request
     * @return RedirectResponse
     */
public function store(FooterRequest $request): RedirectResponse
{
    $payload = $request->validated();

    $footer = $this->footerService->create($payload);

    foreach ($request->footer_items ?? [] as $itemData) {

        $firstLocale = array_key_first($itemData);

        $selectSlug = $itemData[$firstLocale]['slug_select'] ?? null;
        $manualSlug = $itemData[$firstLocale]['slug_manual'] ?? null;
        $programSlug = $itemData[$firstLocale]['slug_program'] ?? null;

        // manual > select + pages/
        $slug = $manualSlug ? ($selectSlug ? 'pages/' . $selectSlug : null) : ($programSlug ? 'programs/' . $programSlug : null);

        $item = $footer->items()->create([
            'slug' => $slug,
        ]);

        foreach ($itemData as $locale => $data) {
            if (!empty($data['title'])) {
                $item->translateOrNew($locale)->title = $data['title'];
            }
        }

        $item->save();
    }

    return redirect()
        ->route('admin.footers.index')
        ->with('success', __('translate.Successfully completed'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(FooterRequest $request, Footer $footer)
    {
        $payload = $request->validated();

        $this->footerService->update($footer, $payload);

        $incomingItems = $request->footer_items ?? [];

        $existingIds = $footer->items()->pluck('id')->toArray();

        $processedIds = [];

        foreach ($incomingItems as $itemId => $itemData) {
            $firstLocale = array_key_first($itemData);

            // slug logic (manual > select)
            $selectSlug = $itemData[$firstLocale]['slug_select'] ?? null;
            $manualSlug = $itemData[$firstLocale]['slug_manual'] ?? null;
            $programSlug = $itemData[$firstLocale]['slug_program'] ?? null;

            if (!empty($manualSlug)) {
                $slug = $manualSlug;
            } elseif (!empty($selectSlug)) {
                $slug = 'pages/' . $selectSlug;
            }else if(!empty($programSlug)){
                $slug = 'programs/' . $programSlug;
            } else {
                $slug = null;
            }

            // UPDATE
            if (is_numeric($itemId) && in_array($itemId, $existingIds)) {
                $item = $footer->items()->find($itemId);

                if ($item) {
                    $item->update([
                        'slug' => $slug,
                    ]);

                    foreach ($itemData as $locale => $data) {
                        if (!empty($data['title'])) {
                            $item->translateOrNew($locale)->title = $data['title'];
                        }
                    }

                    $item->save();

                    $processedIds[] = $item->id;
                }
            } else {
                // CREATE
                $item = $footer->items()->create([
                    'slug' => $slug,
                ]);

                foreach ($itemData as $locale => $data) {
                    if (!empty($data['title'])) {
                        $item->translateOrNew($locale)->title = $data['title'];
                    }
                }

                $item->save();

                $processedIds[] = $item->id;
            }
        }

        // SAFE DELETE
        if (!empty($processedIds)) {
            $footer->items()->whereNotIn('id', $processedIds)->delete();
        }

        return back()->with('success', __('translate.Successfully completed'));
    }



        public function order(Request $request)
    {
        foreach ($request->order as $item) {
            Footer::where('id', $item['id'])->update(['order' => $item['order']]);
        }
        return response()->json(['status' => 'success']);
    }

}
