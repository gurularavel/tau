<?php

namespace Database\Seeders;

use App\Models\CampusGalleryPage;
use App\Models\CareerPage;
use App\Models\CareerPageImage;
use Illuminate\Database\Seeder;
use App\Traits\FileManagable;

class CampusGalleryPageSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'campusGalleryPage';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating uploads/' . self::TARGET . ' folder');
        $this->remakeFolder(self::TARGET);

        $this->command->info('Creating ' . self::TARGET);


        CampusGalleryPage::factory()
            ->count(1)->create();

        $this->command->info('1 fake page ' . self::TARGET . ' are created');
    }
}
