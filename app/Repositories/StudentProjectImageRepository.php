<?php

namespace App\Repositories;

use App\Models\ProjectImage;
use App\Models\StudentProjectImage;
use App\Repositories\Contracts\StudentProjectImageRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class StudentProjectImageRepository extends EloquentRepository implements StudentProjectImageRepositoryInterface
{
    public function __construct(StudentProjectImage $model)
    {
        parent::__construct($model);
    }
}
