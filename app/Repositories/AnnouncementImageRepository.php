<?php

namespace App\Repositories;

use App\Models\AnnouncementImage;
use App\Repositories\Contracts\AnnouncementImageRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class AnnouncementImageRepository extends EloquentRepository implements AnnouncementImageRepositoryInterface
{
    public function __construct(AnnouncementImage $model)
    {
        parent::__construct($model);
    }
}
