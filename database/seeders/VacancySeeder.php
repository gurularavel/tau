<?php

namespace Database\Seeders;

use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    private const TARGET = 'Vacancies';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $vacancies = [
            // 1. Aparıcı mütəxəssis
            [
                'slug' => 'aparici-mutexessis',
                'deadline' => '2026-04-15',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => [
                    'az' => 'Tam ştat',
                    'en' => 'Full-time',
                    'ru' => 'Полная занятость',
                    'tr' => 'Tam zamanlı',
                ],
                'title' => [
                    'az' => 'Aparıcı mütəxəssis (sosial-psixoloji xidmətlər üzrə)',
                    'en' => 'Leading specialist (social-psychological services)',
                    'ru' => 'Ведущий специалист (социально-психологическая служба)',
                    'tr' => 'Öncü Uzman (Sosyal-Psikolojik Hizmetler)',
                ],
                'description' => [
                    'az' => 'Psixologiya sahəsində təcrübəli mütəxəssis axtarılır.',
                    'en' => 'Experienced specialist in psychology required.',
                    'ru' => 'Требуется опытный специалист в области психологии.',
                    'tr' => 'Psikoloji alanında deneyimli uzman aranıyor.',
                ],
                'content' => ['az' => 'Geniş məlumat...', 'en' => 'Detailed info...', 'ru' => 'Подробная информация...', 'tr' => 'Detaylı bilgi...'],
            ],
            // 2. Riyaziyyat Müəllimi
            [
                'slug' => 'riyaziyyat-muellimi',
                'deadline' => '2026-05-01',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => [
                    'az' => 'Yarım ştat',
                    'en' => 'Part-time',
                    'ru' => 'Частичная занятость',
                    'tr' => 'Yarı zamanlı',
                ],
                'title' => [
                    'az' => 'Riyaziyyat müəllimi (Yuxarı siniflər)',
                    'en' => 'Math Teacher (Senior classes)',
                    'ru' => 'Учитель математики (Старшие классы)',
                    'tr' => 'Matematik Öğretmeni (Lise düzeyi)',
                ],
                'description' => [
                    'az' => 'Riyaziyyat üzrə pedaqoji təcrübəsi olan şəxslər.',
                    'en' => 'Persons with pedagogical experience in math.',
                    'ru' => 'Лица с педагогическим опытом по математике.',
                    'tr' => 'Matematik alanında pedagojik deneyimi olan adaylar.',
                ],
            ],
            // 3. İngilis dili müəllimi
            [
                'slug' => 'ingilis-dili-muellimi',
                'deadline' => '2026-04-20',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => [
                    'az' => 'Müqavilə əsaslı',
                    'en' => 'Contract-based',
                    'ru' => 'По контракту',
                    'tr' => 'Sözleşmeli',
                ],
                'title' => [
                    'az' => 'İngilis dili müəllimi (IELTS hazırlığı)',
                    'en' => 'English Teacher (IELTS preparation)',
                    'ru' => 'Учитель английского языка (подготовка к IELTS)',
                    'tr' => 'İngilizce Öğretmeni (IELTS hazırlık)',
                ],
                'description' => [
                    'az' => 'IELTS sertifikatı olan müəllimlər tələb olunur.',
                    'en' => 'Teachers with IELTS certificates are required.',
                    'ru' => 'Требуются учителя с сертификатом IELTS.',
                    'tr' => 'IELTS sertifikası olan öğretmenler aranıyor.',
                ],
            ],
            // 4. Laborant
            [
                'slug' => 'kimya-laboranti',
                'deadline' => '2026-04-10',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => ['az' => 'Tam ştat', 'en' => 'Full-time', 'ru' => 'Полная занятость', 'tr' => 'Tam zamanlı'],
                'title' => [
                    'az' => 'Kimya laboratoriyası üzrə laborant',
                    'en' => 'Lab Assistant for Chemistry',
                    'ru' => 'Лаборант химической лаборатории',
                    'tr' => 'Kimya Laboratuvarı Teknisyeni',
                ],
                'description' => [
                    'az' => 'Laboratoriya təcrübəsi mütləqdir.',
                    'en' => 'Laboratory experience is mandatory.',
                    'ru' => 'Опыт работы в лаборатории обязателен.',
                    'tr' => 'Laboratuvar deneyimi zorunludur.',
                ],
            ],
            // 5. IT dəstək mütəxəssisi
            [
                'slug' => 'it-destek-mtexessis',
                'deadline' => '2026-05-10',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => ['az' => 'Uzaqdan (Remote)', 'en' => 'Remote', 'ru' => 'Удаленно', 'tr' => 'Uzaktan (Remote)'],
                'title' => [
                    'az' => 'İT Dəstək mütəxəssisi',
                    'en' => 'IT Support Specialist',
                    'ru' => 'Специалист ИТ-поддержки',
                    'tr' => 'BT Destek Uzmanı',
                ],
                'description' => [
                    'az' => 'Şəbəkə və avadanlıqla işləmə bacarığı.',
                    'en' => 'Ability to work with network and equipment.',
                    'ru' => 'Умение работать с сетью и оборудованием.',
                    'tr' => 'Ağ ve donanım yönetimi becerisi.',
                ],
            ],
            // 6. Kitabxanaçı
            [
                'slug' => 'kitabxanaci-uzre-mutexessis',
                'deadline' => '2026-04-30',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => ['az' => 'Növbəli', 'en' => 'Shift-based', 'ru' => 'Сменный график', 'tr' => 'Vardiyalı'],
                'title' => [
                    'az' => 'Kitabxanaçı',
                    'en' => 'Librarian',
                    'ru' => 'Библиотекарь',
                    'tr' => 'Kütüphaneci',
                ],
                'description' => [
                    'az' => 'Elektron kitabxana sistemləri ilə iş.',
                    'en' => 'Work with electronic library systems.',
                    'ru' => 'Работа с электронными библиотечными системами.',
                    'tr' => 'Elektronik kütüphane sistemleri ile çalışma.',
                ],
            ],
            // 7. Dekan köməkçisi
            [
                'slug' => 'dekan-komekcisi',
                'deadline' => '2026-05-15',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => ['az' => 'Tam ştat', 'en' => 'Full-time', 'ru' => 'Полная занятость', 'tr' => 'Tam zamanlı'],
                'title' => [
                    'az' => 'Dekan köməkçisi',
                    'en' => 'Assistant Dean',
                    'ru' => 'Помощник декана',
                    'tr' => 'Dekan Yardımcısı',
                ],
                'description' => [
                    'az' => 'Tədris işlərinin planlaşdırılması.',
                    'en' => 'Planning of educational work.',
                    'ru' => 'Планирование учебной работы.',
                    'tr' => 'Eğitim işlerinin planlanması.',
                ],
            ],
            // 8. Marketoloq
            [
                'slug' => 'marketoloq',
                'deadline' => '2026-04-25',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => ['az' => 'Tam ştat', 'en' => 'Full-time', 'ru' => 'Полная занятость', 'tr' => 'Tam zamanlı'],
                'title' => [
                    'az' => 'Marketinq üzrə mütəxəssis',
                    'en' => 'Marketing Specialist',
                    'ru' => 'Специалист по маркетингу',
                    'tr' => 'Pazarlama Uzmanı',
                ],
                'description' => [
                    'az' => 'Rəqəmsal marketinq bilikləri.',
                    'en' => 'Digital marketing knowledge.',
                    'ru' => 'Знания цифрового маркетинга.',
                    'tr' => 'Dijital pazarlama bilgisi.',
                ],
            ],
            // 9. Ofis meneceri
            [
                'slug' => 'ofis-meneceri',
                'deadline' => '2026-06-01',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => ['az' => 'Tam ştat', 'en' => 'Full-time', 'ru' => 'Полная занятость', 'tr' => 'Tam zamanlı'],
                'title' => [
                    'az' => 'Ofis meneceri',
                    'en' => 'Office Manager',
                    'ru' => 'Офис-менеджер',
                    'tr' => 'Ofis Yöneticisi',
                ],
                'description' => [
                    'az' => 'Sənədləşmə və qəbul işlərinin təşkili.',
                    'en' => 'Organization of documentation and reception.',
                    'ru' => 'Организация документооборота и приема.',
                    'tr' => 'Dosyalama ve kabul işlerinin organizasyonu.',
                ],
            ],
            // 10. Hüquqşünas
            [
                'slug' => 'huquqsunas',
                'deadline' => '2026-05-20',
                'published_at' => now(),
                'is_active' => 1,
                'status_text' => [
                    'az' => 'Xidməti müqavilə',
                    'en' => 'Service contract',
                    'ru' => 'Сервисный контракт',
                    'tr' => 'Hizmet Sözleşmesi',
                ],
                'title' => [
                    'az' => 'Hüquqşünas',
                    'en' => 'Lawyer',
                    'ru' => 'Юрист',
                    'tr' => 'Hukuk Müşaviri / Avukat',
                ],
                'description' => [
                    'az' => 'Təhsil qanunvericiliyi üzrə mütəxəssis.',
                    'en' => 'Specialist in education legislation.',
                    'ru' => 'Специалист по образовательному законодательству.',
                    'tr' => 'Eğitim mevzuatı konusunda uzman.',
                ],
            ],
        ];
        seedTranslationAttributes(Vacancy::class, $vacancies);

        $this->command->info(count($vacancies) . ' vacancies created successfully.');
    }
}
