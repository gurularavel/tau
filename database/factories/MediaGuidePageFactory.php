<?php

namespace Database\Factories;

use App\Models\MediaGuidePage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<MediaGuidePage>
 */
class MediaGuidePageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('mediaGuidePage', 'mediaGuidePage', 'mediaGuidePage.svg');
        moveFactoryImageToUploads('mediaGuidePage', 'mediaGuidePage', 'mediaGuidePage2.svg');
        moveFactoryImageToUploads('mediaGuidePage', 'mediaGuidePage', 'mediaGuidePage3.jpg');

        $azTranslations = [
            'title' => 'Media bələdçisi',
            'description' => 'Türkiyə-Azərbaycan Universitetinin (TAU) media bələdçisi jurnalistlər, tədqiqatçılar və media nümayəndələri üçün rəsmi məlumat mənbəyidir. Burada universitetimizin loqotipləri, rəsmi fotoları, mətbuat relizləri və media prinsipləri ilə tanış ola bilərsiniz. Biz şəffaf kommunikasiya və media ilə sıx əməkdaşlığa böyük önəm veririk.',
            'meta_title' => 'Media bələdçisi - TAU',
            'meta_keywords' => 'media, mətbuat, jurnalistlər üçün, tau loqo, mətbuat relizi',
            'meta_description' => 'TAU haqqında rəsmi media materialları, loqotiplər və mətbuat nümayəndələri üçün təlimatlar.',
        ];

        $ruTranslations = [
            'title' => 'Медиа-гид',
            'description' => 'Медиа-гид Турецко-Азербайджанского университета (TAU) является официальным источником информации для журналистов, исследователей и представителей СМИ. Здесь вы можете найти логотипы университета, официальные фотографии, пресс-релизы и принципы работы со СМИ. Мы уделяем большое внимание прозрачности коммуникаций и тесному сотрудничеству с медиа.',
            'meta_title' => 'Медиа-гид - TAU',
            'meta_keywords' => 'медиа, пресса, для журналистов, логотип tau, пресс-релиз',
            'meta_description' => 'Официальные медиа-материалы TAU, логотипы и инструкции для представителей прессы.',
        ];

        $enTranslations = [
            'title' => 'Media Guide',
            'description' => 'The Turkish-Azerbaijani University (TAU) Media Guide is an official source of information for journalists, researchers, and media professionals. Here you can find our university logos, official photos, press releases, and media guidelines. We prioritize transparent communication and close cooperation with the media.',
            'meta_title' => 'Media Guide - TAU',
            'meta_keywords' => 'media, press, for journalists, tau logo, press releases',
            'meta_description' => 'Official media materials, logos, and guidelines for press representatives at TAU.',
        ];

        $trTranslations = [
            'title' => 'Medya Rehberi',
            'description' => 'Türk-Azerbaycan Üniversitesi (TAU) medya rehberi; gazeteciler, araştırmacılar ve medya temsilcileri için resmi bir bilgi kaynağıdır. Burada üniversitemizin logolarına, resmi fotoğraflarına, basın bültenlerine ve medya ilkelerimize ulaşabilirsiniz. Şeffaf iletişim ve medya ile yakın iş birliğine büyük önem veriyoruz.',
            'meta_title' => 'Medya Rehberi - TAU',
            'meta_keywords' => 'medya, basın, gazeteciler için, tau logo, basın bülteni',
            'meta_description' => 'TAU hakkında resmi medya materyalleri, logolar ve basın mensupları için kullanım kılavuzları.',
        ];

        return [
            'image' => 'mediaGuidePage.svg',
            'image2' => 'mediaGuidePage2.svg',
            'image3' => 'mediaGuidePage3.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
