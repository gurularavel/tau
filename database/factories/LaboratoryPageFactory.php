<?php

namespace Database\Factories;

use App\Models\LaboratoryPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<LaboratoryPage>
 */
class LaboratoryPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('laboratoryPage', 'laboratoryPage', 'laboratoryPage.jpg');
        $azTranslations = [
            'title' => 'Laboratoriyalar',
            'description' => 'Universitetimiz ən müasir texnoloji avadanlıqlarla təchiz olunmuş laboratoriyaları ilə tələbələrə və tədqiqatçılara geniş imkanlar təqdim edir. Burada nəzəri biliklər real təcrübələr və elmi tədqiqatlarla birləşir. Mühəndislik, texnologiya və innovasiya sahələrində gələcəyin həllərini hazırlamaq üçün laboratoriyalarımız 24/7 fəaliyyət göstərir.',
            'meta_title' => 'Laboratoriyalar - TAU',
            'meta_keywords' => 'laboratoriya, elmi tədqiqat, texnologiya, innovasiya, tau laboratoriyaları',
            'meta_description' => 'TAU-nun müasir avadanlıqlarla təchiz olunmuş laboratoriyaları və elmi tədqiqat imkanları haqqında məlumat.',
        ];

        $ruTranslations = [
            'title' => 'Лаборатории',
            'description' => 'Наш университет предоставляет широкие возможности студентам и исследователям благодаря своим лабораториям, оснащенным новейшим технологическим оборудованием. Здесь теоретические знания сочетаются с реальными экспериментами и научными исследованиями. Наши лаборатории работают 24/7 для разработки решений будущего в области инженерии, технологий и инноваций.',
            'meta_title' => 'Лаборатории - TAU',
            'meta_keywords' => 'лаборатория, научные исследования, технологии, инновации, лаборатории tau',
            'meta_description' => 'Информация о лабораториях TAU, оснащенных современным оборудованием, и возможностях для научных исследований.',
        ];

        $enTranslations = [
            'title' => 'Laboratories',
            'description' => 'Our university offers extensive opportunities to students and researchers with its laboratories equipped with the latest technological equipment. Here, theoretical knowledge merges with real-world experiments and scientific research. Our labs operate 24/7 to develop the solutions of the future in engineering, technology, and innovation.',
            'meta_title' => 'Laboratories - TAU',
            'meta_keywords' => 'laboratory, scientific research, technology, innovation, tau labs',
            'meta_description' => 'Information about TAU’s state-of-the-art laboratories and scientific research opportunities.',
        ];

        $trTranslations = [
            'title' => 'Laboratuvarlar',
            'description' => 'Üniversitemiz, en son teknolojik cihazlarla donatılmış laboratuvarları ile öğrencilere ve araştırmacılara geniş imkanlar sunmaktadır. Burada teorik bilgiler, gerçek deneyler ve bilimsel araştırmalarla birleşir. Mühendislik, teknoloji ve inovasyon alanlarında geleceğin çözümlerini üretmek için laboratuvarlarımız 7/24 hizmet vermektedir.',
            'meta_title' => 'Laboratuvarlar - TAU',
            'meta_keywords' => 'laboratuvar, bilimsel araştırma, teknoloji, inovasyon, tau laboratuvarları',
            'meta_description' => 'TAU bünyesindeki modern laboratuvar tesisleri ve bilimsel araştırma imkanları hakkında detaylı bilgiler.',
        ];

        return [
            'image' => 'laboratoryPage.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
