<?php

namespace Database\Seeders;

use App\Models\MediaGuidePage;
use App\Models\MediaGuidePageImage;
use Illuminate\Database\Seeder;
use App\Traits\FileManagable;

class MediaGuidePageSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'mediaGuidePage';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating uploads/' . self::TARGET . ' folder');
        $this->remakeFolder(self::TARGET);
        $this->remakeFolder('media_guide_page_images');

        $this->command->info('Creating ' . self::TARGET);

        MediaGuidePage::factory()->count(1)->create();
                for ($i = 1; $i <= 8; $i++) {
            $fileName = 'mediaGuidePage' . $i . '.svg';

            moveFactoryImageToUploads('media_guide_page_images', 'media_guide_page_images', $fileName);

            MediaGuidePageImage::create([
                'media_guide_page_id' => 1,
                'image' => $fileName,
                'order' => $i,
            ]);
        }


        $this->command->info('1 fake page ' . self::TARGET . ' are created');
    }
}
