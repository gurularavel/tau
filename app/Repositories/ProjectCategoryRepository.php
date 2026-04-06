<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Repositories\Contracts\ProjectCategoryRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProjectCategoryRepository extends EloquentRepository implements ProjectCategoryRepositoryInterface
{
    public function __construct(
        ProjectCategory $model,
    )
    {
        parent::__construct($model);
    }

    public function deleteById(Model|int $modelOrModelId): bool
    {
        $modelOrModelId->projects()->update([
            'is_active' => Project::IS_ACTIVE,
        ]);
        return parent::deleteById($modelOrModelId);
    }
}
