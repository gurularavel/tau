<?php

namespace App\Repositories;

use App\Models\ProjectImage;
use App\Models\StudentClubImage;
use App\Repositories\Contracts\StudentClubImageRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class StudentClubImageRepository extends EloquentRepository implements StudentClubImageRepositoryInterface
{
    public function __construct(StudentClubImage $model)
    {
        parent::__construct($model);
    }
}
