<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Menus';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('menus');

        $menus = [
            // Parent menus
            [
                'title' => [
                    'az' => 'Haqqımızda',
                    'en' => 'About Us',
                    'ru' => 'О нас',
                    'tr' => 'Hakkımızda',
                ],
                'order' => 1,
            ],
            [
                'title' => [
                    'az' => 'Proqramlar',
                    'en' => 'Programs',
                    'ru' => 'Программы',
                    'tr' => 'Programlar',
                ],
                'order' => 2,
            ],
            [
                'title' => [
                    'az' => 'Akademik',
                    'en' => 'Academic',
                    'ru' => 'Академический',
                    'tr' => 'Akademik',
                ],
                'order' => 3,
            ],
            [
                'title' => [
                    'az' => 'Tədqiqat',
                    'en' => 'Research',
                    'ru' => 'Исследования',
                    'tr' => 'Araştırma',
                ],
                'order' => 4,
            ],
            [
                'title' => [
                    'az' => 'TAU Təcrübəsi',
                    'en' => 'TAU Experience',
                    'ru' => 'Опыт TAU',
                    'tr' => 'TAU Deneyimi',
                ],
                'order' => 5,
            ],
            [
                'title' => [
                    'az' => 'Media',
                    'en' => 'Media',
                    'ru' => 'Медиа',
                    'tr' => 'Medya',
                ],
                'order' => 6,
            ],
            [
                'title' => [
                    'az' => 'Əlaqə',
                    'en' => 'Contact',
                    'ru' => 'Контакты',
                    'tr' => 'İletişim',
                ],
                'slug' => 'contact-us',
                'order' => 7,
            ],

            // Haqqımızda children
            [
                'title' => [
                    'az' => 'Tarixçə',
                    'en' => 'History',
                    'ru' => 'История',
                    'tr' => 'Tarihçe',
                ],
                'slug' => 'pages/tarixce',
                'parent_id' => 1,
                'order' => 1,
            ],
            [
                'title' => [
                    'az' => 'Missiyamız',
                    'en' => 'Our Mission',
                    'ru' => 'Наша миссия',
                    'tr' => 'Misyonumuz',
                ],
                'slug' => 'pages/missiyamiz',
                'parent_id' => 1,
                'order' => 2,
            ],
            [
                'title' => [
                    'az' => 'Çətir universitetlər',
                    'en' => 'Umbrella Universities',
                    'ru' => 'Дочерние университеты',
                    'tr' => 'Şemsiye Üniversiteler',
                ],
                'slug' => 'pages/cetir-universitetler',
                'parent_id' => 1,
                'order' => 3,
            ],
            [
                'title' => [
                    'az' => 'Himayəçilər şurası',
                    'en' => 'Board of Trustees',
                    'ru' => 'Совет попечителей',
                    'tr' => 'Mütevelli Heyeti',
                ],
                'slug' => 'pages/himayeciler-surasi',
                'parent_id' => 1,
                'order' => 4,
            ],
            [
                'title' => [
                    'az' => 'Akademik siyasət',
                    'en' => 'Academic Policy',
                    'ru' => 'Академическая политика',
                    'tr' => 'Akademik Politika',
                ],
                'slug' => 'pages/akademik-siyaset',
                'parent_id' => 1,
                'order' => 5,
            ],
            [
                'title' => [
                    'az' => 'Struktur',
                    'en' => 'Structure',
                    'ru' => 'Структура',
                    'tr' => 'Yapı',
                ],
                'slug' => 'pages/struktur',
                'parent_id' => 1,
                'order' => 6,
            ],
            [
                'title' => [
                    'az' => 'Strateji plan',
                    'en' => 'Strategic Plan',
                    'ru' => 'Стратегический план',
                    'tr' => 'Stratejik Plan',
                ],
                'slug' => 'pages/strateji-plan',
                'parent_id' => 1,
                'order' => 7,
            ],

            // Proqramlar children
            [
                'title' => [
                    'az' => 'Kompüter mühəndisliyi',
                    'en' => 'Computer Engineering',
                    'ru' => 'Компьютерная инженерия',
                    'tr' => 'Bilgisayar Mühendisliği',
                ],
                'slug' => 'programs/komputer-muhendisliyi',
                'parent_id' => 2,
                'order' => 1,
            ],
            [
                'title' => [
                    'az' => 'Sənaye mühəndisliyi',
                    'en' => 'Industrial Engineering',
                    'ru' => 'Промышленная инженерия',
                    'tr' => 'Endüstri Mühendisliği',
                ],
                'slug' => 'programs/senaye-muhendisliyi',
                'parent_id' => 2,
                'order' => 2,
            ],
            [
                'title' => [
                    'az' => 'Qida mühəndisliyi',
                    'en' => 'Food Engineering',
                    'ru' => 'Пищевая инженерия',
                    'tr' => 'Gıda Mühendisliği',
                ],
                'slug' => 'programs/qida-muhendisliyi',
                'parent_id' => 2,
                'order' => 3,
            ],
            [
                'title' => [
                     'az' => 'İngilis dili hazırlığı',
                    'en' => 'English Language Preparation',
                    'ru' => 'Подготовка по английскому языку',
                    'tr' => 'İngilizce Hazırlık',
                ],
                'slug' => 'programs/ingilis-hazirliq',
                'parent_id' => 2,
                'order' => 4,
            ],

            // Akademik children
            [
                'title' => [
                    'az' => 'Elmi şura',
                    'en' => 'Academic Council',
                    'ru' => 'Научный совет',
                    'tr' => 'Akademik Konsey',
                ],
                'slug' => 'pages/elmi-sura',
                'parent_id' => 3,
                'order' => 1,
            ],
            [
                'title' => [
                    'az' => 'Akademik təqvim',
                    'en' => 'Academic Calendar',
                    'ru' => 'Академический календарь',
                    'tr' => 'Akademik Takvim',
                ],
                'slug' => 'academic-calendar',
                'parent_id' => 3,
                'order' => 2,
            ],
            [
                'title' => [
                    'az' => 'Vakansiyalar',
                    'en' => 'Vacancies',
                    'ru' => 'Вакансии',
                    'tr' => 'İş İlanları',
                ],
                'slug' => 'career',
                'parent_id' => 3,
                'order' => 3,
            ],

            // Tədqiqat children
            [
                'title' => [
                    'az' => 'Layihələr',
                    'en' => 'Projects',
                    'ru' => 'Проекты',
                    'tr' => 'Projeler',
                ],
                'slug' => 'projects',
                'parent_id' => 4,
                'order' => 1,
            ],
            [
                'title' => [
                    'az' => 'Akademik tədbirlər',
                    'en' => 'Academic Events',
                    'ru' => 'Академические мероприятия',
                    'tr' => 'Akademik Etkinlikler',
                ],
                'slug' => 'events',
                'parent_id' => 4,
                'order' => 2,
            ],

            // TAU Təcrübəsi children
            [
                'title' => [
                    'az' => 'Məktəblilərlə görüş',
                    'en' => 'School Meetings',
                    'ru' => 'Встречи со школами',
                    'tr' => 'Okul Toplantıları',
                ],
                'slug' => 'campus-gallery',
                'parent_id' => 5,
                'order' => 1,
            ],
            [
                'title' => [
                    'az' => 'Qəbul balları',
                    'en' => 'Admission Scores',
                    'ru' => 'Баллы приёма',
                    'tr' => 'Kabul Puanları',
                ],
                'slug' => 'pages/qebul-ballari',
                'parent_id' => 5,
                'order' => 2,
            ],
            [
                'title' => [
                    'az' => 'Tələbə layihələri',
                    'en' => 'Student Projects',
                    'ru' => 'Студенческие проекты',
                    'tr' => 'Öğrenci Projeleri',
                ],
                'slug' => 'student-projects',
                'parent_id' => 5,
                'order' => 3,
            ],

            [
                'title' => [
                    'az' => 'Uğur hekayələri',
                    'en' => 'Success Stories',
                    'ru' => 'Истории успеха',
                    'tr' => 'Başarı Hikayeleri',
                ],
                'slug' => 'pages/ugur-hekayeleri',
                'parent_id' => 5,
                'order' => 4,
            ],
            [
                'title' => [
                    'az' => 'Sosial həyat',
                    'en' => 'Social Life',
                    'ru' => 'Социальная жизнь',
                    'tr' => 'Sosyal Hayat',
                ],
                'slug' => 'student-clubs',
                'parent_id' => 5,
                'order' => 5,
            ],
            [
                'title' => [
                    'az' => 'Laboratoriya',
                    'en' => 'Laboratory',
                    'ru' => 'Лаборатория',
                    'tr' => 'Laboratuvar',
                ],
                'slug' => 'laboratories',
                'parent_id' => 5,
                'order' => 6,
            ],
            [
                'title' => [
                    'az' => 'Təcrübə proqramları',
                    'en' => 'Internship Programs',
                    'ru' => 'Стажировки',
                    'tr' => 'Staj Programları',
                ],
                'slug' => 'internship-programs',
                'parent_id' => 5,
                'order' => 7,
            ],
            [
                'title' => [
                    'az' => 'Karyera imkanları',
                    'en' => 'Career Opportunities',
                    'ru' => 'Карьера',
                    'tr' => 'Kariyer Fırsatları',
                ],
                'slug' => 'career-opportunities',
                'parent_id' => 5,
                'order' => 8,
            ],
            [
                'title' => [
                    'az' => 'Məzunlar',
                    'en' => 'Alumni',
                    'ru' => 'Выпускники',
                    'tr' => 'Mezunlar',
                ],
                'slug' => 'graduates',
                'parent_id' => 5,
                'order' => 9,
            ],

            // Media children
            [
                'title' => [
                    'az' => 'Xəbərlər',
                    'en' => 'News',
                    'ru' => 'Новости',
                    'tr' => 'Haberler',
                ],
                'slug' => 'news',
                'parent_id' => 6,
                'order' => 1,
            ],
            [
                'title' => [
                    'az' => 'Elanlar',
                    'en' => 'Announcements',
                    'ru' => 'Объявления',
                    'tr' => 'Duyurular',
                ],
                'slug' => 'announcements',
                'parent_id' => 6,
                'order' => 2,
            ],
            [
                'title' => [
                    'az' => 'Media bələdçisi',
                    'en' => 'Media Guide',
                    'ru' => 'Медиа-гид',
                    'tr' => 'Medya Rehberi',
                ],
                'slug' => 'media-guide',
                'parent_id' => 6,
                'order' => 3,
            ],
        ];

        foreach ($menus as $menu) {
            $translations = [
                'title' => $menu['title'],
            ];

            unset($menu['title']);

            $menu = Menu::create($menu);
            foreach (['az', 'en', 'ru', 'tr'] as $locale) {
                $menu->translateOrNew($locale)->title = $translations['title'][$locale];
            }
            $menu->save();
        }

        $this->command->info(count($menus) . ' ' . self::TARGET . ' created.');
    }
}
