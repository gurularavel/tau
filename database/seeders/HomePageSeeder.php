<?php

namespace Database\Seeders;

use App\Models\HomePage;
use Illuminate\Database\Seeder;
use App\Traits\FileManagable;

class HomePageSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'homePage';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->command->info('Creating uploads/' . self::TARGET . ' folder');
        $this->remakeFolder(self::TARGET);

        HomePage::factory()->create();

        $this->command->info('1 fake ' . self::TARGET . ' are created');
    }
}
