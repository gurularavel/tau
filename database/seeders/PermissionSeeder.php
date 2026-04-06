<?php

namespace Database\Seeders;

use App\Repositories\Contracts\PermissionRepositoryInterface;

class PermissionSeeder extends BaseSeeder
{
    public function __construct(private readonly PermissionRepositoryInterface $repository)
    {
        $this->setPayload('permissions');
    }

    public function run(): void
    {
        $this->create($this->repository);
    }
}
