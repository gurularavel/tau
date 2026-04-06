<?php

namespace App\Repositories;

use App\Models\HomePage;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\HomePageRepositoryInterface;

class HomePageRepository extends EloquentRepository implements HomePageRepositoryInterface
{
    public function __construct(HomePage $model)
    {
        parent::__construct($model);
    }

    public function update(Model|int $modelOrModelId, array $payload): Model
    {
        return DB::transaction(function () use ($modelOrModelId, $payload) {
            $model = parent::update($modelOrModelId, $payload);


            return $model;
        });
    }
}
