<?php

namespace App\Repositories;

use App\Models\ContactPage;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\ContactPageRepositoryInterface;

class ContactPageRepository extends EloquentRepository implements ContactPageRepositoryInterface
{
    public function __construct(ContactPage $model)
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
