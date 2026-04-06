<?php

namespace Database\Factories;

use App\Models\ContactPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<ContactPage>
 */
class ContactPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // moveFactoryImageToUploads('contactPage', 'contactPage', 'contactPage.webp');

        $azTranslations = [
            'title' => 'ƏLAQƏ',
            'title2' => 'Sualınız var? Gəlin danışaq',
            'title3' => 'Aşağıda göstərilən kanallar vasitəsilə bizimlə rahat şəkildə əlaqə saxlaya bilərsiniz.',
            'description' => 'Universitetimiz haqqında ətraflı məlumat almaq, əməkdaşlıq təklifləri və ya qəbul prosesi ilə bağlı suallar üçün bizimlə əlaqə saxlaya bilərsiniz.',
            'address' => 'Xocalı prospekti, 30, Baku, Azerbaijan AZ1025',
            'opening_hour' => '09:00-18:00',
            'footer' => 'Türkiyə-Azərbaycan Universiteti. Bütün hüquqlar qorunur.',
            'meta_title' => 'Əlaqə | Türkiyə-Azərbaycan Universiteti',
            'meta_description' => 'Türkiyə-Azərbaycan Universiteti',
            'meta_keywords' => 'turkiye, azerbaycan, universitet',
        ];

        $enTranslations = [
            'title' => 'CONTACT',
            'title2' => 'Have a question? Let’s talk',
            'title3' => 'You can easily contact us through the channels listed below.',
            'description' => 'You can contact us for detailed information about our university, collaboration proposals, or questions regarding the admission process.',
            'address' => 'Xocali Avenue, 30, Baku, Azerbaijan AZ1025',
            'opening_hour' => '09:00-18:00',
            'footer' => 'Turkey-Azerbaijan University. All rights reserved.',
            'meta_title' => 'Contact | Turkey-Azerbaijan University',
            'meta_description' => 'Turkey-Azerbaijan University',
            'meta_keywords' => 'turkey, azerbaijan, university',
        ];

        $ruTranslations = [
            'title' => 'КОНТАКТЫ',
            'title2' => 'Есть вопрос? Давайте поговорим',
            'title3' => 'Вы можете легко связаться с нами через перечисленные ниже каналы.',
            'description' => 'Вы можете связаться с нами для получения подробной информации о нашем университете, предложений о сотрудничестве или вопросов, связанных с процессом поступления.',
            'address' => 'проспект Ходжалы, 30, Баку, Азербайджан AZ1025',
            'opening_hour' => '09:00-18:00',
            'footer' => 'Турецко-Азербайджанский университет. Все права защищены.',
            'meta_title' => 'Контакты | Турецко-Азербайджанский университет',
            'meta_description' => 'Турецко-Азербайджанский университет',
            'meta_keywords' => 'турция, азербайджан, университет',
        ];

        return [
            // 'image' => 'contactPage.webp',
            'phone' => '+165-5577-8749',
            'email' => 'info@tau.edu.az',
            'location_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2833.504657736225!2d49.872539599999996!3d40.3802668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d0049227c8f%3A0xf8a7441455579599!2sT%C3%BCrkiy%C9%99-Az%C9%99rbaycan%20Universiteti!5e1!3m2!1str!2saz!4v1774163326626!5m2!1str!2saz',
            'youtube' => 'https://www.youtube.com/',
            'x_social_media' => 'https://www.x.com/',
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'linkedin' => 'https://www.linkedin.com/',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
        ];
    }
}
