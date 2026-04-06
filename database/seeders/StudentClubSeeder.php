<?php

namespace Database\Seeders;

use App\Models\StudentClub;
use App\Models\StudentClubCategory;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class StudentClubSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'StudentClubs';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('student_clubs');

        for ($i = 1; $i <= 3; $i++) {
            moveFactoryImageToUploads('student_clubs', 'student_clubs', 'student_club' . $i . '.jpg');
        }

$student_clubs = [
    [
        'image' => 'student_club_tgt.jpg',
        'slug' => 'telebe-gencler-teskilati-ve-hemkarlar-ittifaqi',
        'title' => [
            'az' => 'Tələbə Gənclər Təşkilatı (TGT) və THİK',
            'en' => 'Student Youth Organization (SYO) and STUC',
            'ru' => 'Студенческая Молодежная Организация (СМО) и СТКП',
        ],
        'description' => [
            'az' => 'Tələbələrin asudə vaxtının səmərəli təşkili, onların hüquqlarının müdafiəsi və sosial layihələrin həyata keçirilməsi üzrə əsas mərkəz.',
            'en' => 'The main center for effective organization of students leisure time, protection of their rights, and implementation of social projects.',
            'ru' => 'Основной центр эффективной организации досуга студентов, защиты их прав и реализации социальных проектов.',
        ],
        'meta_title' => [
            'az' => 'Tələbə Gənclər Təşkilatı və Həmkarlar İttifaqı',
            'en' => 'Student Youth Organization and Union',
            'ru' => 'Студенческая Молодежная Организация',
        ],
        'meta_description' => [
            'az' => 'Tələbə özünüidarəetmə orqanları və sosial fəaliyyətlər.',
            'en' => 'Student self-governing bodies and social activities.',
            'ru' => 'Органы студенческого самоуправления и социальная деятельность.',
        ],
        'meta_keywords' => [
            'az' => 'TGT, THİK, tələbə təşkilatları, gənclər',
            'en' => 'SYO, STUC, student organizations, youth',
            'ru' => 'СМО, СТКП, студенческие организации',
        ],
    ],
    [
        'image' => 'student_club_intellect.jpg',
        'slug' => 'intellektual-oyunlar-klubu',
        'title' => [
            'az' => 'İntellektual Oyunlar Klubu',
            'en' => 'Intellectual Games Club',
            'ru' => 'Клуб Интеллектуальных Игр',
        ],
        'description' => [
            'az' => '"Nə? Harada? Nə zaman?", "Xəmsə" və digər intellektual yarışların təşkili vasitəsilə tələbələrin dünyagörüşünün artırılması.',
            'en' => 'Increasing the outlook of students through the organization of "What? Where? When?", "Khamsa" and other intellectual competitions.',
            'ru' => 'Расширение кругозора студентов через организацию "Что? Где? Когда?", "Хамса" и других интеллектуальных соревнований.',
        ],
        'meta_title' => [
            'az' => 'İntellektual Oyunlar Klubu - Yarışlar',
            'en' => 'Intellectual Games Club - Competitions',
            'ru' => 'Клуб Интеллектуальных Игр - Соревнования',
        ],
        'meta_description' => [
            'az' => 'Tələbələr üçün intellektual yarışlar və debat tədbirləri.',
            'en' => 'Intellectual competitions and debate events for students.',
            'ru' => 'Интеллектуальные соревнования и дебаты для студентов.',
        ],
        'meta_keywords' => [
            'az' => 'intellektual oyunlar, debat, xəmsə, bilik yarışı',
            'en' => 'intellectual games, debate, khamsa, knowledge contest',
            'ru' => 'интеллектуальные игры, дебаты, хамса',
        ],
    ],
    [
        'image' => 'student_club_arts.jpg',
        'slug' => 'incesenet-ve-yaradiciliq-klubu',
        'title' => [
            'az' => 'İncəsənət və Yaradıcılıq Klubu',
            'en' => 'Arts and Creativity Club',
            'ru' => 'Клуб Искусства и Творчества',
        ],
        'description' => [
            'az' => 'Musiqi, rəqs, rəsm və teatrla maraqlanan tələbələrin istedadlarını üzə çıxarmaq üçün yaradılmış yaradıcılıq platforması.',
            'en' => 'A creative platform created to reveal the talents of students interested in music, dance, painting and theater.',
            'ru' => 'Творческая платформа, созданная для выявления талантов студентов, интересующихся музыкой, танцами, живописью и театром.',
        ],
        'meta_title' => [
            'az' => 'İncəsənət Klubu - Musiqi və Rəqs',
            'en' => 'Arts Club - Music and Dance',
            'ru' => 'Клуб Искусства - Музыка и Танцы',
        ],
        'meta_description' => [
            'az' => 'Tələbə yaradıcılıq gecələri və incəsənət dərnəkləri.',
            'en' => 'Student creative nights and art circles.',
            'ru' => 'Студенческие творческие вечера и арт-кружки.',
        ],
        'meta_keywords' => [
            'az' => 'incəsənət, musiqi, rəqs, teatr, yaradıcılıq',
            'en' => 'arts, music, dance, theater, creativity',
            'ru' => 'искусство, музыка, танцы, театр',
        ],
    ],
];
        seedTranslationAttributes(StudentClub::class, $student_clubs);

        $this->command->info(count($student_clubs) . ' Student Clubs created.');
    }
}
