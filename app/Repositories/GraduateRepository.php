<?php

namespace App\Repositories;

use App\Models\Graduate;
use App\Repositories\Contracts\GraduateRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GraduateRepository extends EloquentRepository implements GraduateRepositoryInterface
{
    public function __construct(Graduate $model)
    {
        parent::__construct($model);
    }

    public function create(array $payload): Model
    {
        return DB::transaction(function () use ($payload) {
            $model = parent::create($payload);
              if (isset($payload['images'])) {
                $model->images()->createMany($payload['images']);
            }


            return $model;
        });
    }

    public function update(Model|int $modelOrModelId, array $payload): Model
    {
        return DB::transaction(function () use ($modelOrModelId, $payload) {
            $model = parent::update($modelOrModelId, $payload);
     if (isset($payload['images'])) {
                $model->images()->createMany($payload['images']);
            }

            return $model;
        });
    }

    public function viewCount(Model $model): void
    {
        $model->increment('view_counts');
    }

    public function search(string $keyword, array|string $columns = '*'): Collection
    {
        return Graduate::query()

            ->get($columns);
    }
}
