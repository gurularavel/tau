<?php

namespace Database\Factories;

use App\Models\StudentLifeClub;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentLifeClub>
 */
class StudentLifeClubFactory extends Factory
{
    public function definition(): array
    {
        moveFactoryImageToUploads('studentLifeClub', 'studentLifeClub', 'studentLifeClub.jpg');
        $azTranslations = [
            'title' => 'Tələbə həyatı klubu',
            'description' => 'Universitetimizdə tələbə həyatı klubları tələbələrin sosial, mədəni və idman fəaliyyətlərini əhatə edir. Hər bir tələbə burada özünə uyğun fəaliyyət tapа bilər.',
            'meta_title' => 'Tələbə həyatı klubu - TAU',
            'meta_keywords' => 'tələbə həyatı, klub, sosial fəaliyyət, TAU',
            'meta_description' => 'TAU tələbə həyatı klubları haqqında məlumat.',
        ];

        $ruTranslations = [
            'title' => 'Клуб студенческой жизни',
            'description' => 'Клуб студенческой жизни охватывает социальную, культурную и спортивную деятельность студентов университета. Каждый студент может найти подходящую для себя деятельность.',
            'meta_title' => 'Клуб студенческой жизни - TAU',
            'meta_keywords' => 'студенческая жизнь, клуб, социальная деятельность, TAU',
            'meta_description' => 'Информация о клубе студенческой жизни TAU.',
        ];

        $enTranslations = [
            'title' => 'Student Life Club',
            'description' => 'The Student Life Club encompasses social, cultural, and sports activities for university students. Every student can find an activity that suits them.',
            'meta_title' => 'Student Life Club - TAU',
            'meta_keywords' => 'student life, club, social activities, TAU',
            'meta_description' => 'Information about the TAU Student Life Club.',
        ];

        $trTranslations = [
            'title' => 'Öğrenci Yaşam Kulübü',
            'description' => 'Öğrenci Yaşam Kulübü, üniversite öğrencilerinin sosyal, kültürel ve spor etkinliklerini kapsamaktadır. Her öğrenci kendine uygun bir etkinlik bulabilir.',
            'meta_title' => 'Öğrenci Yaşam Kulübü - TAU',
            'meta_keywords' => 'öğrenci yaşamı, kulüp, sosyal etkinlikler, TAU',
            'meta_description' => 'TAU Öğrenci Yaşam Kulübü hakkında bilgiler.',
        ];

        return [
            'image' => 'studentLifeClub.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
