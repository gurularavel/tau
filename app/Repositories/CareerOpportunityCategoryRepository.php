<?php

namespace App\Repositories;

use App\Models\CareerOpportunity;
use App\Models\CareerOpportunityCategory;
use App\Repositories\Contracts\CareerOpportunityCategoryRepositoryInterface;
use Crud\Repositories\EloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CareerOpportunityCategoryRepository extends EloquentRepository implements CareerOpportunityCategoryRepositoryInterface
{
    public function __construct(
        CareerOpportunityCategory $model,
    )
    {
        parent::__construct($model);
    }

    public function deleteById(Model|int $modelOrModelId): bool
    {
        $modelOrModelId->careerOpportunities()->update([
            'is_active' => CareerOpportunity::IS_ACTIVE,
        ]);
        return parent::deleteById($modelOrModelId);
    }
}
