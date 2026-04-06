<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Services\Contracts\RoleServiceInterface;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Admin\RoleRequest;

class RoleController extends Controller
{
    private const PATH = 'admin.roles.';

    private const TITLE = 'Roles';

    public function __construct(private readonly RoleServiceInterface $roleService)
    {
        $this->authorizeResource(Role::class);
    }
    public function create(): View
    {
        $model = new Role();
        $attributes = $model::attributes();
        $permissions = Permission::all();

        return view(self::PATH . 'create', [
            'attributes' => $attributes,
            'model' => $model,
            'permissions' => $permissions,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $this->roleService->delete($role);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $attributes = $role::attributes();
        $permissions = Permission::all();

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $role,
            'permissions' => $permissions,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param RoleRequest $request
     * @return View
     */
    public function index(RoleRequest $request): View
    {
        $models = $this->roleService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'name'],
        );
        $attributes = Role::attributes();
        $headerAttributes = Role::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */

    /**
     * Display the specified resource.
     */
    public function show(Role $role): View
    {
        return view(self::PATH . 'show', [
            'model' => $role,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->roleService->create($payload);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role): RedirectResponse
    {
        $payload = $request->validated();

        $this->roleService->update($role, $payload);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }
}
