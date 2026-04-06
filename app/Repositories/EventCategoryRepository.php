<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\EventCategory;
use App\Repositories\Contracts\EventCategoryRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EventCategoryRepository extends EloquentRepository implements EventCategoryRepositoryInterface
{
    public function __construct(
        EventCategory $model,
    )
    {
        parent::__construct($model);
    }

    public function deleteById(Model|int $modelOrModelId): bool
    {
        $modelOrModelId->events()->update([
            'is_active' => Event::IS_ACTIVE,
        ]);
        return parent::deleteById($modelOrModelId);
    }
}
