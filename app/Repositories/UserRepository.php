<?php

namespace App\Repositories;


use App\Models\Admin;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function create(array $payload): Model
    {
        return DB::transaction(function () use ($payload) {
            $model = parent::create(Arr::except($payload, 'role_id'));

            $model->roles()->attach($payload['role_id']);

            return $model;
        });
    }

    public function update(Model|int $modelOrModelId, array $payload): Model
    {
        return DB::transaction(function () use ($modelOrModelId, $payload) {
            $model = parent::update($modelOrModelId, Arr::except($payload, 'role_id'));

            if(isset($payload['role_id'])) {
                $model->roles()->sync($payload['role_id']);
            }
            return $model;
        });
    }
}
