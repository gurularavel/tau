<?php

namespace Database\Seeders;

use App\Models\ProgramDynamic;
use App\Models\ProgramDynamicItem;
use App\Models\Program;
use Illuminate\Database\Seeder;
use App\Traits\FileManagable;

class ProgramSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'programs';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->remakeFolder(self::TARGET);
        $this->remakeFolder('program_dynamic_items');
        $this->remakeFolder('program_dynamics');

        for ($i = 1; $i <= 10; $i++) {
            moveFactoryImageToUploads('programs', 'programs', 'program' . $i . '.jpg');
        }

        for ($i = 1; $i <= 6; $i++) {
            moveFactoryImageToUploads('programs', 'programs', 'program' . $i . '.svg');
        }

        for ($i = 1; $i <= 7; $i++) {
            moveFactoryImageToUploads('program_dynamic_items', 'program_dynamic_items', 'program_dynamic_item' . $i . '.svg');
        }
        for ($i = 1; $i <= 10; $i++) {
            moveFactoryImageToUploads('program_dynamic_items', 'program_dynamic_items', 'program_dynamic_item' . $i . '.jpg');
        }

        $programs = [
            [
                'title' => [
                    'az' => 'Komputer mühəndisliyi',
                    'en' => 'Computer Engineering',
                    'ru' => 'Компьютерная инженерия',
                    'tr' => 'Bilgisayar Mühendisliği',
                ],
                'content' => [
                    'az' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'en' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'ru' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'tr' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                ],
                'meta_title' => [
                    'az' => 'Komputer mühəndisliyi',
                    'en' => 'Computer Engineering',
                    'ru' => 'Компьютерная инженерия',
                    'tr' => 'Bilgisayar Mühendisliği',
                ],
                'meta_description' => [
                    'az' => 'Komputer mühəndisliyi haqqında məlumat',
                    'en' => 'Information about Computer Engineering',
                    'ru' => 'Информация о компьютерной инженерии',
                    'tr' => 'Bilgisayar Mühendisliği hakkında bilgi',
                ],
                'meta_keywords' => [
                    'az' => 'komputer mühəndisliyi, proqramlaşdırma',
                    'en' => 'computer engineering, programming',
                    'ru' => 'компьютерная инженерия, программирование',
                    'tr' => 'bilgisayar mühendisliği, programlama',
                ],
                'slug' => 'komputer-muhendisliyi',
                'image' => 'program1.jpg',
                'type' => 1,
                'program_ids' => [5, 6, 7, 8, 9, 10],
                'program_dynamic_ids' => [1, 2, 3, 4, 5],
            ],

            [
                'title' => [
                    'az' => 'Sənayə mühəndisliyi',
                    'en' => 'Industrial Engineering',
                    'ru' => 'Промышленная инженерия',
                    'tr' => 'Endüstri Mühendisliği',
                ],
                'content' => [
                    'az' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'en' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'ru' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'tr' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                ],
                'meta_title' => [
                    'az' => 'Sənayə mühəndisliyi',
                    'en' => 'Industrial Engineering',
                    'ru' => 'Промышленная инженерия',
                    'tr' => 'Endüstri Mühendisliği',
                ],
                'meta_description' => [
                    'az' => 'Sənayə mühəndisliyi proqramı',
                    'en' => 'Industrial Engineering program',
                    'ru' => 'Программа промышленной инженерии',
                    'tr' => 'Endüstri Mühendisliği programı',
                ],
                'meta_keywords' => [
                    'az' => 'sənayə mühəndisliyi, mühəndislik',
                    'en' => 'industrial engineering, engineering',
                    'ru' => 'промышленная инженерия, инженерия',
                    'tr' => 'endüstri mühendisliği, mühendislik',
                ],
                'slug' => 'senaye-muhendisliyi',
                'image' => 'program2.jpg',
                'type' => 1,
            ],

            [
                'title' => [
                    'az' => 'Qida mühəndisliyi',
                    'en' => 'Food Engineering',
                    'ru' => 'Пищевая инженерия',
                    'tr' => 'Gıda Mühendisliği',
                ],
                'content' => [
                    'az' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'en' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'ru' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'tr' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                ],
                'meta_title' => [
                    'az' => 'Qida mühəndisliyi',
                    'en' => 'Food Engineering',
                    'ru' => 'Пищевая инженерия',
                    'tr' => 'Gıda Mühendisliği',
                ],
                'meta_description' => [
                    'az' => 'Qida mühəndisliyi tədris proqramı',
                    'en' => 'Food Engineering curriculum',
                    'ru' => 'Учебная программа пищевой инженерии',
                    'tr' => 'Gıda Mühendisliği müfredatı',
                ],
                'meta_keywords' => [
                    'az' => 'qida mühəndisliyi, qida sektoru',
                    'en' => 'food engineering, food sector',
                    'ru' => 'пищевая инженерия, пищевой сектор',
                    'tr' => 'gıda mühendisliği, gıda sektörü',
                ],
                'slug' => 'qida-muhendisliyi',
                'image' => 'program3.jpg',
                'type' => 1,
            ],

            [
                'title' => [
                    'az' => 'İngilis dili hazırlığı',
                    'en' => 'English Language Preparation',
                    'ru' => 'Подготовка по английскому языку',
                    'tr' => 'İngilizce Hazırlık',
                ],
                'content' => [
                    'az' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'en' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'ru' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                    'tr' => 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular.',
                ],
                'meta_title' => [
                    'az' => 'İngilis dili hazırlığı',
                    'en' => 'English Language Preparation',
                    'ru' => 'Подготовка по английскому языку',
                    'tr' => 'İngilizce Hazırlık',
                ],
                'meta_description' => [
                    'az' => 'İntensiv ingilis dili hazırlığı',
                    'en' => 'Intensive English language preparation',
                    'ru' => 'Интенсивная подготовка по английскому языку',
                    'tr' => 'Yoğun İngilizce hazırlık kursu',
                ],
                'meta_keywords' => [
                    'az' => 'ingilis dili, hazırlıq, kurs',
                    'en' => 'english language, preparation, course',
                    'ru' => 'английский язык, подготовка, курс',
                    'tr' => 'ingilizce, hazırlık, kurs',
                ],
                'slug' => 'ingilis-hazirliq',
                'image' => 'program4.jpg',
                'type' => 1,
            ],

            [
                'title' => [
                    'az' => 'Akademik heyət',
                    'en' => 'Academic Staff',
                    'ru' => 'Академический состав',
                    'tr' => 'Akademik Kadro',
                ],
                'meta_title' => [
                    'az' => 'Akademik heyət',
                    'en' => 'Academic Staff',
                    'ru' => 'Академический состав',
                    'tr' => 'Akademik Kadro',
                ],
                'meta_description' => [
                    'az' => 'Fakültənin akademik heyəti və professor-müəllim heyəti haqqında məlumat',
                    'en' => 'Information about the academic and teaching staff of the faculty',
                    'ru' => 'Информация об академическом и преподавательском составе факультета',
                    'tr' => 'Fakültenin akademik ve öğretim kadrosu hakkında bilgiler',
                ],
                'meta_keywords' => [
                    'az' => 'akademik heyət, müəllimlər, professorlar',
                    'en' => 'academic staff, teachers, professors',
                    'ru' => 'академический состав, преподаватели, профессора',
                    'tr' => 'akademik kadro, öğretmenler, profesörler',
                ],
                'slug' => 'akademik-heyet',
                'image' => 'program5.jpg',
                'image2' => 'program1.svg',
                'program_dynamic_ids' => [6, 7, 8],
                'type' => 0,
            ],

            [
                'title' => [
                    'az' => 'Dərs planı',
                    'en' => 'Curriculum',
                    'ru' => 'Учебный план',
                    'tr' => 'Ders Planı',
                ],
                'meta_title' => [
                    'az' => 'Dərs planı',
                    'en' => 'Curriculum',
                    'ru' => 'Учебный план',
                    'tr' => 'Ders Planı',
                ],
                'meta_description' => [
                    'az' => 'Tədris proqramı və dərs planları haqqında ətraflı məlumat',
                    'en' => 'Detailed information about the curriculum and lesson plans',
                    'ru' => 'Подробная информация об учебной программе и планах уроков',
                    'tr' => 'Müfredat ve ders planları hakkında detaylı bilgi',
                ],
                'meta_keywords' => [
                    'az' => 'dərs planı, tədris proqramı, sillabus',
                    'en' => 'curriculum, lesson plan, syllabus',
                    'ru' => 'учебный план, учебная программа, силлабус',
                    'tr' => 'ders planı, öğretim programı, müfredat',
                ],
                'program_dynamic_ids' => [9],
                'slug' => 'ders-plani',
                'image' => 'program6.jpg',
                'image2' => 'program2.svg',
                'type' => 0,
            ],

            [
                'title' => [
                    'az' => 'Dərs cədvəli',
                    'en' => 'Course Schedule',
                    'ru' => 'Расписание занятий',
                    'tr' => 'Ders Programı',
                ],
                'meta_title' => [
                    'az' => 'Dərs cədvəli',
                    'en' => 'Course Schedule',
                    'ru' => 'Расписание занятий',
                    'tr' => 'Ders Programı',
                ],
                'meta_description' => [
                    'az' => 'Cari semestr üçün həftəlik dərs cədvəli',
                    'en' => 'Weekly course schedule for the current semester',
                    'ru' => 'Еженедельное расписание занятий на текущий семестр',
                    'tr' => 'Mevcut dönem için haftalık ders programı',
                ],
                'meta_keywords' => [
                    'az' => 'dərs cədvəli, həftəlik cədvəl, dərslər',
                    'en' => 'course schedule, weekly schedule, classes',
                    'ru' => 'расписание занятий, еженедельное расписание, уроки',
                    'tr' => 'ders programı, haftalık program, dersler',
                ],
                'program_dynamic_ids' => [10],
                'slug' => 'ders-cedveli',
                'image' => 'program6.jpg',
                'image2' => 'program3.svg',
                'type' => 0,
            ],

            [
                'title' => [
                    'az' => 'Laboratoriya',
                    'en' => 'Laboratory',
                    'ru' => 'Лаборатория',
                    'tr' => 'Laboratuvar',
                ],
                'meta_title' => [
                    'az' => 'Laboratoriya',
                    'en' => 'Laboratory',
                    'ru' => 'Лаборатория',
                    'tr' => 'Laboratuvar',
                ],
                'meta_description' => [
                    'az' => 'Tədqiqat və tədris laboratoriyaları haqqında məlumat',
                    'en' => 'Information about research and teaching laboratories',
                    'ru' => 'Информация о научно-исследовательских и учебных лабораториях',
                    'tr' => 'Araştırma ve eğitim laboratuvarları hakkında bilgi',
                ],
                'meta_keywords' => [
                    'az' => 'laboratoriya, tədqiqat, avadanlıqlar',
                    'en' => 'laboratory, research, equipment',
                    'ru' => 'лаборатория, исследования, оборудование',
                    'tr' => 'laboratuvar, araştırma, ekipmanlar',
                ],
                'program_dynamic_ids' => [11],
                'slug' => 'laboratoriya',
                'image' => 'program7.jpg',
                'image2' => 'program4.svg',
                'type' => 0,
            ],

            [
                'title' => [
                    'az' => 'İmtahan cədvəli',
                    'en' => 'Exam Schedule',
                    'ru' => 'Расписание экзаменов',
                    'tr' => 'Sınav Programı',
                ],
                'meta_title' => [
                    'az' => 'İmtahan cədvəli',
                    'en' => 'Exam Schedule',
                    'ru' => 'Расписание экзаменов',
                    'tr' => 'Sınav Programı',
                ],
                'meta_description' => [
                    'az' => 'Final və aralıq imtahanlarının cədvəli',
                    'en' => 'Schedule for final and midterm exams',
                    'ru' => 'Расписание финальных и промежуточных экзаменов',
                    'tr' => 'Final ve ara sınav programı',
                ],
                'meta_keywords' => [
                    'az' => 'imtahan cədvəli, imtahanlar, sessiya',
                    'en' => 'exam schedule, exams, session',
                    'ru' => 'расписание экзаменов, экзамены, сессия',
                    'tr' => 'sınav programı, sınavlar, oturum',
                ],
                'program_dynamic_ids' => [12, 13],
                'slug' => 'imtahan-cedveli',
                'image' => 'program9.jpg',
                'image2' => 'program5.svg',
                'type' => 0,
            ],

            [
                'title' => [
                    'az' => 'Elanlar',
                    'en' => 'Announcements',
                    'ru' => 'Объявления',
                    'tr' => 'Duyurular',
                ],
                'meta_title' => [
                    'az' => 'Elanlar',
                    'en' => 'Announcements',
                    'ru' => 'Объявления',
                    'tr' => 'Duyurular',
                ],
                'meta_description' => [
                    'az' => 'Ən son elanlar və xəbərdarlıqlar',
                    'en' => 'Latest announcements and notifications',
                    'ru' => 'Последние объявления и уведомления',
                    'tr' => 'Son duyurular ve bildirimler',
                ],
                'meta_keywords' => [
                    'az' => 'elanlar, xəbərlər, bildirişlər',
                    'en' => 'announcements, news, notifications',
                    'ru' => 'объявления, новости, уведомления',
                    'tr' => 'duyurular, haberler, bildirimler',
                ],
                'program_dynamic_ids' => [14],

                'slug' => 'elanlar',
                'image' => 'program10.jpg',
                'image2' => 'program6.svg',
                'type' => 0,
            ],
        ];

        $dynamics = [
            [
                'title' => [
                    'az' => 'Niyə kompüter elmləri',
                    'en' => 'Niyə kompüter elmləri',
                    'ru' => 'Niyə kompüter elmləri',
                    'tr' => 'Niyə kompüter elmləri',
                ],

                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            [
                'program_dynamic_item_ids' => [1, 2, 3, 4],
                'type' => 6,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],

            [
                'description' => [
                    'az' =>
                        '<div class="about" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 36px; line-height: 38px; letter-spacing: 0%; color: rgb(0, 0, 0);">Proqram haqqında</h2><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p></div><div class="goals" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 36px; line-height: 38px; letter-spacing: 0%; color: rgb(0, 0, 0);">Əsas məqsədlər</h2><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; flex-direction: column; gap: 12px; list-style-position: inside;"><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Proqramlaşdırma dilləri və alqoritmlərdə dərin bilik formalaşdırmaq</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Kompüter arxitekturası və əməliyyat sistemlərini başa düşmək</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Süni intellekt və maşın öyrənməsi texnologiyalarını mənimsəmək</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Komanda işi və layihə idarəetməsi bacarıqları inkişaf etdirmək</li></ul></div>',
                    'en' =>
                        '<div class="about" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 36px; line-height: 38px; letter-spacing: 0%; color: rgb(0, 0, 0);">Proqram haqqında</h2><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p></div><div class="goals" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 36px; line-height: 38px; letter-spacing: 0%; color: rgb(0, 0, 0);">Əsas məqsədlər</h2><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; flex-direction: column; gap: 12px; list-style-position: inside;"><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Proqramlaşdırma dilləri və alqoritmlərdə dərin bilik formalaşdırmaq</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Kompüter arxitekturası və əməliyyat sistemlərini başa düşmək</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Süni intellekt və maşın öyrənməsi texnologiyalarını mənimsəmək</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Komanda işi və layihə idarəetməsi bacarıqları inkişaf etdirmək</li></ul></div>',
                    'ru' =>
                        '<div class="about" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 36px; line-height: 38px; letter-spacing: 0%; color: rgb(0, 0, 0);">Proqram haqqında</h2><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p></div><div class="goals" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 36px; line-height: 38px; letter-spacing: 0%; color: rgb(0, 0, 0);">Əsas məqsədlər</h2><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; flex-direction: column; gap: 12px; list-style-position: inside;"><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Proqramlaşdırma dilləri və alqoritmlərdə dərin bilik formalaşdırmaq</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Kompüter arxitekturası və əməliyyat sistemlərini başa düşmək</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Süni intellekt və maşın öyrənməsi texnologiyalarını mənimsəmək</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Komanda işi və layihə idarəetməsi bacarıqları inkişaf etdirmək</li></ul></div>',
                    'tr' =>
                        '<div class="about" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 36px; line-height: 38px; letter-spacing: 0%; color: rgb(0, 0, 0);">Proqram haqqında</h2><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 18px; line-height: 28px; letter-spacing: 0%;">"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p></div><div class="goals" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 36px; line-height: 38px; letter-spacing: 0%; color: rgb(0, 0, 0);">Əsas məqsədlər</h2><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; display: flex; flex-direction: column; gap: 12px; list-style-position: inside;"><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Proqramlaşdırma dilləri və alqoritmlərdə dərin bilik formalaşdırmaq</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Kompüter arxitekturası və əməliyyat sistemlərini başa düşmək</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Süni intellekt və maşın öyrənməsi texnologiyalarını mənimsəmək</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 38px; letter-spacing: 0%;">Komanda işi və layihə idarəetməsi bacarıqları inkişaf etdirmək</li></ul></div>',
                ],

                'type' => 2,
                'order' => 3,
                'layout_row' => 1,
                'layout_column' => 3,
                'layout_width' => 'full',
            ],

            [
                'title' => [
                    'az' => 'Karyera imkanları',
                    'en' => 'Karyera imkanları',
                    'ru' => 'Karyera imkanları',
                    'tr' => 'Karyera imkanları',
                ],

                'type' => 1,
                'order' => 4,
                'layout_row' => 1,
                'layout_column' => 4,
                'layout_width' => 'full',
            ],

            [
                'program_dynamic_item_ids' => [5, 6, 7, 8],
                'type' => 6,
                'order' => 5,
                'layout_row' => 1,
                'layout_column' => 5,
                'layout_width' => 'full',
            ],

            //akademik heyyet
            [
                'title' => [
                    'az' => 'Bizim Akademik Heyətlə tanış olun',
                    'en' => 'Bizim Akademik Heyətlə tanış olun',
                    'ru' => 'Bizim Akademik Heyətlə tanış olun',
                    'tr' => 'Bizim Akademik Heyətlə tanış olun',
                ],

                'type' => 1,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'half',
            ],

            [
                'description' => [
                    'az' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?',
                    'en' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?',
                    'ru' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?',
                    'tr' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?',
                ],

                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],

            [
                'program_dynamic_item_ids' => [1, 2, 3, 4, 5, 6],
                'type' => 6,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 3,
                'layout_width' => 'full',
            ],

            [
                'description' => [
                    'az' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 32px; line-height: 32px; letter-spacing: 0%; vertical-align: middle; color: rgb(74, 74, 74); background-color: rgb(255, 255, 255);">1-ci il</h2><table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1215.49px; font-size: medium; background-color: rgb(255, 255, 255);"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn adı</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Kod</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Kredit</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Təhsil forması</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">MATH101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">6</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">CS101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">PHYS101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">6</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Alqoritmlər və proqramlaşdırma I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">CS103</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">7</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Akademik İngilis dili</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">ENG101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr></tbody></table>',
                    'en' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 32px; line-height: 32px; letter-spacing: 0%; vertical-align: middle; color: rgb(74, 74, 74); background-color: rgb(255, 255, 255);">1-ci il</h2><table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1215.49px; font-size: medium; background-color: rgb(255, 255, 255);"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn adı</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Kod</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Kredit</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Təhsil forması</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">MATH101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">6</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">CS101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">PHYS101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">6</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Alqoritmlər və proqramlaşdırma I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">CS103</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">7</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Akademik İngilis dili</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">ENG101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr></tbody></table>',
                    'ru' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 32px; line-height: 32px; letter-spacing: 0%; vertical-align: middle; color: rgb(74, 74, 74); background-color: rgb(255, 255, 255);">1-ci il</h2><table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1215.49px; font-size: medium; background-color: rgb(255, 255, 255);"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn adı</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Kod</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Kredit</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Təhsil forması</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">MATH101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">6</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">CS101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">PHYS101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">6</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Alqoritmlər və proqramlaşdırma I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">CS103</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">7</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Akademik İngilis dili</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">ENG101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr></tbody></table>',
                    'tr' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 32px; line-height: 32px; letter-spacing: 0%; vertical-align: middle; color: rgb(74, 74, 74); background-color: rgb(255, 255, 255);">1-ci il</h2><table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1215.49px; font-size: medium; background-color: rgb(255, 255, 255);"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn adı</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Kod</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Kredit</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Təhsil forması</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">MATH101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">6</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">CS101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">PHYS101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">6</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Alqoritmlər və proqramlaşdırma I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">CS103</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">7</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">5</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Akademik İngilis dili</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">ENG101</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Əyani</td></tr></tbody></table>',
                ],

                'type' => 2,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            [
                'description' => [
                    'az' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 32px; line-height: 32px; letter-spacing: 0%; vertical-align: middle; color: rgb(74, 74, 74); background-color: rgb(255, 255, 255);">Həftəlik Dərs Cədvəli (1-ci Kurs 1 semestr)</h2><table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1215.49px; font-size: medium; background-color: rgb(255, 255, 255);"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Gün</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Saat</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Otaq</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Müəllim</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Bazar ertəsi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">09:00 - 10:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">A102</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Dr. Elnur Məmmədov</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Bazar ertəsi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">11:00 - 12:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Lab 4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Prof. Samirə Əliyeva</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Çərşənbə axşamı</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">14:00 - 15:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">B205</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Dos. Fuad Qasımov</td></tr></tbody></table>',
                    'en' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 32px; line-height: 32px; letter-spacing: 0%; vertical-align: middle; color: rgb(74, 74, 74); background-color: rgb(255, 255, 255);">Həftəlik Dərs Cədvəli (1-ci Kurs 1 semestr)</h2><table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1215.49px; font-size: medium; background-color: rgb(255, 255, 255);"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Gün</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Saat</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Otaq</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Müəllim</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Bazar ertəsi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">09:00 - 10:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">A102</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Dr. Elnur Məmmədov</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Bazar ertəsi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">11:00 - 12:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Lab 4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Prof. Samirə Əliyeva</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Çərşənbə axşamı</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">14:00 - 15:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">B205</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Dos. Fuad Qasımov</td></tr></tbody></table>',
                    'ru' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 32px; line-height: 32px; letter-spacing: 0%; vertical-align: middle; color: rgb(74, 74, 74); background-color: rgb(255, 255, 255);">Həftəlik Dərs Cədvəli (1-ci Kurs 1 semestr)</h2><table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1215.49px; font-size: medium; background-color: rgb(255, 255, 255);"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Gün</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Saat</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Otaq</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Müəllim</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Bazar ertəsi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">09:00 - 10:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">A102</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Dr. Elnur Məmmədov</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Bazar ertəsi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">11:00 - 12:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Lab 4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Prof. Samirə Əliyeva</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Çərşənbə axşamı</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">14:00 - 15:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">B205</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Dos. Fuad Qasımov</td></tr></tbody></table>',
                    'tr' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 32px; line-height: 32px; letter-spacing: 0%; vertical-align: middle; color: rgb(74, 74, 74); background-color: rgb(255, 255, 255);">Həftəlik Dərs Cədvəli (1-ci Kurs 1 semestr)</h2><table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1215.49px; font-size: medium; background-color: rgb(255, 255, 255);"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Gün</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Saat</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Otaq</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Müəllim</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Bazar ertəsi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">09:00 - 10:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">A102</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Dr. Elnur Məmmədov</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Bazar ertəsi</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">11:00 - 12:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Lab 4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Prof. Samirə Əliyeva</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Çərşənbə axşamı</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">14:00 - 15:30</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">B205</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Dos. Fuad Qasımov</td></tr></tbody></table>',
                ],

                'type' => 2,
                'order' => 2,
                'layout_row' => 1,
                'layout_column' => 2,
                'layout_width' => 'full',
            ],

            [
                'program_dynamic_item_ids' => [7, 8, 9, 10],
                'type' => 6,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            [
                'description' => [
                    'az' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 600; font-size: 32px; line-height: 32px; letter-spacing: 0%; color: rgb(8, 10, 18);">İmtahan Cədvəli (Qış Semestri 2014-2025)</h2><div class="rules" style="margin: 0px; padding: 12px; font-family: &quot;Noto Sans&quot;, sans-serif; border-radius: 26px; background: rgb(254, 252, 234); border-width: 1px 1px 1px 6px; border-style: solid; border-color: rgb(199, 137, 11); border-image: initial; font-size: medium;"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahan Qaydaları</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: inside;"><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahana 15 dəqiqə əvvəl gəlmək məcburidir</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Tələbə vəsiqəsi və ya şəxsiyyət vəsiqəsi gətirmək vacibdir</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Mobil telefonlar və elektronik cihazlar qadağandır</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Gecikənlər imtahana buraxılmayacaq</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahan nəticələri 7 iş günü ərzində elan olunacaq</li></ul></div>',
                    'en' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 600; font-size: 32px; line-height: 32px; letter-spacing: 0%; color: rgb(8, 10, 18);">İmtahan Cədvəli (Qış Semestri 2014-2025)</h2><div class="rules" style="margin: 0px; padding: 12px; font-family: &quot;Noto Sans&quot;, sans-serif; border-radius: 26px; background: rgb(254, 252, 234); border-width: 1px 1px 1px 6px; border-style: solid; border-color: rgb(199, 137, 11); border-image: initial; font-size: medium;"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahan Qaydaları</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: inside;"><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahana 15 dəqiqə əvvəl gəlmək məcburidir</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Tələbə vəsiqəsi və ya şəxsiyyət vəsiqəsi gətirmək vacibdir</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Mobil telefonlar və elektronik cihazlar qadağandır</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Gecikənlər imtahana buraxılmayacaq</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahan nəticələri 7 iş günü ərzində elan olunacaq</li></ul></div>',
                    'ru' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 600; font-size: 32px; line-height: 32px; letter-spacing: 0%; color: rgb(8, 10, 18);">İmtahan Cədvəli (Qış Semestri 2014-2025)</h2><div class="rules" style="margin: 0px; padding: 12px; font-family: &quot;Noto Sans&quot;, sans-serif; border-radius: 26px; background: rgb(254, 252, 234); border-width: 1px 1px 1px 6px; border-style: solid; border-color: rgb(199, 137, 11); border-image: initial; font-size: medium;"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahan Qaydaları</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: inside;"><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahana 15 dəqiqə əvvəl gəlmək məcburidir</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Tələbə vəsiqəsi və ya şəxsiyyət vəsiqəsi gətirmək vacibdir</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Mobil telefonlar və elektronik cihazlar qadağandır</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Gecikənlər imtahana buraxılmayacaq</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahan nəticələri 7 iş günü ərzində elan olunacaq</li></ul></div>',
                    'tr' =>
                        '<h2 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 600; font-size: 32px; line-height: 32px; letter-spacing: 0%; color: rgb(8, 10, 18);">İmtahan Cədvəli (Qış Semestri 2014-2025)</h2><div class="rules" style="margin: 0px; padding: 12px; font-family: &quot;Noto Sans&quot;, sans-serif; border-radius: 26px; background: rgb(254, 252, 234); border-width: 1px 1px 1px 6px; border-style: solid; border-color: rgb(199, 137, 11); border-image: initial; font-size: medium;"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahan Qaydaları</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style-position: inside;"><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahana 15 dəqiqə əvvəl gəlmək məcburidir</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Tələbə vəsiqəsi və ya şəxsiyyət vəsiqəsi gətirmək vacibdir</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Mobil telefonlar və elektronik cihazlar qadağandır</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">Gecikənlər imtahana buraxılmayacaq</li><li style="margin: 0px; padding: 0px; font-size: 16px; line-height: 28px; letter-spacing: 0%;">İmtahan nəticələri 7 iş günü ərzində elan olunacaq</li></ul></div>',
                ],

                'type' => 2,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            [
                'description' => [
                    'az' =>
                        '<table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1247.99px; font-size: medium;"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Gün</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Saat</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Otaq</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Növ</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">15.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">10:00 - 12:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">A102</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">17.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">14:00 - 16:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Lab 4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">20.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">09:00 - 11:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">B205</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr></tbody></table>',
                    'en' =>
                        '<table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1247.99px; font-size: medium;"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Gün</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Saat</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Otaq</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Növ</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">15.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">10:00 - 12:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">A102</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">17.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">14:00 - 16:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Lab 4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">20.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">09:00 - 11:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">B205</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr></tbody></table>',
                    'ru' =>
                        '<table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1247.99px; font-size: medium;"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Gün</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Saat</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Otaq</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Növ</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">15.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">10:00 - 12:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">A102</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">17.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">14:00 - 16:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Lab 4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">20.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">09:00 - 11:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">B205</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr></tbody></table>',
                    'tr' =>
                        '<table style="margin: 0px; padding: 0px; font-family: Inter, sans-serif; width: 1247.99px; font-size: medium;"><thead style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; height: 44px;"><tr style="margin: 0px; padding: 0px;"><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 8px 0px 0px;">No</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Gün</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Saat</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Fənn</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248);">Otaq</th><th style="margin: 0px; padding: 0px 16px; height: 44px; text-align: left; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 0%; color: rgb(23, 25, 35); text-wrap-mode: nowrap; background: rgb(239, 244, 248); border-radius: 0px 8px 0px 0px;">Növ</th></tr></thead><tbody style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif;"><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">1</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">15.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">10:00 - 12:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Riyazi analiz I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">A102</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">2</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">17.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">14:00 - 16:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Fizika I</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Lab 4</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr><tr style="margin: 0px; padding: 0px;"><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">3</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">20.01.2025</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">09:00 - 11:00</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Kompüter mühəndisliyinə giriş</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right-color: rgb(239, 244, 248); font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">B205</td><td style="margin: 0px; padding: 16px; width: fit-content; border-bottom-color: rgb(239, 244, 248); border-right: none; font-size: 14px; line-height: 20px; letter-spacing: 0%; color: rgb(45, 55, 72); text-wrap-mode: nowrap;">Final</td></tr></tbody></table>',
                ],

                'type' => 2,
                'order' => 1,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],

            [
                'program_dynamic_item_ids' => [11, 12, 13],
                'type' => 6,
                'order' => 0,
                'layout_row' => 1,
                'layout_column' => 1,
                'layout_width' => 'full',
            ],
        ];

        $program_dynamic_items = [
            [
                'name' => [
                    'az' => 'Gələcəyin peşəsi',
                    'en' => 'Gələcəyin peşəsi',
                    'ru' => 'Gələcəyin peşəsi',
                    'tr' => 'Gələcəyin peşəsi',
                ],
                'description' => [
                    'az' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'en' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'ru' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'tr' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                ],
                'program_dynamic_id' => 2,
                'type' => 1,
                'order' => 1,
                'image' => 'program_dynamic_item1.svg',
            ],
            [
                'name' => [
                    'az' => 'Gələcəyin peşəsi',
                    'en' => 'Gələcəyin peşəsi',
                    'ru' => 'Gələcəyin peşəsi',
                    'tr' => 'Gələcəyin peşəsi',
                ],
                'description' => [
                    'az' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'en' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'ru' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'tr' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                ],
                'program_dynamic_id' => 2,
                'type' => 1,
                'order' => 2,
                'image' => 'program_dynamic_item2.svg',
            ],
            [
                'name' => [
                    'az' => 'Gələcəyin peşəsi',
                    'en' => 'Gələcəyin peşəsi',
                    'ru' => 'Gələcəyin peşəsi',
                    'tr' => 'Gələcəyin peşəsi',
                ],
                'description' => [
                    'az' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'en' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'ru' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'tr' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                ],
                'program_dynamic_id' => 2,
                'type' => 1,
                'order' => 3,
                'image' => 'program_dynamic_item3.svg',
            ],
            [
                'name' => [
                    'az' => 'Gələcəyin peşəsi',
                    'en' => 'Gələcəyin peşəsi',
                    'ru' => 'Gələcəyin peşəsi',
                    'tr' => 'Gələcəyin peşəsi',
                ],
                'description' => [
                    'az' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'en' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'ru' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                    'tr' => 'Beynəlxalq standartlara uyğun yüksək keyfiyyətli təhsil proqramları təqdim etmək',
                ],
                'program_dynamic_id' => 2,
                'type' => 1,
                'order' => 4,
                'image' => 'program_dynamic_item4.svg',
            ],

            [
                'description' => [
                    'az' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Software Developer</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Microsoft, Google, Amazon, Facebook</p></h3>',
                    'en' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Software Developer</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Microsoft, Google, Amazon, Facebook</p></h3>',
                    'ru' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Software Developer</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Microsoft, Google, Amazon, Facebook</p></h3>',
                    'tr' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Software Developer</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Microsoft, Google, Amazon, Facebook</p></h3>',
                ],
                'program_dynamic_id' => 5,
                'type' => 2,
                'order' => 1,
                'url' => '/career',
            ],

            [
                'description' => [
                    'az' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Data Scientist</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">AI/ML şirkətləri və tədqiqat mərkəzləri</p></h3>',
                    'en' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Data Scientist</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">AI/ML şirkətləri və tədqiqat mərkəzləri</p></h3>',
                    'ru' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Data Scientist</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">AI/ML şirkətləri və tədqiqat mərkəzləri</p></h3>',
                    'tr' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Data Scientist</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">AI/ML şirkətləri və tədqiqat mərkəzləri</p></h3>',
                ],
                'program_dynamic_id' => 5,
                'type' => 2,
                'order' => 2,
                'url' => '/career',
            ],

            [
                'description' => [
                    'az' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">System Architect</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Böyük korporasiyalar və IT şirkətləri</p></h3>',
                    'en' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">System Architect</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Böyük korporasiyalar və IT şirkətləri</p></h3>',
                    'ru' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">System Architect</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Böyük korporasiyalar və IT şirkətləri</p></h3>',
                    'tr' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">System Architect</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Böyük korporasiyalar və IT şirkətləri</p></h3>',
                ],
                'program_dynamic_id' => 5,
                'type' => 2,
                'order' => 3,
                'url' => '/career',
            ],

            [
                'description' => [
                    'az' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Cybersecurity Specialist</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Bank, telekom və dövlət sektoru</p></h3>',
                    'en' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Cybersecurity Specialist</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Bank, telekom və dövlət sektoru</p></h3>',
                    'ru' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Cybersecurity Specialist</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Bank, telekom və dövlət sektoru</p></h3>',
                    'tr' => '<h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);">Cybersecurity Specialist</h3><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; font-weight: 500; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(8, 10, 18);"><p style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: medium; line-height: 28px; color: rgb(0, 0, 0);">Bank, telekom və dövlət sektoru</p></h3>',
                ],
                'program_dynamic_id' => 5,
                'type' => 2,
                'order' => 4,
                'url' => '/career',
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

                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],
                'email' => 'a.kilic@tau.edu.az',
                'phone' => '00 000 00 00',
                'program_dynamic_id' => 8,
                'type' => 6,
                'order' => 1,
                'image' => 'program_dynamic_item1.jpg',
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

                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],
                'email' => 'a.kilic@tau.edu.az',
                'phone' => '00 000 00 00',
                'program_dynamic_id' => 8,
                'type' => 6,
                'order' => 2,
                'image' => 'program_dynamic_item2.jpg',
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

                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],
                'email' => 'a.kilic@tau.edu.az',
                'phone' => '00 000 00 00',
                'program_dynamic_id' => 8,
                'type' => 6,
                'order' => 3,
                'image' => 'program_dynamic_item3.jpg',
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

                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],
                'email' => 'a.kilic@tau.edu.az',
                'phone' => '00 000 00 00',
                'program_dynamic_id' => 8,
                'type' => 6,
                'order' => 4,
                'image' => 'program_dynamic_item4.jpg',
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

                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],
                'email' => 'a.kilic@tau.edu.az',
                'phone' => '00 000 00 00',
                'program_dynamic_id' => 8,
                'type' => 6,
                'order' => 5,
                'image' => 'program_dynamic_item5.jpg',
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

                'description' => [
                    'az' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'en' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'ru' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                    'tr' => '<span style="color: rgb(76, 85, 100); font-family: &quot;Noto Sans&quot;, sans-serif; font-size: 10px; letter-spacing: 0%;">Süni İntellekt və Maşın Öyrənməsi sahəsində 20 illik təcrübəyə malik. MIT və Stanford universitetlərində tədqiqat aparmışdır.</span>',
                ],
                'email' => 'a.kilic@tau.edu.az',
                'phone' => '00 000 00 00',
                'program_dynamic_id' => 8,
                'type' => 6,
                'order' => 6,
                'image' => 'program_dynamic_item6.jpg',
            ],

            [
                'title' => [
                    'az' => 'Proqramlaşdırma Laboratoriyası',
                    'en' => 'Programming Laboratory',
                    'ru' => 'Лаборатория программирования',
                    'tr' => 'Programlama Laboratuvarı',
                ],
                'description' => [
                    'az' => 'Müasir proqram təminatının hazırlanması, alqoritmlərin test edilməsi və bulud texnologiyalarının tətbiqi üçün nəzərdə tutulmuş innovativ mühit.',
                    'en' => 'An innovative environment designed for modern software development, algorithm testing, and cloud technology application.',
                    'ru' => 'Инновационная среда, предназначенная для современной разработки ПО, тестирования алгоритмов и применения облачных технологий.',
                    'tr' => 'Modern yazılım geliştirme, algoritma testi ve bulut teknolojisi uygulamaları için tasarlanmış yenilikçi bir ortam.',
                ],
                'program_dynamic_id' => 11,
                'type' => 5,
                'order' => 1,
                'url' => 'laboratories/roqramlasdirma-laboratoriyasi',
                'image' => 'program_dynamic_item9.jpg',
            ],

            [
                'title' => [
                    'az' => 'Kiber Təhlükəsizlik Laboratoriyası',
                    'en' => 'Cyber Security Laboratory',
                    'ru' => 'Лаборатория кибербезопасности',
                    'tr' => 'Siber Güvenlik Laboratuvarı',
                ],
                'description' => [
                    'az' => 'Şəbəkə təhlükəsizliyi, nüfuzetmə testləri və rəqəmsal kriminalistika sahəsində praktiki tədqiqatların aparıldığı ixtisaslaşmış mərkəz.',
                    'en' => 'A specialized center for practical research in network security, penetration testing, and digital forensics.',
                    'ru' => 'Специализированный центр для практических исследований в области сетевой безопасности, тестирования на проникновение и цифровой криминалистики.',
                    'tr' => 'Ağ güvenliği, sızma testleri ve dijital adli tıp alanlarında pratik araştırmaların yapıldığı uzmanlaşmış merkez.',
                ],
                'program_dynamic_id' => 11,
                'type' => 5,
                'order' => 2,
                'url' => 'laboratories/kiber-tehlukesizlik-merkezi',
                'image' => 'program_dynamic_item7.jpg',
            ],

            [
                'title' => [
                    'az' => 'Süni İntellekt Laboratoriyası',
                    'en' => 'Artificial Intelligence Laboratory',
                    'ru' => 'Лаборатория искусственного интеллекта',
                    'tr' => 'Yapay Zeka Laboratuvarı',
                ],
                'description' => [
                    'az' => 'Maşın öyrənməsi, dərin öyrənmə və robototexnika layihələrinin icrası üçün nəzərdə tutulmuş elmi-tədqiqat laboratoriyası.',
                    'en' => 'A research laboratory designed for the execution of machine learning, deep learning, and robotics projects.',
                    'ru' => 'Научно-исследовательская лаборатория, предназначенная для выполнения проектов в области машинного и глубокого обучения, а также робототехники.',
                    'tr' => 'Makine öğrenimi, derin öğrenme ve robotik projelerinin yürütülmesi için tasarlanmış araştırma laboratuvarı.',
                ],
                'program_dynamic_id' => 11,
                'type' => 5,
                'order' => 3,
                'url' => 'laboratories/suni-intellekt-lab',
                'image' => 'program_dynamic_item8.jpg',
            ],

            [
                'title' => [
                    'az' => 'Proqramlaşdırma Laboratoriyası',
                    'en' => 'Programming Laboratory',
                    'ru' => 'Лаборатория программирования',
                    'tr' => 'Programlama Laboratuvarı',
                ],
                'description' => [
                    'az' => 'Müasir proqram təminatının hazırlanması, alqoritmlərin test edilməsi və bulud texnologiyalarının tətbiqi üçün nəzərdə tutulmuş innovativ mühit.',
                    'en' => 'An innovative environment designed for modern software development, algorithm testing, and cloud technology application.',
                    'ru' => 'Инновационная среда, предназначенная для современной разработки ПО, тестирования алгоритмов и применения облачных технологий.',
                    'tr' => 'Modern yazılım geliştirme, algoritma testi ve bulut teknolojisi uygulamaları için tasarlanmış yenilikçi bir ortam.',
                ],
                'program_dynamic_id' => 11,
                'type' => 5,
                'order' => 4,
                'url' => 'laboratories/roqramlasdirma-laboratoriyasi',
                'image' => 'program_dynamic_item10.jpg',
            ],

            [
                'title' => [
                    'az' => 'Bizimlə Çalışın',
                    'en' => 'Work With Us',
                    'ru' => 'Работайте с нами',
                    'tr' => 'Bizimle Çalışın',
                ],
                'subtitle' => [
                    'az' => 'Süni İntellekt sahəsində aparılan "Deep Learning Applications" tədqiqat layihəsinə 3-4-cü kurs tələbələri dəvət olunur.',
                    'en' => '3rd–4th year students are invited to join the "Deep Learning Applications" research project conducted in the field of Artificial Intelligence.',
                    'ru' => 'Студенты 3–4 курсов приглашаются к участию в исследовательском проекте "Deep Learning Applications" в области искусственного интеллекта.',
                    'tr' => 'Yapay zeka alanında yürütülen "Deep Learning Applications" araştırma projesine 3-4. sınıf öğrencileri davet edilmektedir.',
                ],
                'description' => [
                    'az' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                    'en' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                    'ru' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                    'tr' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                ],
                'deadline' => now()->addmonths(2),
                'program_dynamic_id' => 14,
                'url' => '/contact-us',
                'type' => 9,
                'order' => 1,
                'image' => 'program_dynamic_item5.svg',
            ],

            [
                'title' => [
                    'az' => 'Bizimlə Çalışın',
                    'en' => 'Work With Us',
                    'ru' => 'Работайте с нами',
                    'tr' => 'Bizimle Çalışın',
                ],
                'subtitle' => [
                    'az' => 'Süni İntellekt sahəsində aparılan "Deep Learning Applications" tədqiqat layihəsinə 3-4-cü kurs tələbələri dəvət olunur.',
                    'en' => '3rd–4th year students are invited to join the "Deep Learning Applications" research project conducted in the field of Artificial Intelligence.',
                    'ru' => 'Студенты 3–4 курсов приглашаются к участию в исследовательском проекте "Deep Learning Applications" в области искусственного интеллекта.',
                    'tr' => 'Yapay zeka alanında yürütülen "Deep Learning Applications" araştırma projesine 3-4. sınıf öğrencileri davet edilmektedir.',
                ],
                'description' => [
                    'az' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                    'en' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                    'ru' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                    'tr' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                ],

'deadline' => now()->addmonths(2),
                'program_dynamic_id' => 14,
                'url' => '/contact-us',
                'type' => 9,
                'order' => 2,
                'image' => 'program_dynamic_item6.svg',
            ],

            [
                'title' => [
                    'az' => 'Bizimlə Çalışın',
                    'en' => 'Work With Us',
                    'ru' => 'Работайте с нами',
                    'tr' => 'Bizimle Çalışın',
                ],
                'subtitle' => [
                    'az' => 'Süni İntellekt sahəsində aparılan "Deep Learning Applications" tədqiqat layihəsinə 3-4-cü kurs tələbələri dəvət olunur.',
                    'en' => '3rd–4th year students are invited to join the "Deep Learning Applications" research project conducted in the field of Artificial Intelligence.',
                    'ru' => 'Студенты 3–4 курсов приглашаются к участию в исследовательском проекте "Deep Learning Applications" в области искусственного интеллекта.',
                    'tr' => 'Yapay zeka alanında yürütülen "Deep Learning Applications" araştırma projesine 3-4. sınıf öğrencileri davet edilmektedir.',
                ],
                'description' => [
                    'az' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                    'en' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                    'ru' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                    'tr' =>
                        '<div class="info" style="margin: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; flex-direction: column; gap: 24px; font-size: medium;"><h3 style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: &quot;Noto Sans&quot;, sans-serif; display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 28px; line-height: 28px; letter-spacing: 0%; color: rgb(33, 33, 33);">Tələblər</h3><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-direction: column; gap: 16px;"><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Python və PyTorch/TensorFlow bilikləri</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Minimum 3.0 GPA</li><li style="margin: 0px; padding: 0px; display: flex; align-items: center; gap: 12px; font-size: 20px; line-height: 20px; letter-spacing: 0%; color: rgb(33, 33, 33);">Həftədə 15 saat vaxt ayıra bilmək</li></ul></div>',
                ],
'deadline' => now()->addmonths(2),
                'program_dynamic_id' => 14,
                'url' => '/contact-us',
                'type' => 9,
                'order' => 3,
                'image' => 'program_dynamic_item7.svg',
            ],
        ];
        seedTranslationAttributes(Program::class, $programs);
        seedTranslationAttributes(ProgramDynamic::class, $dynamics);
        seedTranslationAttributes(ProgramDynamicItem::class, $program_dynamic_items);

        $this->command->info(count($programs) . ' programs created.');
    }
}
