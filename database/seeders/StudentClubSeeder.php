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
        'image' => 'student_club1.jpg',
        'slug' => 'telebe-gencler-teskilati-ve-hemkarlar-ittifaqi',
        'title' => [
            'az' => 'Tələbə Gənclər Təşkilatı (TGT) və THİK',
            'en' => 'Student Youth Organization (SYO) and STUC',
            'ru' => 'Студенческая Молодежная Организация (СМО) и СТКП',
            'tr' => 'Öğrenci Gençlik Örgütü (ÖGÖ) ve THİK',
        ],
        'description' => [
            'az' => 'Tələbələrin asudə vaxtının səmərəli təşkili, niiden hüquqlarının müdafiəsi və sosial layihələrin həyata keçirilməsi üzrə əsas mərkəz.',
            'en' => 'The main center for effective organization of students leisure time, protection of their rights, and implementation of social projects.',
            'ru' => 'Основной центр эффективной организации досуга студентов, защиты их прав и реализации социальных проектов.',
            'tr' => 'Öğrencilerin boş zamanlarının verimli organizasyonu, haklarının korunması ve sosyal projelerin uygulanması için ana merkez.',
        ],
        'meta_title' => [
            'az' => 'Tələbə Gənclər Təşkilatı və Həmkarlar İttifaqı',
            'en' => 'Student Youth Organization and Union',
            'ru' => 'Студенческая Молодежная Организация',
            'tr' => 'Öğrenci Gençlik Örgütü ve Sendikası',
        ],
        'meta_description' => [
            'az' => 'Tələbə özünüidarəetmə orqanları və sosial fəaliyyətlər.',
            'en' => 'Student self-governing bodies and social activities.',
            'ru' => 'Органы студенческого самоуправления и социальная деятельность.',
            'tr' => 'Öğrenci öz yönetim organları ve sosyal faaliyetler.',
        ],
        'meta_keywords' => [
            'az' => 'TGT, THİK, tələbə təşkilatları, gənclər',
            'en' => 'SYO, STUC, student organizations, youth',
            'ru' => 'СМО, СТКП, студенческие организации',
            'tr' => 'ÖGÖ, THİK, öğrenci organizasyonları, gençler',
        ],
    ],
    [
        'image' => 'student_club2.jpg',
        'slug' => 'intellektual-oyunlar-klubu',
        'title' => [
            'az' => 'İntellektual Oyunlar Klubu',
            'en' => 'Intellectual Games Club',
            'ru' => 'Клуб Интеллектуальных Игр',
            'tr' => 'Entelektüel Oyunlar Kulübü',
        ],
        'description' => [
            'az' => '"Nə? Harada? Nə zaman?", "Xəmsə" və digər intellektual yarışların təşkili vasitəsilə tələbələrin dünyagörüşünün artırılması.',
            'en' => 'Increasing the outlook of students through the organization of "What? Where? When?", "Khamsa" and other intellectual competitions.',
            'ru' => 'Расширение кругозора студентов через организацию "Что? Где? Когда?", "Хамса" и других интеллектуальных соревнований.',
            'tr' => '"Ne? Nerede? Ne Zaman?", "Hamsa" ve diğer entelektüel yarışmaların düzenlenmesi yoluyla öğrencilerin vizyonunun geliştirilmesi.',
        ],
        'meta_title' => [
            'az' => 'İntellektual Oyunlar Klubu - Yarışlar',
            'en' => 'Intellectual Games Club - Competitions',
            'ru' => 'Клуб Интеллектуальных Игр - Соревнования',
            'tr' => 'Entelektüel Oyunlar Kulübü - Yarışmalar',
        ],
        'meta_description' => [
            'az' => 'Tələbələr üçün intellektual yarışlar və debat tədbirləri.',
            'en' => 'Intellectual competitions and debate events for students.',
            'ru' => 'Интеллектуальные соревнования и дебаты для студентов.',
            'tr' => 'Öğrenciler için entelektüel yarışmalar ve münazara etkinlikleri.',
        ],
        'meta_keywords' => [
            'az' => 'intellektual oyunlar, debat, xəmsə, bilik yarışı',
            'en' => 'intellectual games, debate, khamsa, knowledge contest',
            'ru' => 'интеллектуальные игры, дебаты, хамса',
            'tr' => 'entelektüel oyunlar, münazara, hamsa, bilgi yarışması',
        ],
    ],
    [
        'image' => 'student_club3.jpg',
        'slug' => 'incesenet-ve-yaradiciliq-klubu',
        'title' => [
            'az' => 'İncəsənət və Yaradıcılıq Klubu',
            'en' => 'Arts and Creativity Club',
            'ru' => 'Клуб Искусства и Творчества',
            'tr' => 'Sanat ve Yaratıcılık Kulübü',
        ],
        'description' => [
            'az' => 'Musiqi, rəqs, rəsm və teatrla maraqlanan tələbələrin istedadlarını üzə çıxarmaq üçün yaradılmış yaradıcılıq platforması.',
            'en' => 'A creative platform created to reveal the talents of students interested in music, dance, painting and theater.',
            'ru' => 'Творческая платформа, созданная для выявления талантов студентов, интересующихся музыкой, танцами, живописью и театром.',
            'tr' => 'Müzik, dans, resim ve tiyatroyla ilgilenen öğrencilerin yeteneklerini ortaya çıkarmak için oluşturulmuş bir yaratıcılık platformu.',
        ],
        'meta_title' => [
            'az' => 'İncəsənət Klubu - Musiqi və Rəqs',
            'en' => 'Arts Club - Music and Dance',
            'ru' => 'Клуб Искусства - Музыка и Танцы',
            'tr' => 'Sanat Kulübü - Müzik ve Dans',
        ],
        'meta_description' => [
            'az' => 'Tələbə yaradıcılıq gecələri və incəsənət dərnəkləri.',
            'en' => 'Student creative nights and art circles.',
            'ru' => 'Студенческие творческие вечера и арт-кружки.',
            'tr' => 'Öğrenci yaratıcılık geceleri ve sanat atölyeleri.',
        ],
        'meta_keywords' => [
            'az' => 'incəsənət, musiqi, rəqs, teatr, yaradıcılıq',
            'en' => 'arts, music, dance, theater, creativity',
            'ru' => 'искусство, музыка, танцы, театр',
            'tr' => 'sanat, müzik, dans, tiyatro, yaratıcılık',
        ],
    ],
];
        seedTranslationAttributes(StudentClub::class, $student_clubs);

        $this->command->info(count($student_clubs) . ' Student Clubs created.');
    }
}
