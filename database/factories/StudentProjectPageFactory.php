<?php

namespace Database\Factories;

use App\Models\StudentProjectPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<StudentProjectPage>
 */
class StudentProjectPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('studentProjectPage', 'studentProjectPage', 'studentProjectPage.jpg');
        $azTranslations = [
            'title' => 'Tələbə layihələri',
            'description' => 'Universitetimiz tələbələrin innovativ ideyalarını real layihələrə çevirmələri üçün hər növ dəstəyi təmin edir. Startaplardan elmi tədqiqatlara, sosial məsuliyyət kampaniyalarından mühəndislik həllərinə qədər tələbələrimiz tərəfindən icra olunan ən maraqlı layihələrlə burada tanış ola bilərsiniz. Yaradıcılığınızı kəşf edin və gələcəyi bizimlə inşa edin.',
            'meta_title' => 'Tələbə layihələri - TAU',
            'meta_keywords' => 'tələbə layihələri, innovasiya, startap, tədqiqat, tələbə təşəbbüsləri',
            'meta_description' => 'TAU tələbələrinin hazırladığı innovativ layihələr, elmi tədqiqatlar və yaradıcı işlər haqqında ətraflı məlumat.',
        ];

        $ruTranslations = [
            'title' => 'Студенческие проекты',
            'description' => 'Наш университет оказывает всестороннюю поддержку студентам в превращении их инновационных идей в реальные проекты. Здесь вы можете ознакомиться с самыми интересными работами наших студентов — от стартапов и научных исследований до кампаний по социальной ответственности и инженерных решений. Раскройте свой творческий потенциал и стройте будущее вместе с нами.',
            'meta_title' => 'Студенческие проекты - TAU',
            'meta_keywords' => 'студенческие проекты, инновации, стартап, исследования, студенческие инициативы',
            'meta_description' => 'Подробная информация об инновационных проектах, научных исследованиях и творческих работах студентов TAU.',
        ];

        $enTranslations = [
            'title' => 'Student Projects',
            'description' => 'Our university provides all kinds of support for students to transform their innovative ideas into real-world projects. Here you can discover the most compelling projects carried out by our students, ranging from startups and scientific research to social responsibility campaigns and engineering solutions. Discover your creativity and build the future with us.',
            'meta_title' => 'Student Projects - TAU',
            'meta_keywords' => 'student projects, innovation, startup, research, student initiatives',
            'meta_description' => 'Detailed information about innovative projects, scientific research, and creative works developed by TAU students.',
        ];

        $trTranslations = [
            'title' => 'Öğrenci Projeleri',
            'description' => 'Üniversitemiz, öğrencilerin yenilikçi fikirlerini gerçek projelere dönüştürmeleri için her türlü desteği sağlamaktadır. Start-up\'lardan bilimsel araştırmalara, sosyal sorumluluk kampanyalarından mühendislik çözümlerine kadar öğrencilerimiz tarafından yürütülen en ilgi çekici projeleri burada bulabilirsiniz. Yaratıcılığınızı keşfedin ve geleceği bizimle inşa edin.',
            'meta_title' => 'Öğrenci Projeleri - TAU',
            'meta_keywords' => 'öğrenci projeleri, inovasyon, start-up, araştırma, öğrenci girişimleri',
            'meta_description' => 'TAU öğrencileri tarafından hazırlanan yenilikçi projeler, bilimsel araştırmalar ve yaratıcı çalışmalar hakkında detaylı bilgi.',
        ];
        return [
            'image' => 'studentProjectPage.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
