<?php

namespace App\Repositories;

use App\Models\DynamicImage;
use App\Repositories\Contracts\DynamicImageRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class DynamicImageRepository extends EloquentRepository implements DynamicImageRepositoryInterface
{
    public function __construct(DynamicImage $model)
    {
        parent::__construct($model);
    }
}
