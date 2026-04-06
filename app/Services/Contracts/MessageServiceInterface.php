<?php

namespace App\Services\Contracts;

use App\Models\Message;
use Crud\Services\Contracts\BaseCrudServiceInterface;
use Illuminate\Database\Eloquent\Model;

interface MessageServiceInterface extends BaseCrudServiceInterface
{
    public function read(Model|int $modelOrModelId): void;

    public function send(array $payload): void;
}
