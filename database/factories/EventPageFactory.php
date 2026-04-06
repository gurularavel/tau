<?php

namespace Database\Factories;

use App\Models\EventPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<EventPage>
 */
class EventPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('eventPage', 'eventPage', 'eventPage.jpg');
        $azTranslations = [
            'title' => 'Tədbirlər',
            'description' => '',
            'meta_title' => 'Tədbirlər',
            'meta_keywords' => 'Tədbir, kibertəhlükəsizlik, xidmətlər, həllər, təhlükəsizlik',
            'meta_description' => 'Kibertəhlükəsizlik üzrə innovativ həllər və xidmətlərimizlə tanış olun.',
        ];

        $ruTranslations = [
            'title' => 'Проекты',
            'description' => '',
            'meta_title' => 'Проекты',
            'meta_keywords' => 'Проект, кибербезопасность, услуги, решения, безопасность',
            'meta_description' => 'Ознакомьтесь с нашими инновационными решениями и услугами в сфере кибербезопасности.',
        ];

        $enTranslations = [
            'title' => 'Events',
            'description' => 'Explore our diverse range of cyber security solutions and services. Discover how our innovative approach safeguards digital assets.',
            'meta_title' => 'Events',
            'meta_keywords' => 'Event, cybersecurity, services, solutions, security',
            'meta_description' => 'Discover our innovative cyber security solutions and services.',
        ];
        $trTranslations = [
            'title' => 'Events',
            'description' => 'Explore our diverse range of cyber security solutions and services. Discover how our innovative approach safeguards digital assets.',
            'meta_title' => 'Events',
            'meta_keywords' => 'Event, cybersecurity, services, solutions, security',
            'meta_description' => 'Discover our innovative cyber security solutions and services.',
        ];

        return [
            'image' => 'eventPage.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
