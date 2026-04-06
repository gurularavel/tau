<?php

namespace App\Repositories\Contracts;

use Crud\Repositories\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface NewsRepositoryInterface extends EloquentRepositoryInterface
{
    public function latest(array|string $columns = '*', ?string $latestColumn = null, array $conditions = []): Model|null;

    public function next(Model $model, array|string $columns = '*'): Model|null;

    public function previous(Model $model, array|string $columns = '*'): Model|null;

    public function search(string $keyword, array|string $columns = '*'): Collection;

    public function viewCount(Model $model): void;
}
