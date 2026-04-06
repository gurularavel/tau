<?php

namespace App\Repositories\Contracts;

use Crud\Repositories\Contracts\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

interface MessageRepositoryInterface extends EloquentRepositoryInterface
{
    public function read(Model|int $modelOrModelId): void;

    public function send(array $payload): void;
}
