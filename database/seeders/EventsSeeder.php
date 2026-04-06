<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventCategory;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Events';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('events');

        for ($i = 1; $i <= 3; $i++) {
            moveFactoryImageToUploads('events', 'events', 'event' . $i . '.jpg');
        }

        $events = [
            [
                'image' => 'event1.jpg',
                'event_category_id' => 1,
                'slug' => 'tedbir',
                'title' => [
                    'az' => 'Tədbir',
                    'en' => 'Event',
                    'ru' => 'Мероприятие',
                    'tr' => 'Etkinlik',
                ],
                'description' => [
                    'az' => 'Tədbir mətni',
                    'en' => 'Event text',
                    'ru' => 'Текст мероприятия',
                    'tr' => 'Etkinlik metni',
                ],
                'meta_title' => [
                    'az' => 'Tədbir',
                    'en' => 'Event',
                    'ru' => 'Мероприятие',
                    'tr' => 'Etkinlik',
                ],
                'meta_description' => [
                    'az' => 'Tədbir haqqında ətraflı məlumat',
                    'en' => 'Detailed information about the event',
                    'ru' => 'Подробная информация о мероприятии',
                    'tr' => 'Etkinlik hakkında detaylı bilgi',
                ],
                'meta_keywords' => [
                    'az' => 'tədbir, görüş, konfrans',
                    'en' => 'event, meeting, conference',
                    'ru' => 'мероприятие, встреча, конференция',
                    'tr' => 'etkinlik, toplantı, konferans',
                ],
            ],
            [
                'image' => 'event2.jpg',
                'event_category_id' => 2,
                'slug' => 'tedbir-2',
                'title' => [
                    'az' => 'Tədbir 2',
                    'en' => 'Event 2',
                    'ru' => 'Мероприятие 2',
                    'tr' => 'Etkinlik 2',
                ],
                'description' => [
                    'az' => 'Tədbir 2 mətni',
                    'en' => 'Event 2 text',
                    'ru' => 'Текст мероприятия 2',
                    'tr' => 'Etkinlik 2 metni',
                ],
                'meta_title' => [
                    'az' => 'Tədbir 2',
                    'en' => 'Event 2',
                    'ru' => 'Мероприятие 2',
                    'tr' => 'Etkinlik 2',
                ],
                'meta_description' => [
                    'az' => 'İkinci tədbir haqqında məlumat',
                    'en' => 'Information about the second event',
                    'ru' => 'Информация о втором мероприятии',
                    'tr' => 'İkinci etkinlik hakkında bilgi',
                ],
                'meta_keywords' => [
                    'az' => 'tədbir 2, yeni tədbir',
                    'en' => 'event 2, new event',
                    'ru' => 'мероприятие 2, новое мероприятие',
                    'tr' => 'etkinlik 2, yeni etkinlik',
                ],
            ],
            [
                'image' => 'event3.jpg',
                'event_category_id' => 3,
                'slug' => 'tedbir-3',
                'title' => [
                    'az' => 'Tədbir 3',
                    'en' => 'Event 3',
                    'ru' => 'Мероприятие 3',
                    'tr' => 'Etkinlik 3',
                ],
                'description' => [
                    'az' => 'Tədbir mətni',
                    'en' => 'Event text',
                    'ru' => 'Текст мероприятия',
                    'tr' => 'Etkinlik metni',
                ],
                'meta_title' => [
                    'az' => 'Tədbir 3',
                    'en' => 'Event 3',
                    'ru' => 'Мероприятие 3',
                    'tr' => 'Etkinlik 3',
                ],
                'meta_description' => [
                    'az' => 'Üçüncü tədbir haqqında məlumat',
                    'en' => 'Information about the third event',
                    'ru' => 'Информация о третьем мероприятии',
                    'tr' => 'Üçüncü etkinlik hakkında bilgi',
                ],
                'meta_keywords' => [
                    'az' => 'tədbir 3, son tədbir',
                    'en' => 'event 3, last event',
                    'ru' => 'мероприятие 3, последнее мероприятие',
                    'tr' => 'etkinlik 3, son etkinlik',
                ],
            ],
        ];
        seedTranslationAttributes(Event::class, $events);

        $this->command->info(count($events) . ' Events created.');
    }
}
