<?php

namespace Database\Seeders;

use App\Models\CareerOpportunityCategory;
use App\ModelsCareerOpportunityCategory;
use App\ModelsCareerOpportunityPage;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class CareerOpportunityCategorySeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Event Categories';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('career_opportunity_categories');

        $careerOpportunityCategories = [
            [
                'slug' => 'turkiye',
                'title' => [
                    'az' => 'Türkiyə',
                    'en' => 'Turkey',
                    'ru' => 'Турция',
                    'tr' => 'Türkiye',
                ],
                'meta_title' => [
                    'az' => 'Türkiyə',
                    'en' => 'Turkey',
                    'ru' => 'Турция',
                    'tr' => 'Türkiye',
                ],
                'meta_description' => [
                    'az' => 'Türkiyə',
                    'en' => 'Turkey',
                    'ru' => 'Турция',
                    'tr' => 'Türkiye',
                ],
                'meta_keywords' => [
                    'az' => 'Türkiyə',
                    'en' => 'Turkey',
                    'ru' => 'Турция',
                    'tr' => 'Türkiye',
                ],
            ],
            [
                'slug' => 'macaristan',
                'title' => [
                    'az' => 'Macarıstan',
                    'en' => 'Hungary',
                    'ru' => 'Венгрия',
                    'tr' => 'Macaristan',
                ],
                'meta_title' => [
                    'az' => 'Macarıstan',
                    'en' => 'Hungary',
                    'ru' => 'Венгрия',
                    'tr' => 'Macaristan',
                ],
                'meta_description' => [
                    'az' => 'Macarıstan',
                    'en' => 'Hungary',
                    'ru' => 'Венгрия',
                    'tr' => 'Macaristan',
                ],
                'meta_keywords' => [
                    'az' => 'Macarıstan',
                    'en' => 'Hungary',
                    'ru' => 'Венгрия',
                    'tr' => 'Macaristan',
                ],
            ],
            [
                'slug' => 'azerbaycan',
                'title' => [
                    'az' => 'Azərbaycan',
                    'en' => 'Azerbaijan',
                    'ru' => 'Азербайджан',
                    'tr' => 'Azerbaycan',
                ],
                'meta_title' => [
                    'az' => 'Azərbaycan',
                    'en' => 'Azerbaijan',
                    'ru' => 'Азербайджан',
                    'tr' => 'Azerbaycan',
                ],
                'meta_description' => [
                    'az' => 'Azərbaycan',
                    'en' => 'Azerbaijan',
                    'ru' => 'Азербайджан',
                    'tr' => 'Azerbaycan',
                ],
                'meta_keywords' => [
                    'az' => 'Azərbaycan',
                    'en' => 'Azerbaijan',
                    'ru' => 'Азербайджан',
                    'tr' => 'Azerbaycan',
                ],
            ],
        ];

        seedTranslationAttributes(CareerOpportunityCategory::class, $careerOpportunityCategories);

        $this->command->info(count($careerOpportunityCategories) . ' Career opportunity categories created.');
    }
}
