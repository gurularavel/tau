<?php

namespace App\Repositories;

use App\Models\ProjectImage;
use App\Repositories\Contracts\ProjectImageRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class ProjectImageRepository extends EloquentRepository implements ProjectImageRepositoryInterface
{
    public function __construct(ProjectImage $model)
    {
        parent::__construct($model);
    }
}
