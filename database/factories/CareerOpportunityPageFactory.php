<?php

namespace Database\Factories;

use App\Models\CareerOpportunityPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<CareerOpportunityPage>
 */
class CareerOpportunityPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('careerOpportunityPage', 'careerOpportunityPage', 'careerOpportunityPage.jpg');
        $azTranslations = [
            'title' => 'Karyera imkanları',
            'description' => '',
            'meta_title' => 'Karyera imkanları',
            'meta_keywords' => 'Tədbir, kibertəhlükəsizlik, xidmətlər, həllər, təhlükəsizlik',
            'meta_description' => 'Kibertəhlükəsizlik üzrə innovativ həllər və xidmətlərimizlə tanış olun.',
        ];

        $ruTranslations = [
            'title' => 'Karyera imkanları',
            'description' => '',
            'meta_title' => 'Karyera imkanları',
            'meta_keywords' => 'Проект, кибербезопасность, услуги, решения, безопасность',
            'meta_description' => 'Ознакомьтесь с нашими инновационными решениями и услугами в сфере кибербезопасности.',
        ];

        $enTranslations = [
            'title' => 'Career Opportunities',
            'description' => 'Explore our diverse range of cyber security solutions and services. Discover how our innovative approach safeguards digital assets.',
            'meta_title' => 'Career Opportunities',
            'meta_keywords' => 'Career Opportunity, cybersecurity, services, solutions, security',
            'meta_description' => 'Discover our innovative cyber security solutions and services.',
        ];
        $trTranslations = [
            'title' => 'Career Opportunities',
            'description' => 'Explore our diverse range of cyber security solutions and services. Discover how our innovative approach safeguards digital assets.',
            'meta_title' => 'Career Opportunities',
            'meta_keywords' => 'Career Opportunity, cybersecurity, services, solutions, security',
            'meta_description' => 'Discover our innovative cyber security solutions and services.',
        ];

        return [
            'image' => 'careerOpportunityPage.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
