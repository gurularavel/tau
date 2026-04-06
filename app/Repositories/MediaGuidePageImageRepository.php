<?php

namespace App\Repositories;

use App\Models\MediaGuidePageImage;
use App\Repositories\Contracts\MediaGuidePageImageRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class MediaGuidePageImageRepository extends EloquentRepository implements MediaGuidePageImageRepositoryInterface
{
    public function __construct(MediaGuidePageImage $model)
    {
        parent::__construct($model);
    }
}
