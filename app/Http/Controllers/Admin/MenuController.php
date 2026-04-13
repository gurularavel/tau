<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuRequest;
use App\Models\Menu;
use App\Models\Project;
use App\Services\Contracts\MenuServiceInterface;
use App\Traits\FileManagable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    use FileManagable;
    private const PATH = 'admin.menus.';

    private const TITLE = 'Menu';

    public function __construct(private readonly MenuServiceInterface $menuService)
    {
        $this->authorizeResource(Menu::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(Request $request): View
    {
        $model = new Menu();
        $attributes = $model::attributes();
        $menus = Menu::all();

        $latestMenu = Menu::orderBy('order', 'desc')->first();

        $latestSorting = $latestMenu ? $latestMenu->order + 1 : 1;

        return view(self::PATH . 'create', [
            'attributes' => $attributes,
            'model' => $model,
            'title' => self::TITLE,
            'menus' => $menus,
            'latestSorting' => $latestSorting,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $this->menuService->delete($menu);

        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.menus.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu): View
    {
        $attributes = $menu::attributes();
        $menus = Menu::where('id', '!=', $menu->id)->get();
        $latestMenu = $menu->order;

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $menu,
            'title' => self::TITLE,
            'menus' => $menus,
                        'latestSorting' => $latestMenu,

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param MenuRequest $request
     * @return View
     */
    public function index(MenuRequest $request): View
    {
      $models = Menu::with('children')->get();
        $attributes = Menu::attributes();
        $headerAttributes = Menu::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
            'path' => self::PATH
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu): View
    {
        return view(self::PATH . 'show', [
            'model' => $menu,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MenuRequest $request
     * @return RedirectResponse
     */
    public function store(MenuRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->menuService->create($payload, $request->file('image'));

        return redirect()->route('admin.menus.index')->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu): RedirectResponse
    {
        $payload = $request->validated();

        $this->menuService->update($menu, $payload, $request->file('image'));

        return redirect()->route('admin.menus.edit', $menu)->with('success', __('translate.Successfully completed'));
    }

    public function deleteImage(Menu $menu)
    {
        $this->deleteFile('menus', $menu->image);

        $this->menuService->update($menu, [
            'image' => null,
        ]);

        return response()->json(['success' => true]);
    }
public function order(Request $request)
{
    // Göndərilən orders massivini dövrə salırıq
    foreach ($request->orders as $item) {
        Menu::where('id', $item['id'])->update([
            'order' => $item['order']
        ]);
    }

    return response()->json(['status' => 'success']);
}
public function toggleStatus(Request $request)
{
    $menu = Menu::findOrFail($request->id);
    $menu->is_active = !$menu->is_active; // Statusu dəyişirik
    $menu->save();

    return response()->json([
        'status' => 'success',
        'is_active' => $menu->is_active,
        'message' => 'Status yeniləndi'
    ]);
}
}
