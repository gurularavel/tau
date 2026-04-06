<?php

namespace Database\Seeders;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function __construct(private readonly UserRepositoryInterface $repository)
    {
        $this->setPayload('users');
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->create($this->repository);
    }
}
