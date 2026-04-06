<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Model;
use Crud\Services\Contracts\BaseCrudServiceInterface;
use Illuminate\Database\Eloquent\Collection;

interface CareerPageServiceInterface extends BaseCrudServiceInterface
{
    public function search(string $keyword, array|string $columns = '*'): Collection;

}
