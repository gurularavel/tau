<?php

namespace Database\Seeders;

use App\Models\Dynamic;
use App\Models\DynamicItem;
use App\Models\Page;
use Illuminate\Database\Seeder;
use App\Traits\FileManagable;

class PageSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'pages';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->remakeFolder(self::TARGET);
        $this->remakeFolder('dynamic_items');
        $this->remakeFolder('dynamics');

        for ($i = 1; $i <= 10; $i++) {
            moveFactoryImageToUploads('pages', 'pages', 'page' . $i . '.jpg');
        }
        for ($i = 1; $i <= 23; $i++) {
            moveFactoryImageToUploads('dynamic_items', 'dynamic_items', 'dynamic_item' . $i . '.svg');
        }
        for ($i = 1; $i <= 23; $i++) {
            moveFactoryImageToUploads('dynamic_items', 'dynamic_items', 'dynamic_item' . $i . '.jpg');
        }
        moveFactoryImageToUploads('pages', 'dynamics', 'page1dynamic1.jpg');
        moveFactoryImageToUploads('pages', 'dynamics', 'page3dynamic1.jpg');

        $pages = [
            [
                'title' => [
                    'az' => 'Tarixçə',
                    'en' => 'History',
                    'ru' => 'История',
                    'tr' => 'Tarihçe',
                ],
                'meta_title' => [
                    'az' => 'Tarixçə',
                    'en' => 'History',
                    'ru' => 'История',
                    'tr' => 'Tarihçe',
                ],
                'meta_description' => [
                    'az' => 'Tarixçə',
                    'en' => 'History of the institution',
                    'ru' => 'История учреждения',
                    'tr' => 'Kurumun tarihçesi',
                ],
                'meta_keywords' => [
                    'az' => 'Tarixçə',
                    'en' => 'history',
                    'ru' => 'история',
                    'tr' => 'tarihçe',
                ],
                'slug' => 'tarixce',
                'image' => 'page1.jpg',
                'dynamic_ids' => [1, 2, 3, 4],
            ],

            [
                'title' => [
                    'az' => 'Missiyamız',
                    'en' => 'Our Mission',
                    'ru' => 'Наша миссия',
                    'tr' => 'Misyonumuz',
                ],
                'meta_title' => [
                    'az' => 'Missiyamız',
                    'en' => 'Our Mission',
                    'ru' => 'Наша миссия',
                    'tr' => 'Misyonumuz',
                ],
                'meta_description' => [
                    'az' => 'Missiyamız',
                    'en' => 'Our mission and goals',
                    'ru' => 'Наша миссия и цели',
                    'tr' => 'Misyonumuz ve hedeflerimiz',
                ],
                'meta_keywords' => [
                    'az' => 'Missiyamız',
                    'en' => 'mission, goals',
                    'ru' => 'миссия, цели',
                    'tr' => 'misyon, hedefler',
                ],
                'slug' => 'missiyamiz',
                'image' => 'page2.jpg',
                'dynamic_ids' => [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
            ],
            [
                'title' => [
                    'az' => 'Çətir Universitetlər',
                    'en' => 'Umbrella Universities',
                    'ru' => 'Зонтичные университеты',
                    'tr' => 'Şemsiye Üniversiteler',
                ],
                'meta_title' => [
                    'az' => 'Çətir Universitetlər',
                    'en' => 'Umbrella Universities',
                    'ru' => 'Зонтичные университеты',
                    'tr' => 'Şemsiye Üniversiteler',
                ],
                'meta_description' => [
                    'az' => 'Çətir Universitetlər',
                    'en' => 'Umbrella universities program',
                    'ru' => 'Программа зонтичных университетов',
                    'tr' => 'Şemsiye üniversiteler programı',
                ],
                'meta_keywords' => [
                    'az' => 'Çətir Universitetlər',
                    'en' => 'umbrella universities',
                    'ru' => 'зонтичные университеты',
                    'tr' => 'şemsiye üniversiteler',
                ],
                'slug' => 'cetir-universitetler',
                'image' => 'page3.jpg',
                'dynamic_ids' => [17, 18],
            ],
            [
                'title' => [
                    'az' => 'Himayəçilər şurası',
                    'en' => 'Board of Trustees',
                    'ru' => 'Попечительский совет',
                    'tr' => 'Mütevelli Heyeti',
                ],
                'meta_title' => [
                    'az' => 'Himayəçilər şurası',
                    'en' => 'Board of Trustees',
                    'ru' => 'Попечительский совет',
                    'tr' => 'Mütevelli Heyeti',
                ],
                'meta_description' => [
                    'az' => 'Himayəçilər şurası',
                    'en' => 'Members of the Board of Trustees',
                    'ru' => 'Члены Попечительского совета',
                    'tr' => 'Mütevelli Heyeti üyeleri',
                ],
                'meta_keywords' => [
                    'az' => 'Himayəçilər şurası',
                    'en' => 'board of trustees, management',
                    'ru' => 'попечительский совет',
                    'tr' => 'mütevelli heyeti',
                ],
                'slug' => 'himayeciler-surasi',
                'image' => 'page4.jpg',
                'dynamic_ids' => [19, 20, 21],
            ],
            [
                'title' => [
                    'az' => 'Akademik siyasət',
                    'en' => 'Academic Policy',
                    'ru' => 'Академическая политика',
                    'tr' => 'Akademik Politika',
                ],
                'meta_title' => [
                    'az' => 'Akademik siyasət',
                    'en' => 'Academic Policy',
                    'ru' => 'Академическая политика',
                    'tr' => 'Akademik Politika',
                ],
                'meta_description' => [
                    'az' => 'Akademik siyasət',
                    'en' => 'Rules and academic policy',
                    'ru' => 'Правила и академическая политика',
                    'tr' => 'Kurallar ve akademik politika',
                ],
                'meta_keywords' => [
                    'az' => 'Akademik siyasət',
                    'en' => 'academic policy, rules',
                    'ru' => 'академическая политика',
                    'tr' => 'akademik politika, kurallar',
                ],
                'slug' => 'akademik-siyaset',
                'image' => 'page5.jpg',
                'dynamic_ids' => [22, 23, 24, 25],
            ],

            [
                'title' => [
                    'az' => 'Struktur',
                    'en' => 'Structure',
                    'ru' => 'Структура',
                    'tr' => 'Yapı',
                ],
                'meta_title' => [
                    'az' => 'Struktur',
                    'en' => 'Structure',
                    'ru' => 'Структура',
                    'tr' => 'Yapı',
                ],
                'meta_description' => [
                    'az' => 'Struktur',
                    'en' => 'Organizational structure',
                    'ru' => 'Организационная структура',
                    'tr' => 'Organizasyonel yapı',
                ],
                'meta_keywords' => [
                    'az' => 'Struktur',
                    'en' => 'structure, organization',
                    'ru' => 'структура',
                    'tr' => 'yapı, organizasyon',
                ],
                'slug' => 'struktur',
                'image' => 'page6.jpg',
                'dynamic_ids' => [26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37],
            ],
            [
                'title' => [
                    'az' => 'Strateji plan',
                    'en' => 'Strategic Plan',
                    'ru' => 'Стратегический план',
                    'tr' => 'Stratejik Plan',
                ],
                'meta_title' => [
                    'az' => 'Strateji plan',
                    'en' => 'Strategic Plan',
                    'ru' => 'Стратегический план',
                    'tr' => 'Stratejik Plan',
                ],
                'meta_description' => [
                    'az' => 'Strateji plan',
                    'en' => 'Long-term strategic plan',
                    'ru' => 'Долгосрочный стратегический план',
                    'tr' => 'Uzun vadeli stratejik plan',
                ],
                'meta_keywords' => [
                    'az' => 'Strateji plan',
                    'en' => 'strategy, plan',
                    'ru' => 'стратегия, план',
                    'tr' => 'strateji, plan',
                ],
                'slug' => 'strateji-plan',
                'image' => 'page7.jpg',
                'dynamic_ids' => [38, 39, 40],
            ],
            [
                'title' => [
                    'az' => 'Elmi şura',
                    'en' => 'Scientific Council',
                    'ru' => 'Ученый совет',
                    'tr' => 'Bilimsel Konsey',
                ],
                'meta_title' => [
                    'az' => 'Elmi şura',
                    'en' => 'Scientific Council',
                    'ru' => 'Ученый совет',
                    'tr' => 'Bilimsel Konsey',
                ],
                'meta_description' => [
                    'az' => 'Elmi şura',
                    'en' => 'Scientific Council members',
                    'ru' => 'Члены Ученого совета',
                    'tr' => 'Bilimsel Konsey üyeleri',
                ],
                'meta_keywords' => [
                    'az' => 'Elmi şura',
                    'en' => 'scientific council',
                    'ru' => 'ученый совет',
                    'tr' => 'bilimsel konsey',
                ],
                'slug' => 'elmi-sura',
                'image' => 'page8.jpg',
                'dynamic_ids' => [41, 42, 43, 44, 45],
            ],
            [
                'title' => [
                    'az' => 'Qəbul balları',
                    'en' => 'Admission Scores',
                    'ru' => 'Проходные баллы',
                    'tr' => 'Giriş Puanları',
                ],
                'meta_title' => [
                    'az' => 'Qəbul balları',
                    'en' => 'Admission Scores',
                    'ru' => 'Проходные баллы',
                    'tr' => 'Giriş Puanları',
                ],
                'meta_description' => [
                    'az' => 'Qəbul balları',
                    'en' => 'Minimum admission scores',
                    'ru' => 'Минимальные проходные баллы',
                    'tr' => 'Minimum giriş puanları',
                ],
                'meta_keywords' => [
                    'az' => 'Qəbul balları',
                    'en' => 'admission scores, points',
                    'ru' => 'проходные баллы',
                    'tr' => 'giriş puanları',
                ],
                'slug' => 'qebul-ballari',
                'image' => 'page9.jpg',
                'dynamic_ids' => [46, 47, 48],
            ],

            [
                'title' => [
                    'az' => 'Uğur hekayələri',
                    'en' => 'Success stories',
                    'ru' => 'Истории успеха',
                    'tr' => 'Başarı hikayeleri',
                ],
                'meta_title' => [
                    'az' => 'Uğur hekayələri - Bizimlə uğura gedən yol',
                    'en' => 'Success stories - The path to success with us',
                    'ru' => 'Истории успеха - Путь к успеху вместе с нами',
                    'tr' => 'Başarı hikayeleri - Bizimle başarıya giden yol',
                ],
                'meta_description' => [
                    'az' => 'Müştərilərimizin və tərəfdaşlarımızın əldə etdiyi real uğur hekayələri ilə tanış olun.',
                    'en' => 'Discover real success stories achieved by our customers and partners.',
                    'ru' => 'Ознакомьтесь с реальными историями успеха наших клиентов и партнеров.',
                    'tr' => 'Müşterilerimizin ve ortaklarımızın gerçek başarı hikayelerini keşfedin.',
                ],
                'meta_keywords' => [
                    'az' => 'uğur, hekayə, nailiyyət, təcrübə, inkişaf',
                    'en' => 'success, story, achievement, experience, development',
                    'ru' => 'успех, история, достижение, опыт, развитие',
                    'tr' => 'başarı, hikaye, başarı hikayeleri, tecrübe, gelişim',
                ],
                'slug' => 'ugur-hekayeleri',
                'image' => 'page10.jpg',
                'dynamic_ids' => [49, 50, 51, 52],
            ],
        ];
        $dynamics = [
            [
                'title' => [
                    'az' => 'TAU haqqında',
                    'en' => 'TAU haqqında',
                    'ru' => 'TAU haqqında',
                    'tr' => 'TAU haqqında',
                ],

                'type' => 1,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'half',
            ],
            [
                'description' => [
                    'az' => '<span style="color: rgb(72, 72, 72); font-family: "Noto Sans", sans-serif; font-size: 16px; letter-spacing: 0%;">Türk-Azərbaycan Universitetinin missiyası, vizyonu, quruluşu və akademik siyasəti haqqında ətraflı məlumat</span>',
                    'en' => '<span style="color: rgb(72, 72, 72); font-family: "Noto Sans", sans-serif; font-size: 16px; letter-spacing: 0%;">Türk-Azərbaycan Universitetinin missiyası, vizyonu, quruluşu və akademik siyasəti haqqında ətraflı məlumat</span>',
                    'ru' => '<span style="color: rgb(72, 72, 72); font-family: "Noto Sans", sans-serif; font-size: 16px; letter-spacing: 0%;">Türk-Azərbaycan Universitetinin missiyası, vizyonu, quruluşu və akademik siyasəti haqqında ətraflı məlumat</span>',
                    'tr' => '<span style="color: rgb(72, 72, 72); font-family: "Noto Sans", sans-serif; font-size: 16px; letter-spacing: 0%;">Türk-Azərbaycan Universitetinin missiyası, vizyonu, quruluşu və akademik siyasəti haqqında ətraflı məlumat</span>',
                ],

                'type' => 2,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'half',
            ],
            [
                'type' => 3,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 3,
                'layout_width' => 'full',
                'image' => 'page1dynamic1.jpg',
            ],
            [
                'dynamic_item_ids' => [1, 2, 3, 4, 5, 6],
                'type' => 6,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 4,
                'layout_width' => 'full',
            ],

            //Page 2
            [
                'title' => [
                    'az' => 'Universitetin yaranması',
                    'en' => 'Universitetin yaranması',
                    'ru' => 'Universitetin yaranması',
                    'tr' => 'Universitetin yaranması',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],
            [
                'title' => [
                    'az' => 'Əsas məqsəd',
                    'en' => 'Əsas məqsəd',
                    'ru' => 'Əsas məqsəd',
                    'tr' => 'Əsas məqsəd',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 3,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 4,
                'layout_width' => 'full',
            ],
            [
                'dynamic_item_ids' => [7],
                'type' => 6,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 5,
                'layout_width' => 'full',
            ],
            [
                'title' => [
                    'az' => 'Bizim missiyamız',
                    'en' => 'Bizim missiyamız',
                    'ru' => 'Bizim missiyamız',
                    'tr' => 'Bizim missiyamız',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 6,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 7,
                'layout_width' => 'full',
            ],
            [
                'dynamic_item_ids' => [8, 9, 10, 11],
                'type' => 6,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 8,
                'layout_width' => 'full',
            ],

            [
                'title' => [
                    'az' => 'Bizim Vizyonumuz',
                    'en' => 'Bizim Vizyonumuz',
                    'ru' => 'Bizim Vizyonumuz',
                    'tr' => 'Bizim Vizyonumuz',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 9,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 10,
                'layout_width' => 'full',
            ],

            [
                'title' => [
                    'az' => 'Perspektivlərimiz',
                    'en' => 'Perspektivlərimiz',
                    'ru' => 'Perspektivlərimiz',
                    'tr' => 'Perspektivlərimiz',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 11,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 12,
                'layout_width' => 'full',
            ],
            [
                'type' => 3,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'half',
                'image' => 'page3dynamic1.jpg',
            ],
            [
                'dynamic_item_ids' => [12, 13, 14, 15],
                'type' => 6,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'half',
            ],

            // page 4 dynamics

            [
                'title' => [
                    'az' => 'Himayəçilər şurası',
                    'en' => 'Himayəçilər şurası',
                    'ru' => 'Himayəçilər şurası',
                    'tr' => 'Himayəçilər şurası',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],

            [
                'dynamic_item_ids' => [16, 17, 18, 19, 20, 21],
                'type' => 6,
                'order' => 3,
                'layout_row' => 1,
                'layout_column' => 3,
                'layout_width' => 'full',
            ],
            // page 5 dynamics
            [
                'title' => [
                    'az' => 'Akademik siyasət',
                    'en' => 'Akademik siyasət',
                    'ru' => 'Akademik siyasət',
                    'tr' => 'Akademik siyasət',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],

            [
                'dynamic_item_ids' => [22],
                'type' => 6,
                'order' => 3,
                'layout_row' => 1,
                'layout_column' => 3,
                'layout_width' => 'full',
            ],

            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 4,
                'layout_row' => 1,
                'layout_column' => 4,
                'layout_width' => 'full',
            ],

            //page 6 dynamics

            [
                'title' => [
                    'az' => 'Struktur',
                    'en' => 'Struktur',
                    'ru' => 'Struktur',
                    'tr' => 'Struktur',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],
            [
                'title' => [
                    'az' => 'Rəhbərlik',
                    'en' => 'Rəhbərlik',
                    'ru' => 'Rəhbərlik',
                    'tr' => 'Rəhbərlik',
                ],
                'type' => 1,
                'order' => 3,
                'layout_row' => 1,
                'layout_column' => 3,
                'layout_width' => 'full',
            ],

            [
                'dynamic_item_ids' => [23],
                'type' => 6,
                'order' => 4,
                'layout_row' => 1,
                'layout_column' => 4,
                'layout_width' => 'full',
            ],

            [
                'title' => [
                    'az' => 'Tədris üzrə proqramlar',
                    'en' => 'Tədris üzrə proqramlar',
                    'ru' => 'Tədris üzrə proqramlar',
                    'tr' => 'Tədris üzrə proqramlar',
                ],
                'type' => 1,
                'order' => 5,
                'layout_row' => 1,
                'layout_column' => 5,
                'layout_width' => 'full',
            ],
            [
                'dynamic_item_ids' => [24, 25, 26, 27],
                'type' => 6,
                'order' => 6,
                'layout_row' => 1,
                'layout_column' => 6,
                'layout_width' => 'full',
            ],
            [
                'title' => [
                    'az' => 'Tədris şöbəsi',
                    'en' => 'Tədris şöbəsi',
                    'ru' => 'Tədris şöbəsi',
                    'tr' => 'Tədris şöbəsi',
                ],
                'type' => 1,
                'order' => 7,
                'layout_row' => 1,
                'layout_column' => 7,
                'layout_width' => 'full',
            ],
            [
                'dynamic_item_ids' => [28],
                'type' => 6,
                'order' => 7,
                'layout_row' => 1,
                'layout_column' => 7,
                'layout_width' => 'half',
            ],

            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 8,
                'layout_row' => 1,
                'layout_column' => 7,
                'layout_width' => 'half',
            ],

            [
                'title' => [
                    'az' => 'Tədris şöbəsi',
                    'en' => 'Tədris şöbəsi',
                    'ru' => 'Tədris şöbəsi',
                    'tr' => 'Tədris şöbəsi',
                ],
                'type' => 1,
                'order' => 9,
                'layout_row' => 1,
                'layout_column' => 8,
                'layout_width' => 'full',
            ],
            [
                'dynamic_item_ids' => [28],
                'type' => 6,
                'order' => 10,
                'layout_row' => 1,
                'layout_column' => 9,
                'layout_width' => 'half',
            ],

            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 11,
                'layout_row' => 1,
                'layout_column' => 9,
                'layout_width' => 'half',
            ],

            //page7

            [
                'title' => [
                    'az' => 'Strateji plan',
                    'en' => 'Strateji plan',
                    'ru' => 'Strateji plan',
                    'tr' => 'Strateji plan',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],

            [
                'dynamic_item_ids' => [30],
                'type' => 6,
                'order' => 3,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            // page Elmi sura

            [
                'dynamic_item_ids' => [31],
                'type' => 6,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            [
                'title' => [
                    'az' => 'Proqram rəhbərləri',
                    'en' => 'Proqram rəhbərləri',
                    'ru' => 'Proqram rəhbərləri',
                    'tr' => 'Proqram rəhbərləri',
                ],
                'type' => 1,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            [
                'dynamic_item_ids' => [32, 33, 34],
                'type' => 6,
                'order' => 3,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            [
                'title' => [
                    'az' => 'Müəllimlər',
                    'en' => 'Müəllimlər',
                    'ru' => 'Müəllimlər',
                    'tr' => 'Müəllimlər',
                ],
                'type' => 1,
                'order' => 4,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],
            [
                'dynamic_item_ids' => [35, 36, 37, 38, 39, 40],
                'type' => 6,
                'order' => 5,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            // page 9

            [
                'title' => [
                    'az' => 'Dövlət imtahan mərkəzi ilə qəbul',
                    'en' => 'Dövlət imtahan mərkəzi ilə qəbul',
                    'ru' => 'Dövlət imtahan mərkəzi ilə qəbul',
                    'tr' => 'Dövlət imtahan mərkəzi ilə qəbul',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],

            [
                'description' => [
                    'az' =>
                        '<table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1247.99px; font-size: medium;"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">İxtisasın şrifti</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">İxtisasın adı</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Cəmi</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Dövlət sifarişi</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Ödənişli əsaslarla</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Təhsil haqqı</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050620</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">50</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">20</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3000 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050405</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">İqtisadiyyat</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">40</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">10</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2500 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050211</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Beynəlxalq münasibətlər</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2800 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050118</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Hüquqşünaslıq</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">23</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4500 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050621</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">İnformasiya texnologiyaları</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">60</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">35</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3500 AZN</td></tr></tbody></table>',
                    'en' =>
                        '<table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1247.99px; font-size: medium;"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">İxtisasın şrifti</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">İxtisasın adı</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Cəmi</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Dövlət sifarişi</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Ödənişli əsaslarla</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Təhsil haqqı</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050620</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">50</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">20</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3000 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050405</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">İqtisadiyyat</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">40</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">10</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2500 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050211</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Beynəlxalq münasibətlər</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2800 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050118</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Hüquqşünaslıq</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">23</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4500 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050621</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">İnformasiya texnologiyaları</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">60</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">35</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3500 AZN</td></tr></tbody></table>',
                    'ru' =>
                        '<table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1247.99px; font-size: medium;"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">İxtisasın şrifti</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">İxtisasın adı</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Cəmi</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Dövlət sifarişi</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Ödənişli əsaslarla</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Təhsil haqqı</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050620</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">50</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">20</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3000 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050405</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">İqtisadiyyat</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">40</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">10</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2500 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050211</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Beynəlxalq münasibətlər</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2800 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050118</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Hüquqşünaslıq</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">23</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4500 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050621</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">İnformasiya texnologiyaları</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">60</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">35</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3500 AZN</td></tr></tbody></table>',
                    'tr' =>
                        '<table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1247.99px; font-size: medium;"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">İxtisasın şrifti</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">İxtisasın adı</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Cəmi</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Dövlət sifarişi</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Ödənişli əsaslarla</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Təhsil haqqı</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050620</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">50</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">20</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3000 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050405</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">İqtisadiyyat</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">40</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">10</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2500 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050211</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Beynəlxalq münasibətlər</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2800 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050118</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Hüquqşünaslıq</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">23</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4500 AZN</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">050621</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">İnformasiya texnologiyaları</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">60</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">25</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">35</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3500 AZN</td></tr></tbody></table>',
                ],
                'type' => 2,
                'order' => 3,
                'layout_row' => 1,
                'layout_column' => 3,
                'layout_width' => 'full',
            ],


            //page 10


            [
                'title' => [
                    'az' => 'Uğur hekayələri',
                    'en' => 'Uğur hekayələri',
                    'ru' => 'Uğur hekayələri',
                    'tr' => 'Uğur hekayələri',
                ],
                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],
            [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],

            [
                'title' => [
                    'az' => 'Uğur anları',
                    'en' => 'Uğur anları',
                    'ru' => 'Uğur anları',
                    'tr' => 'Uğur anları',
                ],
                'type' => 1,
                'order' => 3,
                'layout_row' => 1,
                'layout_column' => 3,
                'layout_width' => 'full',
            ],
                        [
                'description' => [
                    'az' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'en' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'ru' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                    'tr' =>
                        '<span style="color: rgb(33, 33, 33); font-family: " noto="" sans",="" sans-serif;="" font-size:="" 18px;="" letter-spacing:="" 0%;"="">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</span>',
                ],
                'type' => 2,
                'order' => 4,
                'layout_row' => 1,
                'layout_column' => 4,
                'layout_width' => 'full',
            ],
        ];

        $dynamic_items = [
            [
                'title' => [
                    'az' => 'Tarixçə',
                    'en' => 'Tarixçə',
                    'ru' => 'Tarixçə',
                    'tr' => 'Tarixçə',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                ],

                'dynamic_id' => 4,
                'type' => 1,
                'order' => 1,
                'image' => 'dynamic_item1.svg',
            ],
            [
                'title' => [
                    'az' => 'Missiyamız',
                    'en' => 'Missiyamız',
                    'ru' => 'Missiyamız',
                    'tr' => 'Missiyamız',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                ],

                'dynamic_id' => 4,
                'type' => 1,
                'order' => 2,
                'image' => 'dynamic_item2.svg',
            ],
            [
                'title' => [
                    'az' => 'Çətir universitet',
                    'en' => 'Çətir universitet',
                    'ru' => 'Çətir universitet',
                    'tr' => 'Çətir universitet',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                ],

                'dynamic_id' => 4,
                'type' => 1,
                'order' => 3,
                'image' => 'dynamic_item3.svg',
            ],
            [
                'title' => [
                    'az' => 'Himayəçilər şurası',
                    'en' => 'Himayəçilər şurası',
                    'ru' => 'Himayəçilər şurası',
                    'tr' => 'Himayəçilər şurası',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                ],

                'dynamic_id' => 4,
                'type' => 1,
                'order' => 4,
                'image' => 'dynamic_item4.svg',
            ],
            [
                'title' => [
                    'az' => 'Struktur',
                    'en' => 'Struktur',
                    'ru' => 'Struktur',
                    'tr' => 'Struktur',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                ],

                'dynamic_id' => 4,
                'type' => 1,
                'order' => 5,
                'image' => 'dynamic_item5.svg',
            ],
            [
                'title' => [
                    'az' => 'Akademik siyasət',
                    'en' => 'Akademik siyasət',
                    'ru' => 'Akademik siyasət',
                    'tr' => 'Akademik siyasət',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Courselab allows you to study at your own pace and from anywhere in the world. You can access the course material 24/7, and there is no need to worry about missing any classes.</span>',
                ],

                'dynamic_id' => 4,
                'type' => 1,
                'order' => 6,
                'image' => 'dynamic_item6.svg',
            ],

            //page2
            [
                'title' => [
                    'az' => 'Rəsmi sərəncam',
                    'en' => 'Rəsmi sərəncam',
                    'ru' => 'Rəsmi sərəncam',
                    'tr' => 'Rəsmi sərəncam',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                ],

                'dynamic_id' => 9,
                'type' => 2,
                'order' => 1,
                'image' => 'dynamic_item7.svg',
            ],

            // page2 dynamic item 1
            [
                'title' => [
                    'az' => 'Keyfiyyətli təhsil',
                    'en' => 'Keyfiyyətli təhsil',
                    'ru' => 'Keyfiyyətli təhsil',
                    'tr' => 'Keyfiyyətli təhsil',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                ],

                'dynamic_id' => 12,
                'type' => 3,
                'order' => 1,
                'image' => 'dynamic_item8.svg',
            ],
            // page2 dynamic item 2
            [
                'title' => [
                    'az' => 'Kadr hazırlığı',
                    'en' => 'Kadr hazırlığı',
                    'ru' => 'Kadr hazırlığı',
                    'tr' => 'Kadr hazırlığı',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                ],

                'dynamic_id' => 12,
                'type' => 3,
                'order' => 2,
                'image' => 'dynamic_item9.svg',
            ],
            // page2 dynamic item 3
            [
                'title' => [
                    'az' => 'Elmi tədqiqat',
                    'en' => 'Elmi tədqiqat',
                    'ru' => 'Elmi tədqiqat',
                    'tr' => 'Elmi tədqiqat',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                ],

                'dynamic_id' => 12,
                'type' => 3,
                'order' => 3,
                'image' => 'dynamic_item10.svg',
            ],
            // page2 dynamic item 4
            [
                'title' => [
                    'az' => 'Beynəlxalq əməkdaşlıq',
                    'en' => 'Beynəlxalq əməkdaşlıq',
                    'ru' => 'Beynəlxalq əməkdaşlıq',
                    'tr' => 'Beynəlxalq əməkdaşlıq',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'en' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'ru' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                    'tr' => '<span style="color: rgb(97, 97, 97); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0.15%; background-color: rgb(251, 251, 251);">Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək</span>',
                ],

                'dynamic_id' => 12,
                'type' => 3,
                'order' => 4,
                'image' => 'dynamic_item11.svg',
            ],

            // page3 dynamic item 1
            [
                'title' => [
                    'az' => 'ODTU',
                    'en' => 'ODTU',
                    'ru' => 'ODTU',
                    'tr' => 'ODTU',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'en' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'ru' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'tr' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                ],

                'dynamic_id' => 18,
                'type' => 4,
                'order' => 1,
            ],

            // page3 dynamic item 2
            [
                'title' => [
                    'az' => 'İTÜ',
                    'en' => 'İTÜ',
                    'ru' => 'İTÜ',
                    'tr' => 'İTÜ',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'en' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'ru' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'tr' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                ],

                'dynamic_id' => 18,
                'type' => 4,
                'order' => 2,
            ],

            // page3 dynamic item 3
            [
                'title' => [
                    'az' => 'Hacettepe',
                    'en' => 'Hacettepe',
                    'ru' => 'Hacettepe',
                    'tr' => 'Hacettepe',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'en' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'ru' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'tr' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                ],

                'dynamic_id' => 18,
                'type' => 4,
                'order' => 3,
            ],

            // page3 dynamic item 4
            [
                'title' => [
                    'az' => 'AzTU',
                    'en' => 'AzTU',
                    'ru' => 'AzTU',
                    'tr' => 'AzTU',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'en' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'ru' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                    'tr' => '<span style="color: rgb(72, 72, 72); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 16px; letter-spacing: 0%;">Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica.</span>',
                ],

                'dynamic_id' => 18,
                'type' => 4,
                'order' => 4,
            ],

            // page4 dynamic item 1
            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'en' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'ru' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'tr' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 21,
                'type' => 5,
                'order' => 1,
                'image' => 'dynamic_item1.jpg',
            ],

            // page4 dynamic item 2
            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'en' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'ru' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'tr' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 21,
                'type' => 5,
                'order' => 2,
                'image' => 'dynamic_item2.jpg',
            ],

            // page4 dynamic item 3
            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'en' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'ru' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'tr' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 21,
                'type' => 5,
                'order' => 3,
                'image' => 'dynamic_item3.jpg',
            ],

            // page4 dynamic item 4
            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'en' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'ru' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'tr' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 21,
                'type' => 5,
                'order' => 4,
                'image' => 'dynamic_item4.jpg',
            ],

            // page4 dynamic item 5
            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'en' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'ru' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'tr' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 21,
                'type' => 5,
                'order' => 5,
                'image' => 'dynamic_item5.jpg',
            ],

            // page4 dynamic item 6
            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'en' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'ru' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                    'tr' => 'Türkiyə Respublikası Ali Təhsil Şurasının (YÖK) sədri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 21,
                'type' => 5,
                'order' => 6,
                'image' => 'dynamic_item6.jpg',
            ],

            //page 5
            [
                'title' => [
                    'az' => 'Rəsmi sərəncam',
                    'en' => 'Rəsmi sərəncam',
                    'ru' => 'Rəsmi sərəncam',
                    'tr' => 'Rəsmi sərəncam',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                ],

                'dynamic_id' => 24,
                'type' => 2,
                'order' => 1,
                'image' => 'dynamic_item12.svg',
            ],

            //page 6
            [
                'title' => [
                    'az' => 'Abituriyentlər niyə TAU-nu seçməlidir?',
                    'en' => 'Abituriyentlər niyə TAU-nu seçməlidir?',
                    'ru' => 'Abituriyentlər niyə TAU-nu seçməlidir?',
                    'tr' => 'Abituriyentlər niyə TAU-nu seçməlidir?',
                ],

                'name' => [
                    'az' => 'Prof. Dr. Vilayət Vəliyev',
                    'en' => 'Prof. Dr. Vilayət Vəliyev',
                    'ru' => 'Prof. Dr. Vilayət Vəliyev',
                    'tr' => 'Prof. Dr. Vilayət Vəliyev',
                ],
                'profession' => [
                    'az' => 'Rektor',
                    'en' => 'Rektor',
                    'ru' => 'Rektor',
                    'tr' => 'Rektor',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],
                'description' => [
                    'az' =>
                        '<p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da bizim missiyamız sadəcə bilik ötürmək deyil, gələcəyin liderlərini yetişdirməkdir.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Türk-Azərbaycan Universiteti olaraq, biz iki qardaş ölkənin ən yaxşı təhsil ənənələrini birləşdiririk. Beynəlxalq akkreditasiyalı proqramlarımız, dünya səviyyəli professor-müəllim heyətimiz və müasir infrastrukturumuzla tələbələrimizə qlobal standartlarda təhsil təqdim edirik.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-nu seçməyiniz üçün əsas səbəblər:</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; list-style-type: square; list-style-position: inside; font-size: medium;"><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Akkreditasiya:&nbsp;</strong>Diplomlarımız dünya üzrə tanınır və qəbul olunur</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Dual Degree Proqramları:&nbsp;</strong>Türkiyənin ən prestijli universitetləri ilə əməkdaşlıq</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Tədqiqat İmkanları:&nbsp;</strong>Son texnologiya ilə təchiz olunmuş laboratoriyalar</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Karyera Dəstəyi:&nbsp;</strong>95% məzun işəqəbul dərəcəsi</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Mübadilə:&nbsp;</strong>Erasmus+ və digər proqramlar</li></ul><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da siz sadəcə diplom almırsınız - gələcəyinizi qurursunuz. Burada keçirdiyiniz hər gün sizə yeni bacarıqlar, beynəlxalq əlaqələr və ömürlük dostluqlar qazandıracaq.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Sizləri TAU ailəsində görmək üçün səbirsizliklə gözləyirik!</p>',
                    'en' =>
                        '<p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da bizim missiyamız sadəcə bilik ötürmək deyil, gələcəyin liderlərini yetişdirməkdir.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Türk-Azərbaycan Universiteti olaraq, biz iki qardaş ölkənin ən yaxşı təhsil ənənələrini birləşdiririk. Beynəlxalq akkreditasiyalı proqramlarımız, dünya səviyyəli professor-müəllim heyətimiz və müasir infrastrukturumuzla tələbələrimizə qlobal standartlarda təhsil təqdim edirik.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-nu seçməyiniz üçün əsas səbəblər:</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; list-style-type: square; list-style-position: inside; font-size: medium;"><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Akkreditasiya:&nbsp;</strong>Diplomlarımız dünya üzrə tanınır və qəbul olunur</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Dual Degree Proqramları:&nbsp;</strong>Türkiyənin ən prestijli universitetləri ilə əməkdaşlıq</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Tədqiqat İmkanları:&nbsp;</strong>Son texnologiya ilə təchiz olunmuş laboratoriyalar</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Karyera Dəstəyi:&nbsp;</strong>95% məzun işəqəbul dərəcəsi</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Mübadilə:&nbsp;</strong>Erasmus+ və digər proqramlar</li></ul><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da siz sadəcə diplom almırsınız - gələcəyinizi qurursunuz. Burada keçirdiyiniz hər gün sizə yeni bacarıqlar, beynəlxalq əlaqələr və ömürlük dostluqlar qazandıracaq.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Sizləri TAU ailəsində görmək üçün səbirsizliklə gözləyirik!</p>',
                    'ru' =>
                        '<p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da bizim missiyamız sadəcə bilik ötürmək deyil, gələcəyin liderlərini yetişdirməkdir.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Türk-Azərbaycan Universiteti olaraq, biz iki qardaş ölkənin ən yaxşı təhsil ənənələrini birləşdiririk. Beynəlxalq akkreditasiyalı proqramlarımız, dünya səviyyəli professor-müəllim heyətimiz və müasir infrastrukturumuzla tələbələrimizə qlobal standartlarda təhsil təqdim edirik.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-nu seçməyiniz üçün əsas səbəblər:</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; list-style-type: square; list-style-position: inside; font-size: medium;"><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Akkreditasiya:&nbsp;</strong>Diplomlarımız dünya üzrə tanınır və qəbul olunur</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Dual Degree Proqramları:&nbsp;</strong>Türkiyənin ən prestijli universitetləri ilə əməkdaşlıq</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Tədqiqat İmkanları:&nbsp;</strong>Son texnologiya ilə təchiz olunmuş laboratoriyalar</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Karyera Dəstəyi:&nbsp;</strong>95% məzun işəqəbul dərəcəsi</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Mübadilə:&nbsp;</strong>Erasmus+ və digər proqramlar</li></ul><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da siz sadəcə diplom almırsınız - gələcəyinizi qurursunuz. Burada keçirdiyiniz hər gün sizə yeni bacarıqlar, beynəlxalq əlaqələr və ömürlük dostluqlar qazandıracaq.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Sizləri TAU ailəsində görmək üçün səbirsizliklə gözləyirik!</p>',
                    'tr' =>
                        '<p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da bizim missiyamız sadəcə bilik ötürmək deyil, gələcəyin liderlərini yetişdirməkdir.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Türk-Azərbaycan Universiteti olaraq, biz iki qardaş ölkənin ən yaxşı təhsil ənənələrini birləşdiririk. Beynəlxalq akkreditasiyalı proqramlarımız, dünya səviyyəli professor-müəllim heyətimiz və müasir infrastrukturumuzla tələbələrimizə qlobal standartlarda təhsil təqdim edirik.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-nu seçməyiniz üçün əsas səbəblər:</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; list-style-type: square; list-style-position: inside; font-size: medium;"><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Akkreditasiya:&nbsp;</strong>Diplomlarımız dünya üzrə tanınır və qəbul olunur</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Dual Degree Proqramları:&nbsp;</strong>Türkiyənin ən prestijli universitetləri ilə əməkdaşlıq</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Tədqiqat İmkanları:&nbsp;</strong>Son texnologiya ilə təchiz olunmuş laboratoriyalar</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Karyera Dəstəyi:&nbsp;</strong>95% məzun işəqəbul dərəcəsi</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Mübadilə:&nbsp;</strong>Erasmus+ və digər proqramlar</li></ul><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da siz sadəcə diplom almırsınız - gələcəyinizi qurursunuz. Burada keçirdiyiniz hər gün sizə yeni bacarıqlar, beynəlxalq əlaqələr və ömürlük dostluqlar qazandıracaq.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Sizləri TAU ailəsində görmək üçün səbirsizliklə gözləyirik!</p>',
                ],

                'dynamic_id' => 29,
                'type' => 6,
                'order' => 1,
                'image' => 'dynamic_item7.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'en' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'ru' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'tr' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 31,
                'type' => 5,
                'order' => 1,
                'image' => 'dynamic_item8.jpg',
            ],
            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'en' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'ru' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'tr' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 31,
                'type' => 5,
                'order' => 2,
                'image' => 'dynamic_item9.jpg',
            ],
            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'en' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'ru' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'tr' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 31,
                'type' => 5,
                'order' => 3,
                'image' => 'dynamic_item10.jpg',
            ],
            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'en' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'ru' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'tr' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 33,
                'type' => 5,
                'order' => 1,
                'image' => 'dynamic_item11.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof.dr. Erol.Özvar',
                    'en' => 'Prof.dr. Erol.Özvar',
                    'ru' => 'Prof.dr. Erol.Özvar',
                    'tr' => 'Prof.dr. Erol.Özvar',
                ],
                'profession' => [
                    'az' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'en' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'ru' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                    'tr' => 'Kompüter mühəndisliyi üzrə proqram rəhbəri',
                ],
                'email' => [
                    'az' => 'email@gmail.com',
                    'en' => 'email@gmail.com',
                    'ru' => 'email@gmail.com',
                    'tr' => 'email@gmail.com',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 20px; letter-spacing: 0%; background-color: rgb(245, 251, 255);">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,</span>',
                ],

                'dynamic_id' => 36,
                'type' => 5,
                'order' => 1,
                'image' => 'dynamic_item12.jpg',
            ],

            //page 7

            [
                'title' => [
                    'az' => 'Hacettepe',
                    'en' => 'Hacettepe',
                    'ru' => 'Hacettepe',
                    'tr' => 'Hacettepe',
                ],
                'description' => [
                    'az' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                    'en' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                    'ru' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                    'tr' => '<span style="font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 28px; letter-spacing: 0%;">Azərbaycan Respublikası Prezidentinin 15 iyul 2016-cı il tarixli, 1234 nömrəli Sərəncamı ilə Türk-Azərbaycan Universiteti təsis edilmişdir.</span>',
                ],

                'dynamic_id' => 40,
                'type' => 2,
                'order' => 1,
                'image' => 'dynamic_item13.svg',
            ],

            //page elmi sura
            [
                'title' => [
                    'az' => 'Abituriyentlər niyə TAU-nu seçməlidir?',
                    'en' => 'Abituriyentlər niyə TAU-nu seçməlidir?',
                    'ru' => 'Abituriyentlər niyə TAU-nu seçməlidir?',
                    'tr' => 'Abituriyentlər niyə TAU-nu seçməlidir?',
                ],

                'name' => [
                    'az' => 'Prof. Dr. Vilayət Vəliyev',
                    'en' => 'Prof. Dr. Vilayət Vəliyev',
                    'ru' => 'Prof. Dr. Vilayət Vəliyev',
                    'tr' => 'Prof. Dr. Vilayət Vəliyev',
                ],
                'profession' => [
                    'az' => 'Rektor',
                    'en' => 'Rektor',
                    'ru' => 'Rektor',
                    'tr' => 'Rektor',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],
                'description' => [
                    'az' =>
                        '<p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da bizim missiyamız sadəcə bilik ötürmək deyil, gələcəyin liderlərini yetişdirməkdir.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Türk-Azərbaycan Universiteti olaraq, biz iki qardaş ölkənin ən yaxşı təhsil ənənələrini birləşdiririk. Beynəlxalq akkreditasiyalı proqramlarımız, dünya səviyyəli professor-müəllim heyətimiz və müasir infrastrukturumuzla tələbələrimizə qlobal standartlarda təhsil təqdim edirik.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-nu seçməyiniz üçün əsas səbəblər:</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; list-style-type: square; list-style-position: inside; font-size: medium;"><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Akkreditasiya:&nbsp;</strong>Diplomlarımız dünya üzrə tanınır və qəbul olunur</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Dual Degree Proqramları:&nbsp;</strong>Türkiyənin ən prestijli universitetləri ilə əməkdaşlıq</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Tədqiqat İmkanları:&nbsp;</strong>Son texnologiya ilə təchiz olunmuş laboratoriyalar</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Karyera Dəstəyi:&nbsp;</strong>95% məzun işəqəbul dərəcəsi</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Mübadilə:&nbsp;</strong>Erasmus+ və digər proqramlar</li></ul><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da siz sadəcə diplom almırsınız - gələcəyinizi qurursunuz. Burada keçirdiyiniz hər gün sizə yeni bacarıqlar, beynəlxalq əlaqələr və ömürlük dostluqlar qazandıracaq.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Sizləri TAU ailəsində görmək üçün səbirsizliklə gözləyirik!</p>',
                    'en' =>
                        '<p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da bizim missiyamız sadəcə bilik ötürmək deyil, gələcəyin liderlərini yetişdirməkdir.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Türk-Azərbaycan Universiteti olaraq, biz iki qardaş ölkənin ən yaxşı təhsil ənənələrini birləşdiririk. Beynəlxalq akkreditasiyalı proqramlarımız, dünya səviyyəli professor-müəllim heyətimiz və müasir infrastrukturumuzla tələbələrimizə qlobal standartlarda təhsil təqdim edirik.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-nu seçməyiniz üçün əsas səbəblər:</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; list-style-type: square; list-style-position: inside; font-size: medium;"><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Akkreditasiya:&nbsp;</strong>Diplomlarımız dünya üzrə tanınır və qəbul olunur</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Dual Degree Proqramları:&nbsp;</strong>Türkiyənin ən prestijli universitetləri ilə əməkdaşlıq</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Tədqiqat İmkanları:&nbsp;</strong>Son texnologiya ilə təchiz olunmuş laboratoriyalar</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Karyera Dəstəyi:&nbsp;</strong>95% məzun işəqəbul dərəcəsi</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Mübadilə:&nbsp;</strong>Erasmus+ və digər proqramlar</li></ul><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da siz sadəcə diplom almırsınız - gələcəyinizi qurursunuz. Burada keçirdiyiniz hər gün sizə yeni bacarıqlar, beynəlxalq əlaqələr və ömürlük dostluqlar qazandıracaq.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Sizləri TAU ailəsində görmək üçün səbirsizliklə gözləyirik!</p>',
                    'ru' =>
                        '<p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da bizim missiyamız sadəcə bilik ötürmək deyil, gələcəyin liderlərini yetişdirməkdir.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Türk-Azərbaycan Universiteti olaraq, biz iki qardaş ölkənin ən yaxşı təhsil ənənələrini birləşdiririk. Beynəlxalq akkreditasiyalı proqramlarımız, dünya səviyyəli professor-müəllim heyətimiz və müasir infrastrukturumuzla tələbələrimizə qlobal standartlarda təhsil təqdim edirik.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-nu seçməyiniz üçün əsas səbəblər:</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; list-style-type: square; list-style-position: inside; font-size: medium;"><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Akkreditasiya:&nbsp;</strong>Diplomlarımız dünya üzrə tanınır və qəbul olunur</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Dual Degree Proqramları:&nbsp;</strong>Türkiyənin ən prestijli universitetləri ilə əməkdaşlıq</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Tədqiqat İmkanları:&nbsp;</strong>Son texnologiya ilə təchiz olunmuş laboratoriyalar</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Karyera Dəstəyi:&nbsp;</strong>95% məzun işəqəbul dərəcəsi</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Mübadilə:&nbsp;</strong>Erasmus+ və digər proqramlar</li></ul><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da siz sadəcə diplom almırsınız - gələcəyinizi qurursunuz. Burada keçirdiyiniz hər gün sizə yeni bacarıqlar, beynəlxalq əlaqələr və ömürlük dostluqlar qazandıracaq.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Sizləri TAU ailəsində görmək üçün səbirsizliklə gözləyirik!</p>',
                    'tr' =>
                        '<p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da bizim missiyamız sadəcə bilik ötürmək deyil, gələcəyin liderlərini yetişdirməkdir.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Türk-Azərbaycan Universiteti olaraq, biz iki qardaş ölkənin ən yaxşı təhsil ənənələrini birləşdiririk. Beynəlxalq akkreditasiyalı proqramlarımız, dünya səviyyəli professor-müəllim heyətimiz və müasir infrastrukturumuzla tələbələrimizə qlobal standartlarda təhsil təqdim edirik.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-nu seçməyiniz üçün əsas səbəblər:</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; list-style-type: square; list-style-position: inside; font-size: medium;"><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Akkreditasiya:&nbsp;</strong>Diplomlarımız dünya üzrə tanınır və qəbul olunur</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Dual Degree Proqramları:&nbsp;</strong>Türkiyənin ən prestijli universitetləri ilə əməkdaşlıq</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Tədqiqat İmkanları:&nbsp;</strong>Son texnologiya ilə təchiz olunmuş laboratoriyalar</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Karyera Dəstəyi:&nbsp;</strong>95% məzun işəqəbul dərəcəsi</li><li style="margin: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;"><strong style="margin: 0px; padding: 0px;">Beynəlxalq Mübadilə:&nbsp;</strong>Erasmus+ və digər proqramlar</li></ul><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">TAU-da siz sadəcə diplom almırsınız - gələcəyinizi qurursunuz. Burada keçirdiyiniz hər gün sizə yeni bacarıqlar, beynəlxalq əlaqələr və ömürlük dostluqlar qazandıracaq.</p><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 18px; line-height: 28px; letter-spacing: 0%;">Sizləri TAU ailəsində görmək üçün səbirsizliklə gözləyirik!</p>',
                ],

                'dynamic_id' => 41,
                'type' => 6,
                'order' => 1,
                'image' => 'dynamic_item13.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof. Dr. Vilayət Vəliyev',
                    'en' => 'Prof. Dr. Vilayət Vəliyev',
                    'ru' => 'Prof. Dr. Vilayət Vəliyev',
                    'tr' => 'Prof. Dr. Vilayət Vəliyev',
                ],
                'profession' => [
                    'az' => 'Dekan',
                    'en' => 'Dekan',
                    'ru' => 'Dekan',
                    'tr' => 'Dekan',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],

                'dynamic_id' => 43,
                'type' => 8,
                'order' => 1,
                'image' => 'dynamic_item14.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof. Dr. Vilayət Vəliyev',
                    'en' => 'Prof. Dr. Vilayət Vəliyev',
                    'ru' => 'Prof. Dr. Vilayət Vəliyev',
                    'tr' => 'Prof. Dr. Vilayət Vəliyev',
                ],
                'profession' => [
                    'az' => 'Dekan',
                    'en' => 'Dekan',
                    'ru' => 'Dekan',
                    'tr' => 'Dekan',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],

                'dynamic_id' => 43,
                'type' => 8,
                'order' => 2,
                'image' => 'dynamic_item15.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof. Dr. Vilayət Vəliyev',
                    'en' => 'Prof. Dr. Vilayət Vəliyev',
                    'ru' => 'Prof. Dr. Vilayət Vəliyev',
                    'tr' => 'Prof. Dr. Vilayət Vəliyev',
                ],
                'profession' => [
                    'az' => 'Dekan',
                    'en' => 'Dekan',
                    'ru' => 'Dekan',
                    'tr' => 'Dekan',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],

                'dynamic_id' => 43,
                'type' => 8,
                'order' => 3,
                'image' => 'dynamic_item16.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof. Dr. Ayşe Kılıç',
                    'en' => 'Prof. Dr. Ayşe Kılıç',
                    'ru' => 'Prof. Dr. Ayşe Kılıç',
                    'tr' => 'Prof. Dr. Ayşe Kılıç',
                ],
                'profession' => [
                    'az' => 'Elektrik-Elektronika Mühəndisliyi',
                    'en' => 'Elektrik-Elektronika Mühəndisliyi',
                    'ru' => 'Elektrik-Elektronika Mühəndisliyi',
                    'tr' => 'Elektrik-Elektronika Mühəndisliyi',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],

                'dynamic_id' => 45,
                'type' => 7,
                'order' => 1,
                'image' => 'dynamic_item17.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof. Dr. Ayşe Kılıç',
                    'en' => 'Prof. Dr. Ayşe Kılıç',
                    'ru' => 'Prof. Dr. Ayşe Kılıç',
                    'tr' => 'Prof. Dr. Ayşe Kılıç',
                ],
                'profession' => [
                    'az' => 'Elektrik-Elektronika Mühəndisliyi',
                    'en' => 'Elektrik-Elektronika Mühəndisliyi',
                    'ru' => 'Elektrik-Elektronika Mühəndisliyi',
                    'tr' => 'Elektrik-Elektronika Mühəndisliyi',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],

                'dynamic_id' => 45,
                'type' => 7,
                'order' => 2,
                'image' => 'dynamic_item18.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof. Dr. Ayşe Kılıç',
                    'en' => 'Prof. Dr. Ayşe Kılıç',
                    'ru' => 'Prof. Dr. Ayşe Kılıç',
                    'tr' => 'Prof. Dr. Ayşe Kılıç',
                ],
                'profession' => [
                    'az' => 'Elektrik-Elektronika Mühəndisliyi',
                    'en' => 'Elektrik-Elektronika Mühəndisliyi',
                    'ru' => 'Elektrik-Elektronika Mühəndisliyi',
                    'tr' => 'Elektrik-Elektronika Mühəndisliyi',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],

                'dynamic_id' => 45,
                'type' => 7,
                'order' => 3,
                'image' => 'dynamic_item19.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof. Dr. Ayşe Kılıç',
                    'en' => 'Prof. Dr. Ayşe Kılıç',
                    'ru' => 'Prof. Dr. Ayşe Kılıç',
                    'tr' => 'Prof. Dr. Ayşe Kılıç',
                ],
                'profession' => [
                    'az' => 'Elektrik-Elektronika Mühəndisliyi',
                    'en' => 'Elektrik-Elektronika Mühəndisliyi',
                    'ru' => 'Elektrik-Elektronika Mühəndisliyi',
                    'tr' => 'Elektrik-Elektronika Mühəndisliyi',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],

                'dynamic_id' => 45,
                'type' => 7,
                'order' => 4,
                'image' => 'dynamic_item20.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof. Dr. Ayşe Kılıç',
                    'en' => 'Prof. Dr. Ayşe Kılıç',
                    'ru' => 'Prof. Dr. Ayşe Kılıç',
                    'tr' => 'Prof. Dr. Ayşe Kılıç',
                ],
                'profession' => [
                    'az' => 'Elektrik-Elektronika Mühəndisliyi',
                    'en' => 'Elektrik-Elektronika Mühəndisliyi',
                    'ru' => 'Elektrik-Elektronika Mühəndisliyi',
                    'tr' => 'Elektrik-Elektronika Mühəndisliyi',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],

                'dynamic_id' => 45,
                'type' => 7,
                'order' => 5,
                'image' => 'dynamic_item21.jpg',
            ],

            [
                'name' => [
                    'az' => 'Prof. Dr. Ayşe Kılıç',
                    'en' => 'Prof. Dr. Ayşe Kılıç',
                    'ru' => 'Prof. Dr. Ayşe Kılıç',
                    'tr' => 'Prof. Dr. Ayşe Kılıç',
                ],
                'profession' => [
                    'az' => 'Elektrik-Elektronika Mühəndisliyi',
                    'en' => 'Elektrik-Elektronika Mühəndisliyi',
                    'ru' => 'Elektrik-Elektronika Mühəndisliyi',
                    'tr' => 'Elektrik-Elektronika Mühəndisliyi',
                ],
                'email' => [
                    'az' => 'a.kilic@tau.edu.az',
                    'en' => 'a.kilic@tau.edu.az',
                    'ru' => 'a.kilic@tau.edu.az',
                    'tr' => 'a.kilic@tau.edu.az',
                ],
                'phone' => [
                    'az' => '00 000 00 00',
                    'en' => '00 000 00 00',
                    'ru' => '00 000 00 00',
                    'tr' => '00 000 00 00',
                ],
                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],

                'dynamic_id' => 45,
                'type' => 7,
                'order' => 6,
                'image' => 'dynamic_item22.jpg',
            ],
        ];

        seedTranslationAttributes(Page::class, $pages);
        seedTranslationAttributes(Dynamic::class, $dynamics);
        seedTranslationAttributes(DynamicItem::class, $dynamic_items);

        $this->command->info(count($pages) . ' pages created.');
    }
}
