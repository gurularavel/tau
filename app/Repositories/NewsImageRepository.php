<?php

namespace App\Repositories;

use App\Models\NewsImage;
use App\Repositories\Contracts\NewsImageRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class NewsImageRepository extends EloquentRepository implements NewsImageRepositoryInterface
{
    public function __construct(NewsImage $model)
    {
        parent::__construct($model);
    }
}
