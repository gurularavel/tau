<?php

namespace Database\Seeders;

use App\Models\ProjectPage;
use App\Models\StudentClubPage;
use Illuminate\Database\Seeder;
use App\Traits\FileManagable;

class StudentClubPageSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'studentClubPage';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating uploads/' . self::TARGET . ' folder');
        $this->remakeFolder(self::TARGET);

        $this->command->info('Creating ' . self::TARGET);


        StudentClubPage::factory()
            ->count(1)->create();

        $this->command->info('1 fake page ' . self::TARGET . ' are created');
    }
}
