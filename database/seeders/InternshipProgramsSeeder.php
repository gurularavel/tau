<?php

namespace Database\Seeders;

use App\Models\InternshipItem;
use App\Models\InternshipProgram;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class InternshipProgramsSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'InternshipPrograms';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('internship_programs');

        for ($i = 1; $i <= 3; $i++) {
            moveFactoryImageToUploads('internship_programs', 'internship_programs', 'internship_program' . $i . '.webp');
        }

        $internship_programs = [
            [
                'image' => 'internship_program1.webp',
                'slug' => 'yay-tecrube-proqrami',
                'duration' => '3 ay (İyun-Avqust)',
                'place_count' => '25',
                'title' => [
                    'az' => 'Yay təcrübə proqramı',
                    'en' => 'Summer Internship Program',
                    'ru' => 'Летняя программа стажировки',
                    'tr' => 'Yaz Staj Programı',
                ],
                'description' => [
                    'az' => 'Tələbələr üçün yay tətili müddətində real iş mühiti ilə tanışlıq imkanı.',
                    'en' => 'An opportunity for students to experience a real work environment during summer break.',
                    'ru' => 'Возможность для студентов познакомиться с реальной рабочей средой во время летних каникул.',
                    'tr' => 'Öğrenciler için yaz tatili boyunca gerçek iş dünyasını tanıma fırsatı.',
                ],
                'meta_title' => [
                    'az' => 'Yay təcrübə proqramı 2026',
                    'en' => 'Summer Internship 2026',
                    'ru' => 'Летняя стажировка 2026',
                    'tr' => 'Yaz Stajı 2026',
                ],
                'meta_description' => [
                    'az' => 'Yay aylarında keçirilən 3 aylıq ödənişli təcrübə proqramı.',
                    'en' => 'A 3-month paid internship program held during the summer months.',
                    'ru' => '3-месячная платная программа стажировки в летние месяцы.',
                    'tr' => 'Yaz aylarında gerçekleşen 3 aylık ücretli staj programı.',
                ],
                'meta_keywords' => [
                    'az' => 'yay təcrübəsi, tələbə proqramı, yay işi',
                    'en' => 'summer internship, student program, summer job',
                    'ru' => 'летняя стажировка, студенческая программа',
                    'tr' => 'yaz stajı, öğrenci programı, stajyer',
                ],
            ],
            [
                'image' => 'internship_program2.webp',
                'slug' => 'qis-inkisaf-proqrami',
                'duration' => '2 ay (Yanvar-Fevral)',
                'place_count' => '10',
                'title' => [
                    'az' => 'Qış inkişaf proqramı',
                    'en' => 'Winter Development Program',
                    'ru' => 'Зимняя программа развития',
                    'tr' => 'Kış Gelişim Programı',
                ],
                'description' => [
                    'az' => 'Qış semestri fasiləsində intensiv texniki təlimlər və praktiki tapşırıqlar.',
                    'en' => 'Intensive technical training and practical assignments during the winter semester break.',
                    'ru' => 'Интенсивные технические тренинги и практические задания во время зимних каникул.',
                    'tr' => 'Kış sömestr tatilinde yoğun teknik eğitimler ve pratik görevler.',
                ],
                'meta_title' => [
                    'az' => 'Qış inkişaf proqramı - Tələbələr üçün',
                    'en' => 'Winter Development Program - For Students',
                    'ru' => 'Зимняя программа развития - Для студентов',
                    'tr' => 'Kış Gelişim Programı - Öğrenciler İçin',
                ],
                'meta_description' => [
                    'az' => 'Qış aylarında ixtisas biliklərini artırmaq istəyənlər üçün proqram.',
                    'en' => 'A program for those looking to enhance their professional knowledge during the winter.',
                    'ru' => 'Программа для тех, кто хочет повысить свои профессиональные знания в зимний период.',
                    'tr' => 'Kış aylarında mesleki bilgisini artırmak isteyenler için program.',
                ],
                'meta_keywords' => [
                    'az' => 'qış təcrübəsi, inkişaf proqramı, təlim',
                    'en' => 'winter internship, development program, training',
                    'ru' => 'зимняя стажировка, программа развития',
                    'tr' => 'kış stajı, gelişim programı, eğitim',
                ],
            ],
            [
                'image' => 'internship_program3.webp',
                'slug' => 'it-ve-muhendislik-akademiyasi',
                'duration' => '6 ay (Daimi)',
                'place_count' => '15',
                'title' => [
                    'az' => 'İT və Mühəndislik Akademiyası',
                    'en' => 'IT and Engineering Academy',
                    'ru' => 'Академия ИТ и инженерии',
                    'tr' => 'BT ve Mühendislik Akademisi',
                ],
                'description' => [
                    'az' => 'Gənc mühəndislər üçün uzunmüddətli mentorluq və karyera dəstəyi proqramı.',
                    'en' => 'Long-term mentorship and career support program for young engineers.',
                    'ru' => 'Долгосрочная программа менторства и карьерной поддержки для молодых инженеров.',
                    'tr' => 'Genç mühendisler için uzun vadeli mentorluk ve kariyer destek programı.',
                ],
                'meta_title' => [
                    'az' => 'İT və Mühəndislik Akademiyası - Peşəkar Təcrübə',
                    'en' => 'IT and Engineering Academy - Professional Practice',
                    'ru' => 'Академия ИТ и инженерии - Проф. практика',
                    'tr' => 'BT ve Mühendislik Akademisi - Profesyonel Deneyim',
                ],
                'meta_description' => [
                    'az' => 'Gələcəyin mühəndislərini yetişdirən 6 aylıq intensiv akademiya.',
                    'en' => 'A 6-month intensive academy training the engineers of the future.',
                    'ru' => '6-месячная интенсивная академия, готовящая инженеров будущего.',
                    'tr' => 'Geleceğin mühendislerini yetiştiren 6 aylık yoğun akademi.',
                ],
                'meta_keywords' => [
                    'az' => 'mühəndislik, IT təcrübəsi, akademiya, karyera',
                    'en' => 'engineering, IT internship, academy, career',
                    'ru' => 'инженерия, ИТ стажировка, академия',
                    'tr' => 'mühendislik, BT stajı, akademi, kariyer',
                ],
            ],
        ];

        $items = [
            // ID 1: Yay təcrübə proqramı üçün tələblər
            [
                'internship_program_id' => 1,
                'order' => 1,
                'title' => [
                    'az' => '3 və 4-cü kurs tələbəsi olmaq',
                    'en' => 'Being a 3rd or 4th-year student',
                    'ru' => 'Быть студентом 3-го или 4-го курса',
                    'tr' => '3. veya 4. sınıf öğrencisi olmak',
                ],
            ],
            [
                'internship_program_id' => 1,
                'order' => 2,
                'title' => [
                    'az' => 'Python və C# üzrə baza bilikləri',
                    'en' => 'Basic knowledge of Python and C#',
                    'ru' => 'Базовые знания Python и C#',
                    'tr' => 'Temel Python ve C# bilgisi',
                ],
            ],
            [
                'internship_program_id' => 1,
                'order' => 3,
                'title' => [
                    'az' => 'Git və GitHub ilə işləmək bacarığı',
                    'en' => 'Ability to work with Git and GitHub',
                    'ru' => 'Умение работать с Git и GitHub',
                    'tr' => 'Git ve GitHub ile çalışma yeteneği',
                ],
            ],

            // ID 2: Qış inkişaf proqramı üçün tələblər
            [
                'internship_program_id' => 2,
                'order' => 1,
                'title' => [
                    'az' => 'Yüksək akademik göstərici (GPA 80+)',
                    'en' => 'High academic performance (GPA 80+)',
                    'ru' => 'Высокая академическая успеваемость (GPA 80+)',
                    'tr' => 'Yüksek akademik başarı (GPA 80+)',
                ],
            ],
            [
                'internship_program_id' => 2,
                'order' => 2,
                'title' => [
                    'az' => 'Alqoritmik düşünmə qabiliyyəti',
                    'en' => 'Algorithmic thinking ability',
                    'ru' => 'Способность к алгоритмическому мышлению',
                    'tr' => 'Algoritmik düşünme yeteneği',
                ],
            ],
            [
                'internship_program_id' => 2,
                'order' => 3,
                'title' => [
                    'az' => 'İngilis dili bilikləri (B1/B2)',
                    'en' => 'English language proficiency (B1/B2)',
                    'ru' => 'Знание английского языка (B1/B2)',
                    'tr' => 'İngilizce dil yeterliliği (B1/B2)',
                ],
            ],

            // ID 3: İT və Mühəndislik Akademiyası üçün tələblər
            [
                'internship_program_id' => 3,
                'order' => 1,
                'title' => [
                    'az' => 'SQL və verilənlər bazası anlayışı',
                    'en' => 'Understanding of SQL and databases',
                    'ru' => 'Понимание SQL и баз данных',
                    'tr' => 'SQL ve veritabanı anlayışı',
                ],
            ],
            [
                'internship_program_id' => 3,
                'order' => 2,
                'title' => [
                    'az' => 'Analitik problem həll etmə bacarığı',
                    'en' => 'Analytical problem-solving skills',
                    'ru' => 'Навыки аналитического решения проблем',
                    'tr' => 'Analitik problem çözme yeteneği',
                ],
            ],
            [
                'internship_program_id' => 3,
                'order' => 3,
                'title' => [
                    'az' => 'Komandada işləmək həvəsi',
                    'en' => 'Enthusiasm for teamwork',
                    'ru' => 'Желание работать в команде',
                    'tr' => 'Ekip çalışmasına yatkınlık',
                ],
            ],
        ];
        seedTranslationAttributes(InternshipProgram::class, $internship_programs);
        seedTranslationAttributes(InternshipItem::class, $items);

        $this->command->info(count($internship_programs) . ' Internship Programs created.');
    }
}
