<?php

namespace App\Services\Contracts;

use Crud\Services\Contracts\BaseCrudServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProgramServiceInterface extends BaseCrudServiceInterface
{
    public function latest(array|string $columns = '*', ?string $latestColumn = null, array $conditions = []): Model|null;

    public function next(Model $model, array|string $columns = '*'): Model|null;

    public function previous(Model $model, array|string $columns = '*'): Model|null;

    public function related(Model $model, array|string $columns = '*'): Collection;

    public function search(string $keyword, array|string $columns = '*'): Collection;

    public function viewCount(Model $model): void;
}
