<?php

namespace Database\Factories;

use App\Models\GraduatePage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<GraduatePage>
 */
class GraduatePageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('graduatePage', 'graduatePage', 'graduatePage.jpg');
$azTranslations = [
            'title' => 'Məzunlar',
            'description' => 'Bizim məzunlarımız dünyanın dörd bir yanında uğurlu karyera quran, cəmiyyətə dəyər qatan fərdlərdir. Universitetimizdə qazanılan bilik və bacarıqlar onların peşəkar həyatında möhkəm təməl rolunu oynayır. Məzunlar şəbəkəmizə qoşularaq əlaqələrinizi gücləndirə və yeni imkanlardan yararlana bilərsiniz.',
            'meta_title' => 'Məzunlar - TAU',
            'meta_keywords' => 'məzunlar, tau məzunları, karyera, uğur hekayələri',
            'meta_description' => 'TAU məzunlarının uğurları, karyera yolları və məzun şəbəkəsi haqqında məlumat.',
        ];

        $ruTranslations = [
            'title' => 'Выпускники',
            'description' => 'Наши выпускники — это профессионалы, строящие успешную карьеру по всему миру и приносящие пользу обществу. Знания и навыки, полученные в нашем университете, служат прочным фундаментом в их профессиональной деятельности. Присоединяйтесь к нашей сети выпускников, чтобы укреплять связи и открывать новые возможности.',
            'meta_title' => 'Выпускники - TAU',
            'meta_keywords' => 'выпускники, выпускники TAU, карьера, истории успеха',
            'meta_description' => 'Информация об успехах выпускников TAU, их карьерном пути и сообществе выпускников.',
        ];

        $enTranslations = [
            'title' => 'Alumni',
            'description' => 'Our alumni are individuals who build successful careers around the world and contribute value to society. The knowledge and skills acquired at our university play a fundamental role in their professional lives. Join our alumni network to strengthen your connections and benefit from new opportunities.',
            'meta_title' => 'Alumni - TAU',
            'meta_keywords' => 'alumni, TAU graduates, career, success stories',
            'meta_description' => 'Information about the achievements of TAU alumni, their career paths, and the alumni network.',
        ];

        $trTranslations = [
            'title' => 'Mezunlar',
            'description' => 'Mezunlarımız, dünyanın dört bir yanında başarılı kariyerler inşa eden ve topluma değer katan bireylerdir. Üniversitemizde kazanılan bilgi ve beceriler, onların profesyonel hayatlarında sağlam bir temel oluşturur. Mezun ağımıza katılarak bağlarınızı güçlendirebilir ve yeni fırsatlardan yararlanabilirsiniz.',
            'meta_title' => 'Mezunlar - TAU',
            'meta_keywords' => 'mezunlar, tau mezunları, kariyer, başarı hikayeleri',
            'meta_description' => 'TAU mezunlarının başarıları, kariyer yolları ve mezunlar ağı hakkında bilgiler.',
        ];

        return [
            'image' => 'graduatePage.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
