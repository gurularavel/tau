<?php

namespace App\Repositories;

use App\Models\HistoryPage;
use App\Repositories\Contracts\HistoryPageRepositoryInterface;
use Crud\Repositories\EloquentRepository;

class HistoryPageRepository extends EloquentRepository implements HistoryPageRepositoryInterface
{
    public function __construct(HistoryPage $model)
    {
        parent::__construct($model);
    }
}
