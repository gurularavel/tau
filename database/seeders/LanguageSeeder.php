<?php

namespace Database\Seeders;

use App\Repositories\Contracts\LanguageRepositoryInterface;

class LanguageSeeder extends BaseSeeder
{
    public function __construct(private readonly LanguageRepositoryInterface $repository)
    {
        $this->setPayload('languages');
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->create($this->repository);
    }
}
