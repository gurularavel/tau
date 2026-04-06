<?php

namespace App\Repositories;

use App\Models\MediaGuidePage;
use App\Models\CareerPage;
use App\Repositories\Contracts\MediaGuidePageRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MediaGuidePageRepository extends EloquentRepository implements MediaGuidePageRepositoryInterface
{
    public function __construct(MediaGuidePage $model)
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


    public function search(string $keyword, array|string $columns = '*'): Collection
    {
        return MediaGuidePage::query()
            ->whereTranslationLike('title', "%$keyword%")
            ->orWhereTranslationLike('description', "%$keyword%")
            ->orWhereTranslationLike('meta_keywords', "%$keyword%")
            ->orWhereTranslationLike('meta_description', "%$keyword%")
            ->get($columns);
    }
}
