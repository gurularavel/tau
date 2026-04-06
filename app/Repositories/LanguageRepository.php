<?php

namespace App\Repositories;

use App\Models\Language;
use App\Repositories\Contracts\LanguageRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LanguageRepository extends EloquentRepository implements LanguageRepositoryInterface
{
    public function __construct(Language $model)
    {
        parent::__construct($model);
    }

    public function create(array $payload): Model
    {
        return DB::transaction(function () use ($payload): Model {
            return parent::create($payload);
        });
    }

    public function disableMainLanguage(): void
    {
        $this->model->newQuery()
            ->where('is_main', Language::IS_MAIN)
            ->update(['is_main' => !Language::IS_MAIN]);
    }

    public function update(Model|int $modelOrModelId, array $payload): Model
    {
        return DB::transaction(function () use ($modelOrModelId, $payload): Model {
            return parent::update($modelOrModelId, $payload);
        });
    }
}
