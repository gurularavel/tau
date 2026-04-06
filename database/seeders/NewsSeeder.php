<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsImage;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\User;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'News';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('news');
        $this->remakeFolder('news_images');

        for ($i = 1; $i <= 6; $i++) {
            moveFactoryImageToUploads('news', 'news', 'news' . $i . '.jpg');
        }

        $user = User::first();

        $news = [
            [
                'image' => 'news1.jpg',
                'tags' => 'beynelxalq, akkreditasiya',
                'user_id' => $user->id,
                'slug' => 'tau-beynelxalq-akkreditasiya-aldi',
                'title' => [
                    'az' => 'TAU Beynəlxalq Akkreditasiya Sertifikatına Layiq Görüldü',
                    'en' => 'TAU Awarded International Accreditation Certificate',
                    'ru' => 'TAU получил международный сертификат аккредитации',
                    'tr' => 'TAU Uluslararası Akreditasyon Sertifikasına Layık Görüldü',
                ],
                'content' => [
                    'az' => 'Universitetimiz Avropa Akkreditasiya Agentliyi tərəfindən təhsil keyfiyyətinə görə tam akkreditasiya olunub.',
                    'en' => 'Our university has been fully accredited by the European Accreditation Agency for its educational quality.',
                    'ru' => 'Наш университет прошел полную аккредитацию Европейского агентства по аккредитации за качество образования.',
                    'tr' => 'Üniversitemiz, eğitim kalitesi nedeniyle Avrupa Akreditasyon Ajansı tarafından tam akredite edilmiştir.',
                ],
                'description' => [
                    'az' => 'TAU-nun beynəlxalq standartlara uyğun təhsil proqramları rəsmən təsdiqləndi.',
                    'en' => 'TAU\'s educational programs in line with international standards have been officially approved.',
                    'ru' => 'Образовательные программы TAU, соответствующие международным стандартам, получили официальное одобрение.',
                    'tr' => 'TAU\'nun uluslararası standartlara uygun eğitim programları resmi olarak onaylandı.',
                ],
                'meta_title' => ['az' => 'Beynəlxalq Akkreditasiya - TAU', 'en' => 'International Accreditation - TAU', 'ru' => 'Международная аккредитация - TAU', 'tr' => 'Uluslararası Akreditasyon - TAU'],
                'meta_description' => ['az' => 'TAU beynəlxalq akkreditasiya xəbəri.', 'en' => 'TAU international accreditation news.', 'ru' => 'Новости международной аккредитации TAU.', 'tr' => 'TAU uluslararası akreditasyon haberi.'],
                'meta_keywords' => ['az' => 'tau, akkreditasiya, beynəlxalq təhsil', 'en' => 'tau, accreditation, international education', 'ru' => 'tau, аккредитация, образование', 'tr' => 'tau, akreditasyon, uluslararası eğitim'],
            ],
            [
                'image' => 'news2.jpg',
                'tags' => 'texnologiya, innovasiya',
                'user_id' => $user->id,
                'slug' => 'yeni-texnologiya-merkezi-acildi',
                'title' => [
                    'az' => 'Universitetdə Yeni Texnologiya Mərkəzi İstifadəyə Verildi',
                    'en' => 'New Technology Center Launched at the University',
                    'ru' => 'В университете открылся новый технологический центр',
                    'tr' => 'Üniversitede Yeni Teknoloji Merkezi Hizmete Açıldı',
                ],
                'content' => [
                    'az' => 'Tələbələrin startap layihələrini dəstəkləmək üçün ən son avadanlıqlarla təchiz olunmuş mərkəz açılıb.',
                    'en' => 'A center equipped with the latest technology has been opened to support students\' startup projects.',
                    'ru' => 'Открыт центр, оснащенный новейшим оборудованием для поддержки стартап-проектов студентов.',
                    'tr' => 'Öğrencilerin startup projelerini desteklemek amacıyla en yeni ekipmanlarla donatılmış bir merkez açıldı.',
                ],
                'description' => [
                    'az' => 'İnnovativ ideyaların reallaşması üçün yeni platforma.',
                    'en' => 'A new platform for the realization of innovative ideas.',
                    'ru' => 'Новая платформа для реализации инновационных идей.',
                    'tr' => 'İnovatif fikirlerin hayata geçirilmesi için yeni bir platform.',
                ],
                'meta_title' => ['az' => 'Texnologiya Mərkəzi - TAU', 'en' => 'Technology Center - TAU', 'ru' => 'Технологический центр - TAU', 'tr' => 'Teknoloji Merkezi - TAU'],
                'meta_description' => ['az' => 'Yeni texnologiya mərkəzinin açılışı.', 'en' => 'Opening of the new technology center.', 'ru' => 'Открытие нового технологического центра.', 'tr' => 'Yeni teknoloji merkezinin açılış haberi.'],
                'meta_keywords' => ['az' => 'startap, innovasiya, texnologiya', 'en' => 'startup, innovation, technology', 'ru' => 'стартап, инновации', 'tr' => 'startup, inovasyon, teknoloji'],
            ],
            [
                'image' => 'news3.jpg',
                'tags' => 'idman, qelebe',
                'user_id' => $user->id,
                'slug' => 'universitet-idman-yarislari-yekunlasdi',
                'title' => [
                    'az' => 'Universitetlərarası İdman Yarışlarında Böyük Qələbə',
                    'en' => 'Big Win in Interuniversity Sports Competitions',
                    'ru' => 'Большая победа в межвузовских спортивных соревнованиях',
                    'tr' => 'Üniversiteler Arası Spor Yarışmalarında Büyük Galibiyet',
                ],
                'content' => [
                    'az' => 'Futbol komandamız şəhər çempionatında birinci yeri tutaraq qızıl medal qazandı.',
                    'en' => 'Our football team took first place in the city championship and won the gold medal.',
                    'ru' => 'Наша футбольная команда заняла первое место в городском чемпионате и завоевала золотую медаль.',
                    'tr' => 'Futbol takımımız şehir şampiyonasında birinci gelerek altın madalya kazandı.',
                ],
                'description' => [
                    'az' => 'TAU tələbələri idman sahəsində uğur qazanmağa davam edir.',
                    'en' => 'TAU students continue to succeed in the field of sports.',
                    'ru' => 'Студенты TAU продолжают добиваться успехов в спорте.',
                    'tr' => 'TAU öğrencileri spor alanında başarı elde etmeye devam ediyor.',
                ],
                'meta_title' => ['az' => 'İdman Uğurları - TAU', 'en' => 'Sports Achievements - TAU', 'ru' => 'Спортивные достижения - TAU', 'tr' => 'Spor Başarıları - TAU'],
                'meta_description' => ['az' => 'İdman yarışları və qələbələr.', 'en' => 'Sports competitions and victories.', 'ru' => 'Спортивные соревнования и победы.', 'tr' => 'Spor yarışmaları ve kazanılan galibiyetler.'],
                'meta_keywords' => ['az' => 'idman, futbol, qələbə, tau', 'en' => 'sports, football, victory', 'ru' => 'спорт, победа', 'tr' => 'spor, futbol, galibiyet, tau'],
            ],
            [
                'image' => 'news4.jpg',
                'tags' => 'karyera, sergi',
                'user_id' => $user->id,
                'slug' => 'karyera-sergisi-2026',
                'title' => [
                    'az' => 'Karyera Sərgisi: 50-dən Çox Şirkət İştirak Etdi',
                    'en' => 'Career Fair: More Than 50 Companies Participated',
                    'ru' => 'Ярмарка вакансий: приняли участие более 50 компаний',
                    'tr' => 'Kariyer Fuarı: 50\'den Fazla Şirket Katıldı',
                ],
                'content' => [
                    'az' => 'Tələbələrimiz ölkənin qabaqcıl şirkətləri ilə birbaşa ünsiyyət quraraq iş imkanları əldə etdilər.',
                    'en' => 'Our students gained job opportunities by communicating directly with the country\'s leading companies.',
                    'ru' => 'Наши студенты получили возможности трудоустройства, общаясь напрямую с ведущими компаниями страны.',
                    'tr' => 'Öğrencilerimiz, ülkenin önde gelen şirketleriyle doğrudan iletişim kurarak iş imkanları yakaladı.',
                ],
                'description' => [
                    'az' => 'Məzunlar və tələbələr üçün geniş iş imkanları.',
                    'en' => 'Wide job opportunities for graduates and students.',
                    'ru' => 'Широкие возможности трудоустройства для выпускников и студентов.',
                    'tr' => 'Mezunlar ve öğrenciler için geniş iş fırsatları.',
                ],
                'meta_title' => ['az' => 'Karyera Sərgisi - TAU', 'en' => 'Career Fair - TAU', 'ru' => 'Ярмарка вакансий - TAU', 'tr' => 'Kariyer Fuarı - TAU'],
                'meta_description' => ['az' => 'TAU karyera günü xəbərləri.', 'en' => 'TAU career day news.', 'ru' => 'Новости дня карьеры TAU.', 'tr' => 'TAU kariyer günü haberleri.'],
                'meta_keywords' => ['az' => 'iş, karyera, vakansiya, tələbə', 'en' => 'job, career, vacancy, student', 'ru' => 'работа, карьера', 'tr' => 'iş, kariyer, ilan, öğrenci'],
            ],
            [
                'image' => 'news5.jpg',
                'tags' => 'erasmus, beynelxalq',
                'user_id' => $user->id,
                'slug' => 'erasmus-proqrami-muracietler',
                'title' => [
                    'az' => 'Erasmus+ Mübadilə Proqramı Üçün Qeydiyyat Başladı',
                    'en' => 'Registration for Erasmus+ Exchange Program Started',
                    'ru' => 'Началась регистрация на программу обмена Erasmus+',
                    'tr' => 'Erasmus+ Değişim Programı Kayıtları Başladı',
                ],
                'content' => [
                    'az' => 'Avropanın aparıcı universitetlərində bir semestr təhsil almaq şansını qaçırmayın.',
                    'en' => 'Don\'t miss the chance to study for a semester at leading European universities.',
                    'ru' => 'Не упустите шанс проучиться семестр в ведущих европейских университетах.',
                    'tr' => 'Avrupa\'nın seçkin üniversitelerinde bir dönem eğitim alma şansını kaçırmayın.',
                ],
                'description' => [
                    'az' => 'Beynəlxalq mübadilə proqramları haqqında ətraflı məlumat.',
                    'en' => 'Detailed information about international exchange programs.',
                    'ru' => 'Подробная информация о международных программах обмена.',
                    'tr' => 'Uluslararası değişim programları hakkında detaylı bilgiler.',
                ],
                'meta_title' => ['az' => 'Erasmus+ Mübadilə - TAU', 'en' => 'Erasmus+ Exchange - TAU', 'ru' => 'Обмен Erasmus+ - TAU', 'tr' => 'Erasmus+ Değişim - TAU'],
                'meta_description' => ['az' => 'Erasmus qeydiyyat tarixləri.', 'en' => 'Erasmus registration dates.', 'ru' => 'Даты регистрации Erasmus.', 'tr' => 'Erasmus kayıt tarihleri ve başvuru süreci.'],
                'meta_keywords' => ['az' => 'erasmus, xaricdə təhsil, mübadilə', 'en' => 'erasmus, study abroad, exchange', 'ru' => 'erasmus, обучение за рубежом', 'tr' => 'erasmus, yurt dışında eğitim, değişim programı'],
            ],
            [
                'image' => 'news6.jpg',
                'tags' => 'mezun, tedbir',
                'user_id' => $user->id,
                'slug' => 'mezun-gunu-hazirliqlari',
                'title' => [
                    'az' => 'Məzun Günü Təntənəli Şəkildə Qeyd Olunacaq',
                    'en' => 'Graduation Day Will Be Celebrated Solemnly',
                    'ru' => 'День выпускника будет отмечен торжественно',
                    'tr' => 'Mezuniyet Günü Görkemli Bir Şekilde Kutlanacak',
                ],
                'content' => [
                    'az' => 'Bu ilki məzunlar üçün unudulmaz vida gecəsi və diplom təqdimetmə mərasimi planlaşdırılır.',
                    'en' => 'An unforgettable farewell party and diploma ceremony is planned for this year\'s graduates.',
                    'ru' => 'Для выпускников этого года планируется незабываемый прощальный вечер и церемония вручения дипломов.',
                    'tr' => 'Bu yılki mezunlar için unutulmaz bir veda gecesi ve diploma töreni planlanıyor.',
                ],
                'description' => [
                    'az' => '2026-cı il məzunları üçün xüsusi tədbir proqramı.',
                    'en' => 'Special event program for 2026 graduates.',
                    'ru' => 'Специальная программа мероприятий для выпускников 2026 года.',
                    'tr' => '2026 yılı mezunları için özel etkinlik programı.',
                ],
                'meta_title' => ['az' => 'Məzun Günü 2026 - TAU', 'en' => 'Graduation Day 2026 - TAU', 'ru' => 'День выпускника 2026 - TAU', 'tr' => 'Mezuniyet Günü 2026 - TAU'],
                'meta_description' => ['az' => 'Məzun günü tədbiri haqqında.', 'en' => 'About the graduation day event.', 'ru' => 'О мероприятии в день выпускника.', 'tr' => 'Mezuniyet günü etkinlik detayları.'],
                'meta_keywords' => ['az' => 'məzun, diplom, tədbir', 'en' => 'graduate, diploma, event', 'ru' => 'выпускник, диплом', 'tr' => 'mezun, diploma, etkinlik, tören'],
            ],
        ];
        seedTranslationAttributes(News::class, $news);

        $this->command->info(count($news) . ' news created.');
    }
}
