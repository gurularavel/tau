<?php

namespace Database\Factories;

use App\Models\ProjectPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<ProjectPage>
 */
class ProjectPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('projectPage', 'projectPage', 'projectPage.jpg');
        $azTranslations = [
            'title' => 'Layihələr',
            'description' => 'Kibertəhlükəsizlik sahəsindəki geniş spektrli innovativ həllərimiz və xidmətlərimizlə tanış olun. Rəqəmsal aktivlərin qorunması və təhlükəsizlik infrastrukturunun qurulması istiqamətində həyata keçirdiyimiz uğurlu layihələri kəşf edin.',
            'meta_title' => 'Layihələr - TAU',
            'meta_keywords' => 'Layihə, kibertəhlükəsizlik, xidmətlər, həllər, təhlükəsizlik, rəqəmsal qorunma',
            'meta_description' => 'Kibertəhlükəsizlik üzrə innovativ həllər, rəqəmsal təhlükəsizlik layihələri və xidmətlərimizlə tanış olun.',
        ];

        $ruTranslations = [
            'title' => 'Проекты',
            'description' => 'Ознакомьтесь с нашим широким спектром инновационных решений и услуг в области кибербезопасности. Узнайте, как наши передовые подходы обеспечивают надежную защиту цифровых активов и инфраструктуры.',
            'meta_title' => 'Проекты - TAU',
            'meta_keywords' => 'Проект, кибербезопасность, услуги, решения, безопасность, защита данных',
            'meta_description' => 'Ознакомьтесь с нашими инновационными решениями и проектами в сфере кибербезопасности.',
        ];

        $enTranslations = [
            'title' => 'Projects',
            'description' => 'Explore our diverse range of cybersecurity solutions and services. Discover how our innovative approach safeguards digital assets and strengthens security infrastructures through high-impact projects.',
            'meta_title' => 'Projects - TAU',
            'meta_keywords' => 'Project, cybersecurity, services, solutions, security, digital assets',
            'meta_description' => 'Discover our innovative cybersecurity solutions, digital protection projects, and professional services.',
        ];

        $trTranslations = [
            'title' => 'Projeler',
            'description' => 'Siber güvenlik alanındaki geniş kapsamlı inovatif çözümlerimizi ve hizmetlerimizi inceleyin. Yenilikçi yaklaşımımızın dijital varlıkları nasıl koruduğunu ve güvenlik altyapılarını nasıl güçlendirdiğini keşfedin.',
            'meta_title' => 'Projeler - TAU',
            'meta_keywords' => 'Proje, siber güvenlik, hizmetler, çözümler, güvenlik, dijital varlık koruma',
            'meta_description' => 'Siber güvenlik alanındaki yenilikçi çözümlerimiz, projelerimiz ve profesyonel hizmetlerimiz hakkında bilgi alın.',
        ];
        return [
            'image' => 'projectPage.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
