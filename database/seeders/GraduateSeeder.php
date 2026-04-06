<?php

namespace Database\Seeders;

use App\Models\Graduate;
use App\Models\GraduateCategory;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class GraduateSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Graduates';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('graduates');

        for ($i = 1; $i <= 6; $i++) {
            moveFactoryImageToUploads('graduates', 'graduates', 'graduate' . $i . '.jpg');
        }

        $graduates = [
            [
                'image' => 'graduate1.jpg',
                'slug' => 'elvin-hesenov',
                'profession' => [
                    'az' => 'Kimya mühəndisliyi',
                    'en' => 'Chemical Engineering',
                    'ru' => 'Химическая инженерия',
                    'tr' => 'Kimya Mühendisliği',
                ],
                'title' => [
                    'az' => 'Elvin Həsənov',
                    'en' => 'Elvin Hasanov',
                    'ru' => 'Эльвин Гасанов',
                    'tr' => 'Elvin Hasanov',
                ],
                'description' => [
                    'az' => 'Neft-kimya sənayesində tətbiqi araşdırmaları ilə tanınan məzunumuz hazırda beynəlxalq layihələrdə çalışır.',
                    'en' => 'Our graduate, known for applied research in the petrochemical industry, is currently working on international projects.',
                    'ru' => 'Наш выпускник, известный своими прикладными исследованиями в нефтехимической промышленности, в настоящее время работает над международными проектами.',
                    'tr' => 'Petrokimya endüstrisindeki uygulamalı araştırmalarıyla tanınan mezunumuz şu anda uluslararası projelerde çalışmaktadır.',
                ],
                'meta_title' => [
                    'az' => 'Elvin Həsənov - Kimya Mühəndisi',
                    'en' => 'Elvin Hasanov - Chemical Engineer',
                    'ru' => 'Эльвин Гасанов - Инженер-химик',
                    'tr' => 'Elvin Hasanov - Kimya Mühendisi',
                ],
                'meta_description' => [
                    'az' => 'Kimya mühəndisliyi üzrə uğurlu məzunumuz Elvin Həsənov.',
                    'en' => 'Our successful chemical engineering graduate Elvin Hasanov.',
                    'ru' => 'Наш успешный выпускник химико-технологического факультета Эльвин Гасанов.',
                    'tr' => 'Kimya mühendisliği bölümü başarılı mezunumuz Elvin Hasanov.',
                ],
                'meta_keywords' => [
                    'az' => 'kimya, mühəndis, neft, məzun',
                    'en' => 'chemistry, engineer, oil, graduate',
                    'ru' => 'химия, инженер, нефть, выпускник',
                    'tr' => 'kimya, mühendis, petrol, mezun',
                ],
            ],
            [
                'image' => 'graduate2.jpg',
                'slug' => 'leyla-eliyeva',
                'profession' => [
                    'az' => 'İnformasiya texnologiyaları',
                    'en' => 'Information Technology',
                    'ru' => 'Информационные технологии',
                    'tr' => 'Bilgi Teknolojileri',
                ],
                'title' => [
                    'az' => 'Leyla Əliyeva',
                    'en' => 'Leyla Aliyeva',
                    'ru' => 'Лейла Алиева',
                    'tr' => 'Leyla Aliyeva',
                ],
                'description' => [
                    'az' => 'Süni intellekt və verilənlərin təhlili sahəsində ixtisaslaşan Leyla, Silikon Vadisində təcrübə keçmişdir.',
                    'en' => 'Specializing in AI and data analytics, Leyla has interned in Silicon Valley.',
                    'ru' => 'Специализируясь на искусственном интеллекте и аналитике данных, Лейла прошла стажировку в Кремниевой долине.',
                    'tr' => 'Yapay zeka ve veri analitiği konusunda uzmanlaşan Leyla, Silikon Vadisi\'nde staj yapmıştır.',
                ],
                'meta_title' => [
                    'az' => 'Leyla Əliyeva - IT Mütəxəssisi',
                    'en' => 'Leyla Aliyeva - IT Specialist',
                    'ru' => 'Лейла Алиева - ИТ-специалист',
                    'tr' => 'Leyla Aliyeva - BT Uzmanı',
                ],
                'meta_description' => [
                    'az' => 'IT sahəsində innovativ həllər təklif edən məzunumuz.',
                    'en' => 'Our graduate offering innovative solutions in the field of IT.',
                    'ru' => 'Наш выпускник, предлагающий инновационные решения в области ИТ.',
                    'tr' => 'BT alanında yenilikçi çözümler sunan mezunumuz.',
                ],
                'meta_keywords' => [
                    'az' => 'leyla əliyeva, IT, süni intellekt',
                    'en' => 'leyla aliyeva, IT, AI',
                    'ru' => 'лейла алиева, ИТ, ИИ',
                    'tr' => 'leyla aliyeva, BT, yapay zeka',
                ],
            ],
            [
                'image' => 'graduate3.jpg',
                'slug' => 'resad-memmedov',
                'profession' => [
                    'az' => 'İqtisadiyyat',
                    'en' => 'Economics',
                    'ru' => 'Экономика',
                    'tr' => 'Ekonomi',
                ],
                'title' => [
                    'az' => 'Rəşad Məmmədov',
                    'en' => 'Rashad Mammadov',
                    'ru' => 'Рашад Мамедов',
                    'tr' => 'Reşat Mammadov',
                ],
                'description' => [
                    'az' => 'Makroiqtisadi göstəricilər və bazar analizi üzrə ekspert olan Rəşad hazırda dövlət qurumunda məsləhətçidir.',
                    'en' => 'An expert in macroeconomic indicators and market analysis, Rashad is currently a consultant at a government agency.',
                    'ru' => 'Эксперт по макроэкономическим показателям и анализу рынка, Рашад в настоящее время является консультантом в государственном агентстве.',
                    'tr' => 'Makroekonomik göstergeler ve pazar analizi konusunda uzman olan Reşat, şu anda bir devlet kurumunda danışmanlık yapmaktadır.',
                ],
                'meta_title' => [
                    'az' => 'Rəşad Məmmədov - İqtisadçı',
                    'en' => 'Rashad Mammadov - Economist',
                    'ru' => 'Рашад Мамедов - Экономист',
                    'tr' => 'Reşat Mammadov - Ekonomist',
                ],
                'meta_description' => [
                    'az' => 'İqtisadiyyat sahəsində geniş təcrübəyə malik məzunumuz.',
                    'en' => 'Our graduate with extensive experience in the field of economics.',
                    'ru' => 'Наш выпускник с большим опытом работы в области экономики.',
                    'tr' => 'Ekonomi alanında geniş deneyime sahip mezunumuz.',
                ],
                'meta_keywords' => [
                    'az' => 'iqtisadçı, rəşad məmmədov, bazar analizi',
                    'en' => 'economist, rashad mammadov, market analysis',
                    'ru' => 'экономист, рашад мамедов, анализ рынка',
                    'tr' => 'ekonomist, reşat mammadov, pazar analizi',
                ],
            ],
            [
                'image' => 'graduate4.jpg',
                'slug' => 'gunay-ismayilova',
                'profession' => [
                    'az' => 'Hüquqşünaslıq',
                    'en' => 'Law',
                    'ru' => 'Юриспруденция',
                    'tr' => 'Hukuk',
                ],
                'title' => [
                    'az' => 'Günay İsmayılova',
                    'en' => 'Gunay Ismayilova',
                    'ru' => 'Гюнай Исмаилова',
                    'tr' => 'Günay İsmayılova',
                ],
                'description' => [
                    'az' => 'Beynəlxalq hüquq normaları üzrə ixtisaslaşan Günay, insan hüquqlarının müdafiəsi sahəsində fəaliyyət göstərir.',
                    'en' => 'Specializing in international law, Gunay works in the field of human rights protection.',
                    'ru' => 'Специализируясь на международном праве, Гюнай работает в области защиты прав человека.',
                    'tr' => 'Uluslararası hukuk konusunda uzmanlaşan Günay, insan haklarının korunması alanında faaliyet göstermektedir.',
                ],
                'meta_title' => [
                    'az' => 'Günay İsmayılova - Hüquqşünas',
                    'en' => 'Gunay Ismayilova - Lawyer',
                    'ru' => 'Гюнай Исмаилова - Юрист',
                    'tr' => 'Günay İsmayılova - Hukukçu',
                ],
                'meta_description' => [
                    'az' => 'Hüquq və ədalət prinsiplərini qoruyan məzunumuz Günay İsmayılova.',
                    'en' => 'Our graduate Gunay Ismayilova, who defends the principles of law and justice.',
                    'ru' => 'Наша выпускница Гюнай Исмаилова, защищающая принципы права и справедливости.',
                    'tr' => 'Hukuk ve adalet ilkelerini savunan mezunumuz Günay İsmayılova.',
                ],
                'meta_keywords' => [
                    'az' => 'vəkil, hüquqşünas, beynəlxalq hüquq',
                    'en' => 'lawyer, international law, graduate',
                    'ru' => 'юрист, международное право, выпускник',
                    'tr' => 'avukat, hukukçu, uluslararası hukuk',
                ],
            ],
            [
                'image' => 'graduate5.jpg',
                'slug' => 'anar-qasimov',
                'profession' => [
                    'az' => 'Menecment',
                    'en' => 'Management',
                    'ru' => 'Менеджмент',
                    'tr' => 'İşletme Yönetimi',
                ],
                'title' => [
                    'az' => 'Anar Qasımov',
                    'en' => 'Anar Gasimov',
                    'ru' => 'Анар Касимов',
                    'tr' => 'Anar Gasimov',
                ],
                'description' => [
                    'az' => 'Strateji idarəetmə üzrə peşəkar olan Anar, bir çox startapın uğur qazanmasında aparıcı rol oynamışdır.',
                    'en' => 'A professional in strategic management, Anar has played a leading role in the success of many startups.',
                    'ru' => 'Профессионал в области стратегического менеджмента, Анар сыграл ведущую роль в успехе многих стартапов.',
                    'tr' => 'Stratejik yönetim konusunda profesyonel olan Anar, birçok girişimin başarılı olmasında öncü rol oynamıştır.',
                ],
                'meta_title' => [
                    'az' => 'Anar Qasımov - Menecer',
                    'en' => 'Anar Gasimov - Manager',
                    'ru' => 'Анар Касимов - Менеджер',
                    'tr' => 'Anar Gasimov - Yönetici',
                ],
                'meta_description' => [
                    'az' => 'İdarəetmə və liderlik sahəsində seçilən məzunumuz.',
                    'en' => 'Our graduate who stands out in management and leadership.',
                    'ru' => 'Наш выпускник, который выделяется в области менеджмента и лидерства.',
                    'tr' => 'Yönetim ve liderlik alanında öne çıkan mezunumuz.',
                ],
                'meta_keywords' => [
                    'az' => 'liderlik, menecment, startap',
                    'en' => 'leadership, management, startup',
                    'ru' => 'лидерство, менеджмент, стартап',
                    'tr' => 'liderlik, yönetim, girişim',
                ],
            ],
            [
                'image' => 'graduate6.jpg',
                'slug' => 'fidan-kerimova',
                'profession' => [
                    'az' => 'Beynəlxalq münasibətlər',
                    'en' => 'International Relations',
                    'ru' => 'Международные отношения',
                    'tr' => 'Uluslararası İlişkiler',
                ],
                'title' => [
                    'az' => 'Fidan Kərimova',
                    'en' => 'Fidan Karimova',
                    'ru' => 'Фидан Керимова',
                    'tr' => 'Fidan Kerimova',
                ],
                'description' => [
                    'az' => 'Diplomatik protokol və beynəlxalq əməkdaşlıq üzrə mütəxəssis kimi fəaliyyət göstərir.',
                    'en' => 'Works as a specialist in diplomatic protocol and international cooperation.',
                    'ru' => 'Работает специалистом по дипломатическому протоколу и международному сотрудничеству.',
                    'tr' => 'Diplomatik protokol ve uluslararası işbirliği uzmanı olarak çalışmaktadır.',
                ],
                'meta_title' => [
                    'az' => 'Fidan Kərimova - Diplomat',
                    'en' => 'Fidan Karimova - Diplomat',
                    'ru' => 'Фидан Керимова - Дипломат',
                    'tr' => 'Fidan Kerimova - Diplomat',
                ],
                'meta_description' => [
                    'az' => 'Beynəlxalq münasibətlər üzrə təmsilçimiz Fidan Kərimova.',
                    'en' => 'Our representative for international relations, Fidan Karimova.',
                    'ru' => 'Наш представитель по международным отношениям Фидан Керимова.',
                    'tr' => 'Uluslararası ilişkiler temsilcimiz Fidan Kerimova.',
                ],
                'meta_keywords' => [
                    'az' => 'diplomatiya, fidan kərimova, əməkdaşlıq',
                    'en' => 'diplomacy, fidan karimova, cooperation',
                    'ru' => 'дипломатия, фидан керимова, сотрудничество',
                    'tr' => 'diplomasi, fidan kerimova, işbirliği',
                ],
            ],
        ];

        seedTranslationAttributes(Graduate::class, $graduates);

        $this->command->info(count($graduates) . ' Graduates created.');
    }
}
