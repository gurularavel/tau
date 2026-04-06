<?php

namespace Database\Seeders;

use App\Models\Footer;
use App\Models\FooterItem;
use App\Models\InternshipItem;
use App\Models\InternshipProgram;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Footer and items';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $footers = [
            [
                'order' => 1,
                'title' => [
                    'az' => 'Universitet',
                    'en' => 'University',
                    'ru' => 'Университет',
                    'tr' => 'Üniversite',
                ],

            ],

            [
                 'order' => 2,
                'title' => [
                    'az' => 'Proqramlar',
                    'en' => 'Programs',
                    'ru' => 'Программы',
                    'tr' => 'Programlar',
                ],
            ],
            [
                 'order' => 3,
                'title' => [
                    'az' => 'Media',
                    'en' => 'Media',
                    'ru' => 'Медиа',
                    'tr' => 'Medya',
                ],
            ],
            [
                 'order' => 4,
                'title' => [
                    'az' => 'Çətir universitet',
                    'en' => 'Umbrella University',
                    'ru' => 'Зонтичный университет',
                    'tr' => 'Şemsiye üniversite',
                ],
            ],
        ];

        $items = [
            [
                'footer_id' => 1,
                'order' => 1,
                'slug' => 'tarixce',
                'title' => [
                    'az' => 'Tarixçə',
                    'en' => 'History',
                    'ru' => 'История',
                    'tr' => 'Tarihçe',
                ],
            ],

            [
                'footer_id' => 1,
                'order' => 2,
                'slug' => '',
                'title' => [
                    'az' => 'Qəbul qaydaları',
                    'en' => 'Admission rules',
                    'ru' => 'Правила приёма',
                    'tr' => 'Kabul kuralları',
                ],
            ],

            [
                'footer_id' => 1,
                'order' => 3,
                'slug' => '',
                'title' => [
                    'az' => 'Qəbul günləri',
                    'en' => 'Reception days',
                    'ru' => 'Приёмные дни',
                    'tr' => 'Kabul günleri',
                ],
            ],

            [
                'footer_id' => 1,
                'order' => 4,
                'slug' => '',
                'title' => [
                    'az' => 'Komissiyalar',
                    'en' => 'Commissions',
                    'ru' => 'Комиссии',
                    'tr' => 'Komisyonlar',
                ],
            ],

            [
                'footer_id' => 1,
                'order' => 5,
                'slug' => '',
                'title' => [
                    'az' => 'TAU-da dayanıqlılıq',
                    'en' => 'Sustainability at TAU',
                    'ru' => 'Устойчивое развитие в TAU',
                    'tr' => 'TAU’da sürdürülebilirlik',
                ],
            ],
            //footer 2
            [
                'footer_id' => 2,
                'order' => 1,
                'slug' => 'programs/komputer-muhendisliyi',
                'title' => [
                    'az' => 'Kompüter mühəndisliyi',
                    'en' => 'Computer Engineering',
                    'ru' => 'Компьютерная инженерия',
                    'tr' => 'Bilgisayar Mühendisliği',
                ],
            ],
            [
                'footer_id' => 2,
                'order' => 2,
                'slug' => '',
                'title' => [
                    'az' => 'Sənaye mühəndisliyi',
                    'en' => 'Industrial Engineering',
                    'ru' => 'Промышленная инженерия',
                    'tr' => 'Endüstri Mühendisliği',
                ],
            ],

            [
                'footer_id' => 2,
                'order' => 3,
                'slug' => '',
                'title' => [
                    'az' => 'Qida mühəndisliyi',
                    'en' => 'Food Engineering',
                    'ru' => 'Пищевая инженерия',
                    'tr' => 'Gıda Mühendisliği',
                ],
            ],

            [
                'footer_id' => 2,
                'order' => 4,
                'slug' => '',
                'title' => [
                    'az' => 'Hazırlıq',
                    'en' => 'Preparatory',
                    'ru' => 'Подготовка',
                    'tr' => 'Hazırlık',
                ],
            ],

            //footer 3

            [
                'footer_id' => 3,
                'order' => 1,
                'slug' => 'news',
                'title' => [
                    'az' => 'Xəbərlər',
                    'en' => 'News',
                    'ru' => 'Новости',
                    'tr' => 'Haberler',
                ],
            ],

            [
                'footer_id' => 3,
                'order' => 2,
                'slug' => 'announcements',
                'title' => [
                    'az' => 'Elanlar',
                    'en' => 'Announcements',
                    'ru' => 'Объявления',
                    'tr' => 'Duyurular',
                ],
            ],

            [
                'footer_id' => 3,
                'order' => 4,
                'slug' => 'media-guide',
                'title' => [
                    'az' => 'Media bələdçisi',
                    'en' => 'Media guide',
                    'ru' => 'Медиагид',
                    'tr' => 'Medya rehberi',
                ],
            ],

            [
                'footer_id' => 3,
                'order' => 5,
                'slug' => '',
                'title' => [
                    'az' => 'Media əlaqələndirici',
                    'en' => 'Media contact',
                    'ru' => 'Медиаконтакт',
                    'tr' => 'Medya iletişim',
                ],
            ],

            //footer 4

            [
                'footer_id' => 4,
                'order' => 1,
                'slug' => '',
                'title' => [
                    'az' => 'Media əlaqələndirici',
                    'en' => 'Media əlaqələndirici',
                    'ru' => 'Media əlaqələndirici',
                    'tr' => 'Media əlaqələndirici',
                ],
            ],

            [
                'footer_id' => 4,
                'order' => 2,
                'slug' => '',
                'title' => [
                    'az' => 'İTÜ',
                    'en' => 'İTÜ',
                    'ru' => 'İTÜ',
                    'tr' => 'İTÜ',
                ],
            ],

            [
                'footer_id' => 4,
                'order' => 3,
                'slug' => '',
                'title' => [
                    'az' => 'Hacettepe',
                    'en' => 'Hacettepe',
                    'ru' => 'Hacettepe',
                    'tr' => 'Hacettepe',
                ],
            ],

            [
                'footer_id' => 4,
                'order' => 4,
                'slug' => '',
                'title' => [
                    'az' => 'AZTU',
                    'en' => 'AZTU',
                    'ru' => 'AZTU',
                    'tr' => 'AZTU',
                ],
            ],
        ];
        seedTranslationAttributes(Footer::class, $footers);
        seedTranslationAttributes(FooterItem::class, $items);

        $this->command->info(count($footers) . ' Footer created.');
    }
}
