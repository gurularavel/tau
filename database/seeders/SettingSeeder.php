<?php

namespace Database\Seeders;

use App\Repositories\Contracts\SettingRepositoryInterface;
use App\Traits\FileManagable;

class SettingSeeder extends BaseSeeder
{
    use FileManagable;

    private const TARGET = 'settings';

    public function __construct(private readonly SettingRepositoryInterface $repository)
    {
        $this->setPayload(self::TARGET);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating uploads/' . self::TARGET . ' folder');
        $this->remakeFolder(self::TARGET);

        $this->command->info('Creating ' . self::TARGET);

        $this->createWithCopyingImage($this->repository, 'value');
    }
}
