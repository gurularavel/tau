<?php

namespace Database\Seeders;

use App\Models\StudentLifeClub;
use Illuminate\Database\Seeder;
use App\Traits\FileManagable;

class StudentLifeClubSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'studentLifeClub';

    public function run(): void
    {
        $this->command->info('Creating uploads/' . self::TARGET . ' folder');
        $this->remakeFolder(self::TARGET);

        $this->command->info('Creating ' . self::TARGET);

        StudentLifeClub::factory()
            ->count(1)->create();

        $this->command->info('1 fake page ' . self::TARGET . ' are created');
    }
}
