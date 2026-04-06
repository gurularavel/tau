<?php

namespace Database\Factories;

use App\Models\CareerPage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CareerPage>
 */
class CareerPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('careerPage', 'careerPage', 'careerPage.jpg');

        $azTranslations = [
            'title' => 'Gələcək buradan başlayır',
            'description' => 'Universitetimizdə akademik fəaliyyət və inzibati karyera imkanları ilə tanış olun. Biz gənc tədqiqatçıları və təcrübəli pedaqoqları elm fədailəri sırasına qoşulmağa dəvət edirik. Vakant yerlər üzrə müsabiqə şərtləri şəffaf şəkildə təqdim olunur.',
            'meta_title' => 'Akademik Karyera və İş İmkanları',
            'meta_keywords' => 'universitet iş elanları, müəllim vakansiyası, akademik karyera, təhsil sektoru iş, elmi tədqiqatçı',
            'meta_description' => 'Ali təhsil müəssisəmizdəki vakansiyalar və akademik yüksəliş imkanları haqqında ətraflı məlumat.',
        ];

        $trTranslations = [
            'title' => 'Gelecek buradan başlıyor',
            'description' => 'Üniversitemizdeki akademik ve idari kariyer fırsatlarını keşfedin. Genç araştırmacıları ve deneyimli eğitimcileri bilim dünyasına katkı sağlamaya davet ediyoruz. Münhal kadrolar için başvuru koşulları şeffaf bir şekilde sunulmaktadır.',
            'meta_title' => 'Akademik Kariyer ve İş Fırsatları',
            'meta_keywords' => 'üniversite iş ilanları, akademisyen alımı, eğitim sektörü kariyer, araştırma görevlisi, öğretim üyesi',
            'meta_description' => 'Üniversitemiz bünyesindeki açık pozisyonlar ve akademik gelişim olanakları hakkında detaylı bilgiler.',
        ];

        $enTranslations = [
            'title' => 'The future starts here',
            'description' => 'Explore academic and administrative career opportunities at our university. We invite young researchers and experienced educators to join our community of scholars. Competition terms for vacancies are presented transparently.',
            'meta_title' => 'Academic Career and Job Opportunities',
            'meta_keywords' => 'university job openings, teacher vacancies, academic career, education sector jobs, research fellow',
            'meta_description' => 'Detailed information about vacancies and academic advancement opportunities in our higher education institution.',
        ];

        $ruTranslations = [
            'title' => 'Будущее начинается здесь',
            'description' => 'Ознакомьтесь с академическими и административными карьерными возможностями в нашем университете. Мы приглашаем молодых исследователей и опытных педагогов присоединиться к нашему научному сообществу.',
            'meta_title' => 'Академическая карьера и возможности трудоустройства',
            'meta_keywords' => 'вакансии в университете, вакансии преподавателей, академическая карьера, работа в сфере образования',
            'meta_description' => 'Подробная информация о вакансиях и возможностях академического роста в нашем высшем учебном заведении.',
        ];

        return [
            'image' => 'careerPage.jpg',
            'az' => $azTranslations,
            'tr' => $trTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
        ];
    }
}
