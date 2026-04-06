<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use App\Models\ProjectsPage;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class ProjectsCategorySeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Project Categories';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('project_categories');

  $projectCategories = [
    [
        'slug' => 'komputer-muhendisliyi',
        'title' => [
            'az' => 'Kompüter Mühəndisliyi',
            'en' => 'Computer Engineering',
            'ru' => 'Компьютерная инженерия',
            'tr' => 'Bilgisayar Mühendisliği',
        ],
    ],
    [
        'slug' => 'kiber-tehlukesizlik-ve-mudafie',
        'title' => [
            'az' => 'Kiber Təhlükəsizlik və Müdafiə',
            'en' => 'Cyber Security & Defense',
            'ru' => 'Кибербезопасность и защита',
            'tr' => 'Siber Güvenlik ve Savunma',
        ],
    ],
    [
        'slug' => 'suni-intellekt-ve-data-elmi',
        'title' => [
            'az' => 'Süni İntellekt və Data Elmi',
            'en' => 'AI and Data Science',
            'ru' => 'Искусственный интеллект и наука о данных',
            'tr' => 'Yapay Zeka ve Veri Bilimi',
        ],
    ],
    [
        'slug' => 'reqemsal-transformasiya',
        'title' => [
            'az' => 'Rəqəmsal Transformasiya',
            'en' => 'Digital Transformation',
            'ru' => 'Цифровая трансформация',
            'tr' => 'Dijital Dönüşüm',
        ],
    ],
];

        seedTranslationAttributes(ProjectCategory::class, $projectCategories);

        $this->command->info(count($projectCategories) . ' Project categories created.');
    }
}
