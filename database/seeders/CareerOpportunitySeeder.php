<?php

namespace Database\Seeders;

use App\Models\CareerOpportunity;
use App\Models\CareerOpportunityCategory;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class CareerOpportunitySeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'career_opportunities';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('career_opportunities');

        for ($i = 1; $i <= 3; $i++) {
            moveFactoryImageToUploads('career_opportunities', 'career_opportunities', 'career_opportunity' . $i . '.jpg');
        }

        $career_opportunities = [
            [
                'image' => 'career_opportunity1.jpg',
                'career_opportunity_category_id' => 1,
                'slug' => 'karyera-imkani',
                'title' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU)',
                    'en' => 'Belarusian Trade and Economics University of Consumer Cooperatives (BTEU)',
                    'ru' => 'Белорусский торгово-экономический университет потребительской кооперации (БТЭУ)',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU)',
                ],
                'description' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU) mətni',
                    'en' => 'Text for Belarusian Trade and Economics University of Consumer Cooperatives (BTEU)',
                    'ru' => 'Текст Белорусского торгово-экономического университета потребительской кооперации (БТЭУ)',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU) metni',
                ],
                'meta_title' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU)',
                    'en' => 'Belarusian Trade and Economics University of Consumer Cooperatives (BTEU)',
                    'ru' => 'Белорусский торгово-экономический университет потребительской кооперации (БТЭУ)',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU)',
                ],
                'meta_description' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU)',
                    'en' => 'Belarusian Trade and Economics University of Consumer Cooperatives (BTEU)',
                    'ru' => 'Белорусский торгово-экономический университет потребительской кооперации (БТЭУ)',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU)',
                ],
                'meta_keywords' => [
                    'az' => 'BTEU, Belarus, İqtisadiyyat Universiteti, İstehlak Kooperasiyası',
                    'en' => 'BTEU, Belarus, Economics University, Consumer Cooperatives',
                    'ru' => 'БТЭУ, Беларусь, экономический университет, потребительская кооперация',
                    'tr' => 'BTEU, Belarus, Ekonomi Üniversitesi, Tüketici Kooperatifleri',
                ],
            ],
            [
                'image' => 'career_opportunity2.jpg',
                'career_opportunity_category_id' => 2,
                'slug' => 'karyera-imkani-2',
                'title' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU) 2',
                    'en' => 'Belarusian Trade and Economics University of Consumer Cooperatives (BTEU) 2',
                    'ru' => 'Белорусский торгово-экономический университет потребительской кооперации (БТЭУ) 2',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU) 2',
                ],
                'description' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU) 2 mətni',
                    'en' => 'Text for Belarusian Trade and Economics University of Consumer Cooperatives (BTEU) 2',
                    'ru' => 'Текст Белорусского торгово-экономического университета потребительской кооперации (БТЭУ) 2',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU) 2 metni',
                ],
                'meta_title' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU) 2',
                    'en' => 'Belarusian Trade and Economics University of Consumer Cooperatives (BTEU) 2',
                    'ru' => 'Белорусский торгово-экономический университет потребительской кооперации (БТЭУ) 2',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU) 2',
                ],
                'meta_description' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU) 2',
                    'en' => 'Belarusian Trade and Economics University of Consumer Cooperatives (BTEU) 2',
                    'ru' => 'Белорусский торгово-экономический университет потребительской кооперации (БТЭУ) 2',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU) 2',
                ],
                'meta_keywords' => [
                    'az' => 'BTEU 2, Belarus universiteti, karyera imkanları',
                    'en' => 'BTEU 2, Belarus university, career opportunities',
                    'ru' => 'БТЭУ 2, университет Беларуси, возможности карьеры',
                    'tr' => 'BTEU 2, Belarus üniversitesi, kariyer imkanları',
                ],
            ],
            [
                'image' => 'career_opportunity3.jpg',
                'career_opportunity_category_id' => 3,
                'slug' => 'karyera-imkani-3',
                'title' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU) 3',
                    'en' => 'Belarusian Trade and Economics University of Consumer Cooperatives (BTEU) 3',
                    'ru' => 'Белорусский торгово-экономический университет потребительской кооперации (БТЭУ) 3',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU) 3',
                ],
                'description' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU) 3 mətni',
                    'en' => 'Text for Belarusian Trade and Economics University of Consumer Cooperatives (BTEU) 3',
                    'ru' => 'Текст Белорусского торгово-экономического университета потребительской кооперации (БТЭУ) 3',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU) 3 metni',
                ],
                'meta_title' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU) 3',
                    'en' => 'Belarusian Trade and Economics University of Consumer Cooperatives (BTEU) 3',
                    'ru' => 'Белорусский торгово-экономический университет потребительской кооперации (БТЭУ) 3',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU) 3',
                ],
                'meta_description' => [
                    'az' => 'Belarus İstehlak Kooperasiyası Ticarət və İqtisadiyyat Universiteti (BTEU) 3',
                    'en' => 'Belarusian Trade and Economics University of Consumer Cooperatives (BTEU) 3',
                    'ru' => 'Белорусский торгово-экономический университет потребительской кооперации (БТЭУ) 3',
                    'tr' => 'Belarus Tüketici Kooperatifleri Ticaret ve Ekonomi Üniversitesi (BTEU) 3',
                ],
                'meta_keywords' => [
                    'az' => 'BTEU 3, ticarət universiteti, Belarus təhsili',
                    'en' => 'BTEU 3, trade university, Belarus education',
                    'ru' => 'БТЭУ 3, торговый университет, образование в Беларуси',
                    'tr' => 'BTEU 3, ticaret üniversitesi, Belarus eğitimi',
                ],
            ],
        ];
        seedTranslationAttributes(CareerOpportunity::class, $career_opportunities);

        $this->command->info(count($career_opportunities) . ' Career opportunities created.');
    }
}
