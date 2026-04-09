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
        // Hər sətir üçün ortaq slug-ı tapmaq (ilk mövcud dildən götürürük)
        $firstLocale = array_key_first($itemData);
        $row = $itemData[$firstLocale];

        // Əgər manual input (slug_manual) doludursa onu istifadə et,
        // yoxdursa select-lərdən gələni yoxla
        $slug = null;
        if (!empty($row['slug_external'])) {
            $slug = $row['slug_external'];
        } elseif (!empty($row['slug_manual'])) {
            $slug = $row['slug_manual'];
        } elseif (!empty($row['slug_select'])) {
            $slug = $row['slug_select'];
        } elseif (!empty($row['slug_program'])) {
            $slug = $row['slug_program'];
        }

        // Əgər başlıq yoxdursa və slug yoxdursa bazaya boş sətir yazmayaq
        $hasTitle = false;
        foreach ($itemData as $data) {
            if (!empty($data['title'])) {
                $hasTitle = true;
                break;
            }
        }

        if ($hasTitle || $slug) {
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
    $processedIds = [];

    foreach ($incomingItems as $itemId => $itemData) {
        $firstLocale = array_key_first($itemData);
        $row = $itemData[$firstLocale];

        // Slug təyini: External > Manual > Page > Program
        $slug = null;
        if (!empty($row['slug_external'])) {
            $slug = $row['slug_external'];
        } elseif (!empty($row['slug_manual'])) {
            $slug = $row['slug_manual'];
        } elseif (!empty($row['slug_select'])) {
            $slug = $row['slug_select'];
        } elseif (!empty($row['slug_program'])) {
            $slug = $row['slug_program'];
        }

        // Mövcud ID-dirsə UPDATE, "new_" ilə başlayırsa CREATE
        if (is_numeric($itemId)) {
            $item = $footer->items()->find($itemId);
            if ($item) {
                $item->update(['slug' => $slug]);
                $processedIds[] = $item->id;
            }
        } else {
            $item = $footer->items()->create(['slug' => $slug]);
            $processedIds[] = $item->id;
        }

        if ($item) {
            foreach ($itemData as $locale => $data) {
                if (!empty($data['title'])) {
                    $item->translateOrNew($locale)->title = $data['title'];
                }
            }
            $item->save();
        }
    }

    // Silinmiş sətirləri təmizlə
    $footer->items()->whereNotIn('id', $processedIds)->delete();

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
