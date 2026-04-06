<?php

namespace App\Services;

use App\Models\Message;
use App\Repositories\Contracts\MessageRepositoryInterface;
use App\Services\Contracts\MessageServiceInterface;
use Crud\Services\BaseCrudService;
use Illuminate\Database\Eloquent\Model;

class MessageService extends BaseCrudService implements MessageServiceInterface
{
    public function __construct(MessageRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

    public function read(Model|int $modelOrModelId): void
    {
        $this->repository->read($modelOrModelId);
    }

    public function send(array $payload): void
    {
        $this->repository->send($payload);
    }
}
