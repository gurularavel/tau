<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\AnnouncementImage;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\User;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Announcement';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('announcements');
        $this->remakeFolder('announcements_images');

        for ($i = 1; $i <= 6; $i++) {
            moveFactoryImageToUploads('announcements', 'announcements', 'announcements' . $i . '.jpg');
        }

        $user = User::first();

        $announcements = [
            [
                'image' => 'announcements1.jpg',
                'tags' => 'beynelxalq, akkreditasiya',
                'user_id' => $user->id,
                'slug' => 'tau-beynelxalq-akkreditasiya-aldi',
                'title' => [
                    'az' => 'TAU beynəlxalq akkreditasiya aldı',
                    'en' => 'TAU received international accreditation',
                    'ru' => 'TAU получил международную аккредитацию',
                ],
                'content' => [
                    'az' => 'Universitetimiz Avropa Akkreditasiya Agentliyindən beynəlxalq akkreditasiya alaraq təhsil keyfiyyətini təsdiqlədi.',
                    'en' => 'Our university has confirmed its educational quality by receiving international accreditation from the European Accreditation Agency.',
                    'ru' => 'Наш университет подтвердил качество образования, получив международную аккредитацию Европейского агентства по аккредитации.',
                ],
                'description' => [
                    'az' => 'Təhsil proqramlarımızın beynəlxalq standartlara uyğunluğu rəsmən təsdiqləndi.',
                    'en' => 'Compliance of our educational programs with international standards has been officially confirmed.',
                    'ru' => 'Соответствие наших образовательных программ международным стандартам официально подтверждено.',
                ],
                'meta_title' => [
                    'az' => 'TAU Beynəlxalq Akkreditasiya | Keyfiyyətli Təhsil',
                    'en' => 'TAU International Accreditation | Quality Education',
                    'ru' => 'TAU Международная Аккредитация | Качественное Образование',
                ],
                'meta_description' => [
                    'az' => 'Türkiyə-Azərbaycan Universiteti Avropa standartlarına uyğun akkreditasiyadan keçdi.',
                    'en' => 'Turkish-Azerbaijani University has been accredited according to European standards.',
                    'ru' => 'Турецко-Азербайджанский Университет прошел аккредитацию в соответствии с европейскими стандартами.',
                ],
                'meta_keywords' => [
                    'az' => 'akkreditasiya, təhsil keyfiyyəti, beynəlxalq standart, TAU',
                    'en' => 'accreditation, education quality, international standard, TAU',
                    'ru' => 'аккредитация, качество образования, международный стандарт, TAU',
                ],
            ],
            [
                'image' => 'announcements2.jpg',
                'tags' => 'qebul, qeydiyyat, 2024',
                'user_id' => $user->id,
                'slug' => 'yeni-tedris-ili-qebul-bashladi',
                'title' => [
                    'az' => 'Yeni tədris ili üçün qəbul prosesi başladı',
                    'en' => 'Admission process for the new academic year has started',
                    'ru' => 'Начался процесс приема на новый учебный год',
                ],
                'content' => [
                    'az' => '2024/2025-ci tədris ili üçün bakalavr pilləsinə sənəd qəbulu və qeydiyyat rəsmən açıq elan edilir.',
                    'en' => 'Admission and registration for the undergraduate level for the 2024/2025 academic year is officially open.',
                    'ru' => 'Прием документов и регистрация на уровень бакалавриата на 2024/2025 учебный год официально открыты.',
                ],
                'description' => [
                    'az' => 'Gələcəyinizi bizimlə qurun. Qəbul şərtləri və sənədlər haqqında ətraflı məlumat.',
                    'en' => 'Build your future with us. Detailed information about admission requirements and documents.',
                    'ru' => 'Стройте свое будущее вместе с нами. Подробная информация о требованиях к приему и документах.',
                ],
                'meta_title' => [
                    'az' => 'Qəbul 2024 | Türkiyə-Azərbaycan Universiteti',
                    'en' => 'Admission 2024 | Turkish-Azerbaijani University',
                    'ru' => 'Прием 2024 | Турецко-Азербайджанский Университет',
                ],
                'meta_description' => [
                    'az' => 'TAU-da təhsil almaq üçün qeydiyyatdan keçin. Yeni ixtisaslar və qəbul qaydaları.',
                    'en' => 'Register to study at TAU. New majors and admission rules.',
                    'ru' => 'Зарегистрируйтесь для обучения в TAU. Новые специальности и правила приема.',
                ],
                'meta_keywords' => [
                    'az' => 'qəbul, qeydiyyat, tələbə qəbulu, TAU 2024',
                    'en' => 'admission, registration, student recruitment, TAU 2024',
                    'ru' => 'прием, регистрация, набор студентов, TAU 2024',
                ],
            ],
            [
                'image' => 'announcements3.jpg',
                'tags' => 'magistratura, mbe, tehsıl',
                'user_id' => $user->id,
                'slug' => 'magistratura-pillesi-uzre-yeni-proqramlar',
                'title' => [
                    'az' => 'Magistratura pilləsi üzrə yeni ixtisaslar',
                    'en' => 'New programs for Master\'s degree',
                    'ru' => 'Новые программы магистратуры',
                ],
                'content' => [
                    'az' => 'Universitetimizdə MBA və mühəndislik sahələri üzrə yeni magistr proqramlarına start verilir.',
                    'en' => 'Our university is launching new Master\'s programs in MBA and engineering fields.',
                    'ru' => 'Наш университет запускает новые магистерские программы в области MBA и инженерии.',
                ],
                'description' => [
                    'az' => 'Karyeranızı peşəkar magistr təhsili ilə sürətləndirin.',
                    'en' => 'Accelerate your career with professional Master\'s education.',
                    'ru' => 'Ускорьте свою карьеру с профессиональным магистерским образованием.',
                ],
                'meta_title' => [
                    'az' => 'Magistratura Qəbulu | TAU',
                    'en' => 'Master\'s Admission | TAU',
                    'ru' => 'Прием в Магистратуру | TAU',
                ],
                'meta_description' => [
                    'az' => 'MBA və Texniki ixtisaslar üzrə magistr təhsili imkanları.',
                    'en' => 'Master\'s education opportunities in MBA and Technical specialties.',
                    'ru' => 'Возможности магистерского образования по специальностям MBA и Техническим наукам.',
                ],
                'meta_keywords' => [
                    'az' => 'magistratura, MBA, yüksək təhsil, magistr qəbulu',
                    'en' => 'master, MBA, higher education, graduate admission',
                    'ru' => 'магистратура, MBA, высшее образование, прием в магистратуру',
                ],
            ],
            [
                'image' => 'announcements4.jpg',
                'tags' => 'teqaud, imtahan, destek',
                'user_id' => $user->id,
                'slug' => 'tələbə-teqaud-proqrami-elan-edildi',
                'title' => [
                    'az' => 'Daxili təqaüd proqramı elan edildi',
                    'en' => 'Internal scholarship program announced',
                    'ru' => 'Объявлена программа внутренних стипендий',
                ],
                'content' => [
                    'az' => 'Yüksək göstəriciləri olan tələbələr üçün xüsusi təhsil təqaüdləri və güzəştlər müəyyən olunub.',
                    'en' => 'Special educational scholarships and discounts have been established for high-achieving students.',
                    'ru' => 'Для студентов с высокими показателями установлены специальные образовательные стипендии и скидки.',
                ],
                'description' => [
                    'az' => 'TAU istedadlı gənclərin təhsilini tam və ya qismən maliyyələşdirir.',
                    'en' => 'TAU fully or partially funds the education of talented youth.',
                    'ru' => 'TAU полностью или частично финансирует обучение талантливой молодежи.',
                ],
                'meta_title' => [
                    'az' => 'Təqaüd İmkanları | TAU Scholarships',
                    'en' => 'Scholarship Opportunities | TAU Scholarships',
                    'ru' => 'Стипендиальные Возможности | TAU Scholarships',
                ],
                'meta_description' => [
                    'az' => 'Tələbə təqaüd proqramları və müraciət qaydaları haqqında elan.',
                    'en' => 'Announcement about student scholarship programs and application procedures.',
                    'ru' => 'Объявление о программах студенческих стипендий и правилах подачи заявок.',
                ],
                'meta_keywords' => [
                    'az' => 'təqaüd, pulsuz təhsil, tələbə dəstəyi, qrant',
                    'en' => 'scholarship, free education, student support, grant',
                    'ru' => 'стипендия, бесплатное образование, поддержка студентов, грант',
                ],
            ],
            [
                'image' => 'announcements5.jpg',
                'tags' => 'texnopark, innovasiya, startap',
                'user_id' => $user->id,
                'slug' => 'innovasiya-ve-texnopark-merkezi-acildi',
                'title' => [
                    'az' => 'İnnovasiya və Texnopark mərkəzi açıldı',
                    'en' => 'Innovation and Technopark center opened',
                    'ru' => 'Открыт центр инноваций и технопарк',
                ],
                'content' => [
                    'az' => 'Tələbələrimizin startap layihələrini reallaşdırmaq üçün müasir Texnopark mərkəzi istifadəyə verildi.',
                    'en' => 'A modern Technopark center was put into use to realize the startup projects of our students.',
                    'ru' => 'Современный технопарк был введен в эксплуатацию для реализации стартап-проектов наших студентов.',
                ],
                'description' => [
                    'az' => 'Yeni texnologiyalar və innovativ mühit artıq TAU-da.',
                    'en' => 'New technologies and innovative environment are now at TAU.',
                    'ru' => 'Новые технологии и инновационная среда теперь в TAU.',
                ],
                'meta_title' => [
                    'az' => 'TAU Texnopark | İnnovasiya Mərkəzi',
                    'en' => 'TAU Technopark | Innovation Center',
                    'ru' => 'TAU Технопарк | Центр Инноваций',
                ],
                'meta_description' => [
                    'az' => 'Startaplar və texnoloji araşdırmalar üçün nəzərdə tutulmuş yeni mərkəzimiz.',
                    'en' => 'Our new center designed for startups and technological research.',
                    'ru' => 'Наш новый центр, предназначенный для стартапов и технологических исследований.',
                ],
                'meta_keywords' => [
                    'az' => 'texnopark, startap, innovasiya, texnologiya',
                    'en' => 'technopark, startup, innovation, technology',
                    'ru' => 'технопарк, стартап, инновации, технологии',
                ],
            ],
            [
                'image' => 'announcements6.jpg',
                'tags' => 'idman, yarish, telebe',
                'user_id' => $user->id,
                'slug' => 'universitetler-arasi-idman-yarişi',
                'title' => [
                    'az' => 'Universitetlərarası idman yarışı keçiriləcək',
                    'en' => 'Inter-university sports competition will be held',
                    'ru' => 'Состоятся межвузовские спортивные соревнования',
                ],
                'content' => [
                    'az' => 'Gələn ay universitetimizdə müxtəlif idman növləri üzrə genişmiqyaslı turnir təşkil olunacaq.',
                    'en' => 'Next month, a large-scale tournament in various sports will be organized at our university.',
                    'ru' => 'В следующем месяце в нашем университете будет организован масштабный турнир по различным видам спорта.',
                ],
                'description' => [
                    'az' => 'Bütün tələbələri sağlam həyat tərzi və yarış ruhuna dəvət edirik.',
                    'en' => 'We invite all students to a healthy lifestyle and competitive spirit.',
                    'ru' => 'Приглашаем всех студентов к здоровому образу жизни и соревновательному духу.',
                ],
                'meta_title' => [
                    'az' => 'İdman Yarışları | TAU Sports',
                    'en' => 'Sports Competitions | TAU Sports',
                    'ru' => 'Спортивные Соревнования | TAU Sports',
                ],
                'meta_description' => [
                    'az' => 'TAU-da tələbə idman turniri haqqında məlumat və qeydiyyat.',
                    'en' => 'Information and registration about the student sports tournament at TAU.',
                    'ru' => 'Информация и регистрация на студенческий спортивный турнир в TAU.',
                ],
                'meta_keywords' => [
                    'az' => 'idman, futbol, voleybol, turnir, TAU idman',
                    'en' => 'sports, football, volleyball, tournament, TAU sports',
                    'ru' => 'спорт, футбол, волейбол, турнир, TAU спорт',
                ],
            ],
        ];

        seedTranslationAttributes(Announcement::class, $announcements);

        $this->command->info(count($announcements) . ' announcements created.');
    }
}
