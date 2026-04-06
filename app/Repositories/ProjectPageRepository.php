<?php

namespace App\Repositories;

use App\Models\ProjectPage;
use App\Repositories\Contracts\ProjectPageRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectPageRepository extends EloquentRepository implements ProjectPageRepositoryInterface
{
    public function __construct(ProjectPage $model)
    {
        parent::__construct($model);
    }

    public function create(array $payload): Model
    {
        return DB::transaction(function () use ($payload) {
            $model = parent::create($payload);

            return $model;
        });
    }

    public function update(Model|int $modelOrModelId, array $payload): Model
    {
        return DB::transaction(function () use ($modelOrModelId, $payload) {
            $model = parent::update($modelOrModelId, $payload);

            return $model;
        });
    }


    public function search(string $keyword, array|string $columns = '*'): Collection
    {
        return ProjectPage::query()
            ->whereTranslationLike('title', "%$keyword%")
            ->orWhereTranslationLike('description', "%$keyword%")
            ->orWhereTranslationLike('meta_keywords', "%$keyword%")
            ->orWhereTranslationLike('meta_description', "%$keyword%")
            ->get($columns);
    }
}
