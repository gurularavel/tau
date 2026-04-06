<?php

namespace App\Repositories;

use App\Models\Dynamic;
use App\Repositories\Contracts\DynamicRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Dynamic Repository
 *
 * @author Hasan Musa <hsmusayev@gmail.com>
 */
class DynamicRepository extends EloquentRepository implements DynamicRepositoryInterface
{
    public function __construct(Dynamic $model)
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

    public function latest(array|string $columns = '*', ?string $latestColumn = null, array $conditions = []): Model|null
    {
        $query = $this->model->newQuery();

        foreach ($conditions as $condition) {
            $query->where($condition[0], $condition[1], $condition[2]);
        }

        return $query->latest($latestColumn)->first($columns);
    }

    public function next(Model $model, array|string $columns = '*'): Model|null
    {
        return $this->model
            ->newQuery()
            ->where('id', '>', $model->id)
            ->oldest()
            ->first($columns);
    }

    public function previous(Model $model, array|string $columns = '*'): Model|null
    {
        return $this->model
            ->newQuery()
            ->where('id', '<', $model->id)
            ->latest()
            ->first($columns);
    }

    public function search(string $keyword, array|string $columns = '*'): Collection
    {
        return Dynamic::query()
            ->whereTranslationLike('title', "%$keyword%")
            ->orWhereTranslationLike('description', "%$keyword%")
            ->orWhereTranslationLike('content', "%$keyword%")
            ->latest('created_at')
            ->get($columns);
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
}
