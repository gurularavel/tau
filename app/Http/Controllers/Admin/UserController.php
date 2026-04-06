<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Services\Contracts\RoleServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private const PATH = 'admin.users.';

    private const TITLE = 'Users';

    public function __construct(
        private readonly RoleServiceInterface $roleService,
        private readonly UserServiceInterface $userService,
    )
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $model = new User();
        $attributes = $model::attributes();
        $roles = $this->roleService->getAll(['id', 'name']);

        return view(self::PATH . 'create', [
            'attributes' => $attributes,
            'model' => $model,
            'roles' => $roles,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $this->userService->delete($user);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $attributes = $user::attributes();
        $roles = $this->roleService->getAll(['id', 'name']);

        return view(self::PATH . 'edit', [
            'attributes' => $attributes,
            'model' => $user,
            'roles' => $roles,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param UserRequest $request
     * @return View
     */
    public function index(UserRequest $request): View
    {
        $models = $this->userService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'image', 'name', 'email'],
        );

        $attributes = User::attributes();
        $headerAttributes = User::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
        ]);
    }

    /**
     * @return View
     */
    public function showProfile(): View
    {
        $attributes = User::attributes();

        return view('admin.profile.index', [
            'attributes' => $attributes,
            'model' => auth()->user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $this->userService->create($payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $payload = array_filter($request->validated());

        $this->userService->update($user, $payload, $request->file('image'));

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Update authed user data in storage.
     */
    public function updateProfile(UpdateProfileRequest $request): RedirectResponse
    {
        $payload = array_filter($request->validated());

        $this->userService->update(auth()->user(), $payload, $request->file('image'));

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', __('translate.Successfully completed'));
    }

    public function editProfile()
    {
        $user = auth()->user();

        return view('admin.profile.edit', [
            'model' => $user,
        ]);
    }
}
