<?php

namespace App\Repositories;

use App\Models\CareerOpportunityPage;
use App\Repositories\Contracts\CareerOpportunityPageRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CareerOpportunityPageRepository extends EloquentRepository implements CareerOpportunityPageRepositoryInterface
{
    public function __construct(CareerOpportunityPage $model)
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
        return CareerOpportunityPage::query()
            ->whereTranslationLike('title', "%$keyword%")
            ->orWhereTranslationLike('description', "%$keyword%")
            ->orWhereTranslationLike('meta_keywords', "%$keyword%")
            ->orWhereTranslationLike('meta_description', "%$keyword%")
            ->get($columns);
    }
}
