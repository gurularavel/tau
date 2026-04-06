<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlockItemRequest;
use App\Models\AboutMenuPage;
use App\Models\Block;
use App\Models\BlockItem;
use App\Services\AboutMenuPageService;
use App\Services\Contracts\AboutMenuPageServiceInterface;
use App\Services\Contracts\BlockItemServiceInterface;
use App\Services\Contracts\BlockServiceInterface;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlockItemController extends Controller
{
    use FileManagable;
    private const PATH = 'admin.block_items.';

    private const TITLE = 'Block items';

    public function __construct(private readonly BlockItemServiceInterface $blockItemService, private readonly AboutMenuPageServiceInterface $about_menu_page)
    {
        $this->authorizeResource(BlockItem::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new BlockItem();
        $attributes = $model::attributes();
        $latestBlockItem = BlockItem::orderBy('order', 'desc')->first();
        $latestSorting = $latestBlockItem ? $latestBlockItem->order + 1 : 1;

        return view(self::PATH . 'create', [
            'attributes' => $attributes,
            'model' => $model,
            'title' => self::TITLE,
            'latestSorting' => $latestSorting,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlockItem $block_item): RedirectResponse
    {
        $this->blockItemService->delete($block_item);

        return redirect()->route('admin.block_items.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlockItem $block_item): View
    {
        $attributes = $block_item::attributes();
        $about_menu_page = $this->$about_menu_page->getAll(['id'], [['is_active', '=', AboutMenuPage::IS_ACTIVE]]);

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $block_item,
            '$about_menu_page' => $about_menu_page,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param BlockItemRequest $request
     * @return View
     */
    public function index(BlockItemRequest $request): View
    {
        $models = $this->blockItemService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'order', 'is_active']);
        $attributes = BlockItem::attributes();
        $headerAttributes = BlockItem::headerAttributes();

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
    public function show(BlockItem $block_item): View
    {
        return view(self::PATH . 'show', [
            'model' => $block_item,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlockItemRequest $request
     * @return RedirectResponse
     */
    public function store(BlockItemRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->blockItemService->create($payload, $request->file('image'));

        return redirect()->route('admin.block_items.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlockItemRequest $request, BlockItem $block_item): RedirectResponse
    {
        $payload = $request->validated();

        $this->blockItemService->update($block_item, $payload, $request->file('image'));

        return redirect()->route('admin.block_items.edit', $block_item)->with('success', __('translate.Successfully completed'));
    }

    public function order(Request $request)
    {
        foreach ($request->order as $index => $id) {
            BlockItem::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['status' => 'success']);
    }
}
