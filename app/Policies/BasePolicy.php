<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

class BasePolicy
{
    use HandlesAuthorization;

    protected const PERMISSION_ROOT = 'users.';

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can(static::PERMISSION_ROOT . 'index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Model|null $model
     * @return bool
     */
    public function view(User $user, ?Model $model): bool
    {
        return $user->can(static::PERMISSION_ROOT . 'show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can(static::PERMISSION_ROOT . 'create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Model|null $model
     * @return bool
     */
    public function update(User $user, ?Model $model): bool
    {
        return $user->can(static::PERMISSION_ROOT . 'update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Model|null $model
     * @return bool
     */
    public function delete(User $user, ?Model $model): bool
    {
        return $user->can(static::PERMISSION_ROOT . 'delete');
    }
}
