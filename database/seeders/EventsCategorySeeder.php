<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use App\Models\EventsPage;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class EventsCategorySeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Event Categories';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('event_categories');
        $eventCategories = [
            [
                'slug' => 'akademik',
                'title' => [
                    'az' => 'Akademik',
                    'en' => 'Academic',
                    'ru' => 'Академический',
                    'tr' => 'Akademik',
                ],
                'meta_title' => [
                    'az' => 'Akademik Tədbirlər',
                    'en' => 'Academic Events',
                    'ru' => 'Академические мероприятия',
                    'tr' => 'Akademik Etkinlikler',
                ],
                'meta_description' => [
                    'az' => 'Akademik kateqoriyasına aid tədbirlər',
                    'en' => 'Events in the academic category',
                    'ru' => 'Мероприятия в академической категории',
                    'tr' => 'Akademik kategorisindeki etkinlikler',
                ],
                'meta_keywords' => [
                    'az' => 'akademik, təhsil, konfrans',
                    'en' => 'academic, education, conference',
                    'ru' => 'академический, образование, конференция',
                    'tr' => 'akademik, eğitim, konferans',
                ],
            ],
            [
                'slug' => 'dovlet',
                'title' => [
                    'az' => 'Dövlət',
                    'en' => 'Government',
                    'ru' => 'Государственный',
                    'tr' => 'Devlet',
                ],
                'meta_title' => [
                    'az' => 'Dövlət Tədbirləri',
                    'en' => 'Government Events',
                    'ru' => 'Государственные мероприятия',
                    'tr' => 'Devlet Etkinlikleri',
                ],
                'meta_description' => [
                    'az' => 'Dövlət əhəmiyyətli tədbirlər',
                    'en' => 'Events of government importance',
                    'ru' => 'Мероприятия государственного значения',
                    'tr' => 'Devlet düzeyindeki etkinlikler',
                ],
                'meta_keywords' => [
                    'az' => 'dövlət, rəsmi, tədbir',
                    'en' => 'government, official, event',
                    'ru' => 'государство, официальный, мероприятие',
                    'tr' => 'devlet, resmi, etkinlik',
                ],
            ],
            [
                'slug' => 'siyasi',
                'title' => [
                    'az' => 'Siyasi',
                    'en' => 'Political',
                    'ru' => 'Политический',
                    'tr' => 'Siyasi',
                ],
                'meta_title' => [
                    'az' => 'Siyasi Tədbirlər',
                    'en' => 'Political Events',
                    'ru' => 'Политические мероприятия',
                    'tr' => 'Siyasi Etkinlikler',
                ],
                'meta_description' => [
                    'az' => 'Siyasi mövzuda olan tədbirlər',
                    'en' => 'Events on political topics',
                    'ru' => 'Мероприятия на политические темы',
                    'tr' => 'Siyasi konulardaki etkinlikler',
                ],
                'meta_keywords' => [
                    'az' => 'siyasi, siyasət, görüş',
                    'en' => 'political, politics, meeting',
                    'ru' => 'политический, политика, встреча',
                    'tr' => 'siyasi, siyaset, görüşme',
                ],
            ],
        ];

        seedTranslationAttributes(EventCategory::class, $eventCategories);

        $this->command->info(count($eventCategories) . ' Event categories created.');
    }
}
