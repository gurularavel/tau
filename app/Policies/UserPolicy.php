<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class UserPolicy extends BasePolicy
{
    protected const PERMISSION_ROOT = 'users.';

    public function delete(User $user, ?Model $model): bool
    {
        if($user->is($model)) {
            return false;
        }
        return parent::delete($user, $model);
    }
}
