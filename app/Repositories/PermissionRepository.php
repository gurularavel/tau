<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use App\Repositories\Contracts\PermissionRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class PermissionRepository extends EloquentRepository implements PermissionRepositoryInterface
{
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
}
