<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Crud\Services\Contracts\BaseCrudServiceInterface;
use Illuminate\Database\Eloquent\Collection;

interface StudentProjectServiceInterface extends BaseCrudServiceInterface
{
    public function search(string $keyword, array|string $columns = '*'): Collection;

    public function viewCount(Model $model): void;

}
