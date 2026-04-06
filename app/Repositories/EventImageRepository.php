<?php

namespace App\Repositories;

use App\Models\EventImage;
use App\Repositories\Contracts\EventImageRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class EventImageRepository extends EloquentRepository implements EventImageRepositoryInterface
{
    public function __construct(EventImage $model)
    {
        parent::__construct($model);
    }
}
