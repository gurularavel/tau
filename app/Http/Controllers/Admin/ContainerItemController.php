<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContainerItemRequest;
use App\Models\Container;
use App\Models\ContainerItem;
use App\Services\Contracts\ContainerItemServiceInterface;
use App\Services\Contracts\ContainerServiceInterface;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContainerItemController extends Controller
{
    use FileManagable;
    private const PATH = 'admin.container_items.';

    private const TITLE = 'Container items';

    public function __construct(private readonly ContainerItemServiceInterface $containerItemService, private readonly ContainerServiceInterface $containers)
    {
        $this->authorizeResource(ContainerItem::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new Container();
        $attributes = $model::attributes();
        $latestContainerItem = ContainerItem::orderBy('order', 'desc')->first();
        $latestSorting = $latestContainerItem ? $latestContainerItem->order + 1 : 1;

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
    public function destroy(ContainerItem $container_item): RedirectResponse
    {
        $this->containerItemService->delete($container_item);

        return redirect()->route('admin.container_items.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContainerItem $container_item): View
    {
        $attributes = $container_item::attributes();
        $containers = $this->containers->getAll(['id'], [['is_active', '=', Container::IS_ACTIVE]]);

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $container_item,
            'containers' => $containers,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param ContainerItemRequest $request
     * @return View
     */
    public function index(ContainerItemRequest $request): View
    {
        $models = $this->containerItemService->getAllPaginated(requestParser: $request->parser(), columns: ['id', 'order', 'is_active']);
        $attributes = ContainerItem::attributes();
        $headerAttributes = ContainerItem::headerAttributes();

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
    public function show(ContainerItem $container_item): View
    {
        return view(self::PATH . 'show', [
            'model' => $container_item,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContainerItemRequest $request
     * @return RedirectResponse
     */
    public function store(ContainerItemRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->containerItemService->create($payload, $request->file('image'));

        return redirect()->route('admin.container_items.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContainerItemRequest $request, ContainerItem $container_item): RedirectResponse
    {
        $payload = $request->validated();

        $this->containerItemService->update($container_item, $payload, $request->file('image'));

        return redirect()->route('admin.container_items.edit', $container_item)->with('success', __('translate.Successfully completed'));
    }

    public function order(Request $request)
    {
        foreach ($request->order as $index => $id) {
            ContainerItem::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['status' => 'success']);
    }
}
