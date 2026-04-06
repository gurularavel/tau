<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\Contracts\RoleRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoleRepository extends EloquentRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function create(array $payload): Model
    {
        return DB::transaction(function () use ($payload) {
            $model = parent::create($payload);
            if (isset($payload['permissions_id'])) {
                $model->permissions()->attach($payload['permissions_id']);
            }
            return $model;
        });
    }

    public function update(Model|int $modelOrModelId, array $payload): Model
    {
        return DB::transaction(function () use ($modelOrModelId, $payload) {
            $model = parent::update($modelOrModelId, $payload);
            if (isset($payload['permissions_id'])) {
                $model->permissions()->sync($payload['permissions_id']);
            }
            return $model;
        });
    }
}
