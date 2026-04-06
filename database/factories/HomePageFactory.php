<?php

namespace Database\Factories;

use App\Models\HomePage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<HomePage>
 */
class HomePageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('homePage', 'homePage', 'homePage.jpg');
        moveFactoryImageToUploads('homePage', 'homePage', 'homePage2.jpg');
        moveFactoryImageToUploads('homePage', 'homePage', 'homePage3.jpg');

        $azTranslations = [
            'title' => 'İngilis dilində təhsil imkanı',
            'title2' => 'Xəbərlər və Elanlar',
            'title3' => 'Türkiyə-Azərbaycan Universiteti',
            'title4' => 'Tədris Proqramları',
            'title5' => 'Akademik Təqvim',
            'description' => 'Beynəlxalq standartlara uyğun təhsil sistemi ilə gələcəyinizi bizimlə qurun. İngilis dilində tədris olunan proqramlarımızla qlobal karyera imkanları əldə edin.',
            'description2' => 'Universitetimizdə baş verən ən son yeniliklər, mühüm elanlar və tədbirlər haqqında məlumatları buradan izləyə bilərsiniz.',
            'description3' => 'Türkiyə və Azərbaycanın təhsil sahəsindəki güclü tərəfdaşlığı ilə yaradılan müasir təhsil ocağı.',
            'description4' => 'Bakalavr və magistr pillələri üzrə müasir əmək bazarının tələblərinə cavab verən ixtisas seçimləri.',
            'description5' => 'Dərs qrafiki, imtahan sessiyaları və tətil günləri haqqında ətraflı məlumatı ehtiva edən rəsmi akademik cədvəl.',
            'meta_title' => 'Türkiyə-Azərbaycan Universiteti (TAU) - Rəsmi Sayt',
            'meta_description' => 'Türkiyə-Azərbaycan Universiteti (TAU) ingilis dilində keyfiyyətli təhsil, müasir proqramlar və beynəlxalq karyera imkanları təklif edir.',
            'meta_keywords' => 'tau, universitet, təhsil, ingilis dilində təhsil, azərbaycan türkiyə təhsil, bakalavr proqramları',
        ];

        $enTranslations = [
            'title' => 'Study Opportunities in English',
            'title2' => 'News & Announcements',
            'title3' => 'Turkish-Azerbaijani University',
            'title4' => 'Academic Programs',
            'title5' => 'Academic Calendar',
            'description' => 'Shape your future with an education system that meets international standards. Gain global career opportunities through our English-taught programs.',
            'description2' => 'Stay updated with the latest news, important announcements, and upcoming events at our university.',
            'description3' => 'A modern higher education institution established through the strong partnership of Turkey and Azerbaijan.',
            'description4' => 'Undergraduate and postgraduate degree options that meet the demands of the modern job market.',
            'description5' => 'The official academic schedule including course dates, exam sessions, and holiday periods.',
            'meta_title' => 'Turkish-Azerbaijani University (TAU) - Official Website',
            'meta_description' => 'Turkish-Azerbaijani University (TAU) offers quality education in English, modern curricula, and international career opportunities.',
            'meta_keywords' => 'tau, university, education, study in english, turkey azerbaijan education, bachelor programs',
        ];

        $ruTranslations = [
            'title' => 'Возможность обучения на английском языке',
            'title2' => 'Новости и Объявления',
            'title3' => 'Турецко-Азербайджанский Университет',
            'title4' => 'Образовательные программы',
            'title5' => 'Академический календарь',
            'description' => 'Постройте свое будущее с системой образования, соответствующей международным стандартам. Получите глобальные карьерные возможности благодаря нашим англоязычным программам.',
            'description2' => 'Следите за последними событиями, важными объявлениями и мероприятиями нашего университета здесь.',
            'description3' => 'Современное учебное заведение, созданное на основе крепкого партнерства Турции и Азербайджана в сфере образования.',
            'description4' => 'Выбор специальностей бакалавриата и магистратуры, отвечающих требованиям современного рынка труда.',
            'description5' => 'Официальное расписание, содержащее информацию о графике занятий, экзаменационных сессиях и каникулах.',
            'meta_title' => 'Турецко-Азербайджанский Университет (TAU) - Официальный сайт',
            'meta_description' => 'Турецко-Азербайджанский университет (TAU) предлагает качественное образование на английском языке и международные возможности.',
            'meta_keywords' => 'tau, университет, образование, обучение на английском, образование азербайджан турция, бакалавриат',
        ];

        $trTranslations = [
            'title' => 'İngilizce Eğitim İmkanı',
            'title2' => 'Haberler ve Duyurular',
            'title3' => 'Türk-Azerbaycan Üniversitesi',
            'title4' => 'Akademik Programlar',
            'title5' => 'Akademik Takvim',
            'description' => 'Uluslararası standartlara uygun eğitim sistemiyle geleceğinizi bizimle inşa edin. İngilizce eğitim veren programlarımızla küresel kariyer fırsatları yakalayın.',
            'description2' => 'Üniversitemizdeki en son gelişmeler, önemli duyurular ve etkinlikler hakkında bilgileri buradan takip edebilirsiniz.',
            'description3' => 'Türkiye ve Azerbaycan\'ın eğitim alanındaki güçlü ortaklığı ile kurulan modern eğitim yuvası.',
            'description4' => 'Modern iş dünyasının gereksinimlerine yanıt veren lisans ve lisansüstü program seçenekleri.',
            'description5' => 'Ders programları, sınav dönemleri ve tatil günlerini içeren resmi akademik takvim.',
            'meta_title' => 'Türk-Azerbaycan Üniversitesi (TAU) - Resmi Web Sitesi',
            'meta_description' => 'Türk-Azerbaycan Üniversitesi (TAU), İngilizce kaliteli eğitim, modern programlar ve uluslararası kariyer imkanları sunmaktadır.',
            'meta_keywords' => 'tau, üniversite, eğitim, ingilizce eğitim, azerbaycan türkiye eğitim, lisans programları',
        ];

        return [
            'image' => 'homePage.jpg',
            'image2' => 'homePage2.jpg',
            'image3' => 'homePage3.jpg',
            'student' => 50,
            'course' => 35,
            'language' => 100,
            'startup' => 56,
            'teacher' => 150,
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
