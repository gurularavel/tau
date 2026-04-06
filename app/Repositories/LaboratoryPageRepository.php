<?php

namespace App\Repositories;

use App\Models\ProjectPage;
use App\Models\LaboratoryPage;
use App\Repositories\Contracts\LaboratoryPageRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LaboratoryPageRepository extends EloquentRepository implements LaboratoryPageRepositoryInterface
{
    public function __construct(LaboratoryPage $model)
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
        return LaboratoryPage::query()
            ->whereTranslationLike('title', "%$keyword%")
            ->orWhereTranslationLike('description', "%$keyword%")
            ->orWhereTranslationLike('meta_keywords', "%$keyword%")
            ->orWhereTranslationLike('meta_description', "%$keyword%")
            ->get($columns);
    }
}
