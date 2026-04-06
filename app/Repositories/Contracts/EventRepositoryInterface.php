<?php

namespace App\Repositories\Contracts;

use Crud\Repositories\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EventRepositoryInterface extends EloquentRepositoryInterface
{
    public function search(string $keyword, array|string $columns = '*'): Collection;
    public function viewCount(Model $model): void;

}
