<?php

namespace Database\Factories;

use App\Models\StudentClubPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<StudentClubPage>
 */
class StudentClubPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('studentClubPage', 'studentClubPage', 'studentClubPage.jpg');
        $azTranslations = [
            'title' => 'Tələbə klubları',
            'description' => 'Universitetimizdə tələbələrin asudə vaxtlarını səmərəli keçirmələri, maraq dünyalarını genişləndirmələri və liderlik bacarıqlarını inkişaf etdirmələri üçün müxtəlif tələbə klubları fəaliyyət göstərir. İstər texnologiya, istər incəsənət, istərsə de də sosial məsuliyyət sahəsində olsun, hər bir tələbə özünə uyğun bir icma tapa bilər. Bizim klublar tələbə həyatını daha rəngarəng və yadda qalan edir.',
            'meta_title' => 'Tələbə klubları - TAU',
            'meta_keywords' => 'tələbə klubları, tələbə həyatı, universitet icmaları, sosial fəaliyyət',
            'meta_description' => 'TAU tələbə klubları, sosial layihələr və tələbə özünüidarəetmə fəaliyyətləri haqqında məlumat.',
        ];

        $ruTranslations = [
            'title' => 'Студенческие клубы',
            'description' => 'В нашем университете действуют различные студенческие клубы, которые помогают студентам эффективно проводить досуг, расширять кругозор и развивать лидерские качества. Будь то технологии, искусство или социальная ответственность, каждый студент сможет найти сообщество по душе. Наши клубы делают студенческую жизнь более яркой и насыщенной.',
            'meta_title' => 'Студенческие клубы - TAU',
            'meta_keywords' => 'студенческие клубы, студенческая жизнь, сообщества, социальная деятельность',
            'meta_description' => 'Информация о студенческих клубах TAU, социальных проектах и внеучебной деятельности студентов.',
        ];

        $enTranslations = [
            'title' => 'Student Clubs',
            'description' => 'Our university hosts various student clubs that allow students to spend their leisure time effectively, expand their interests, and develop leadership skills. Whether in technology, arts, or social responsibility, every student can find a community that suits them. Our clubs make campus life more vibrant and memorable.',
            'meta_title' => 'Student Clubs - TAU',
            'meta_keywords' => 'student clubs, campus life, university communities, social activities',
            'meta_description' => 'Information about TAU student clubs, social projects, and student organizations.',
        ];

        $trTranslations = [
            'title' => 'Öğrenci Kulüpleri',
            'description' => 'Üniversitemizde öğrencilerin boş zamanlarını verimli değerlendirmeleri, ilgi alanlarını genişletmeleri ve liderlik becerilerini geliştirmeleri için çeşitli öğrenci kulüpleri faaliyet göstermektedir. Teknoloji, sanat veya sosyal sorumluluk alanlarında her öğrenci kendine uygun bir topluluk bulabilir. Kulüplerimiz, kampüs hayatını çok daha renkli ve unutulmaz kılmaktadır.',
            'meta_title' => 'Öğrenci Kulüpleri - TAU',
            'meta_keywords' => 'öğrenci kulüpleri, kampüs yaşamı, topluluklar, sosyal etkinlikler',
            'meta_description' => 'TAU öğrenci kulüpleri, sosyal projeler ve öğrenci toplulukları hakkında detaylı bilgiler.',
        ];

        return [
            'image' => 'studentClubPage.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
