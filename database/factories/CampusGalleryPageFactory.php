<?php

namespace Database\Factories;

use App\Models\CampusGalleryPage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<CampusGalleryPage>
 */
class CampusGalleryPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('campusGalleryPage', 'campusGalleryPage', 'campusGalleryPage.jpg');
        moveFactoryImageToUploads('campusGalleryPage', 'campusGalleryPage', 'campusGalleryPage2.jpg');
        moveFactoryImageToUploads('campusGalleryPage', 'campusGalleryPage', 'campusGalleryPage3.jpg');
        moveFactoryImageToUploads('campusGalleryPage', 'campusGalleryPage', 'campusGalleryPage4.jpg');
        moveFactoryImageToUploads('campusGalleryPage', 'campusGalleryPage', 'campusGalleryPage5.jpg');

$azTranslations = [
            'title' => 'Məktəblilərlə görüş',
            'title2' => 'Kampus Qalereyası',
            'description' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Diqqət Mərkəzi: Kampusda Gözəllik və Müxtəliflik</b></span></p><p> <br> <span style="font-size: 18px;">Avropa dilləri eyni ailənin üzvləridir. Onların ayrı-ayrı mövcudluğu bir mifdir. Elm, musiqi, idman və s. üçün bütün Avropa eyni lüğətdən istifadə edir.</span></p> ',
            'description2' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Akademik Həyatın Rəngləri</b></span></p><p> <br> <span style="font-size: 18px;">Universitetimiz tələbələrə təkcə təhsil deyil, həm də zəngin sosial mühit vədl edir.</span></p> ',
            'description3' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Yaradıcı Məkanlar</b></span></p><p> <br> <span style="font-size: 18px;">Kampus daxilindəki yaradıcılıq guşələri tələbələrin potensialını üzə çıxarmaq üçün nəzərdə tutulub.</span></p> ',
            'meta_title' => 'Kampus Qalereyası - TAU',
            'meta_keywords' => 'kampus, qalereya, tələbə həyatı, məktəblilərlə görüş',
            'meta_description' => 'TAU kampusundan ən maraqlı görüntülər və məktəblilərlə görüşlərdən fotolar.',
        ];

        $ruTranslations = [
            'title' => 'Встреча со школьниками',
            'title2' => 'Галерея Кампуса',
            'description' => '<p><span style="font-family: Inter; font-size: 24px;"><b>В центре внимания: Красота и разнообразие кампуса</b></span></p><p> <br> <span style="font-size: 18px;">Европейские языки являются членами одной семьи. Их отдельное существование — миф. Для науки, музыки, спорта и т. д. вся Европа использует один и тот же словарный запас.</span></p> ',
            'description2' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Краски академической жизни</b></span></p><p> <br> <span style="font-size: 18px;">Наш университет предлагает студентам не только образование, но и богатую социальную среду.</span></p> ',
            'description3' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Творческие пространства</b></span></p><p> <br> <span style="font-size: 18px;">Творческие уголки в кампусе созданы для раскрытия потенциала студентов.</span></p> ',
            'meta_title' => 'Галерея Кампуса - TAU',
            'meta_keywords' => 'кампус, галерея, студенческая жизнь, встреча со школьниками',
            'meta_description' => 'Самые интересные кадры из кампуса TAU и фотографии со встреч со школьниками.',
        ];

        $enTranslations = [
            'title' => 'Meeting with Schoolchildren',
            'title2' => 'Campus Gallery',
            'description' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Focal Points: Beauty and Diversity on Campus</b></span></p><p> <br> <span style="font-size: 18px;">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary.</span></p> ',
            'description2' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Colors of Academic Life</b></span></p><p> <br> <span style="font-size: 18px;">Our university promises students not only education but also a rich social environment.</span></p> ',
            'description3' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Creative Spaces</b></span></p><p> <br> <span style="font-size: 18px;">Creative corners within the campus are designed to bring out the potential of students.</span></p> ',
            'meta_title' => 'Campus Gallery - TAU',
            'meta_keywords' => 'campus, gallery, student life, meeting with schoolchildren',
            'meta_description' => 'The most interesting views from the TAU campus and photos from meetings with schoolchildren.',
        ];

        $trTranslations = [
            'title' => 'Öğrencilerle Buluşma',
            'title2' => 'Kampüs Galerisi',
            'description' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Odak Noktası: Kampüste Güzellik ve Çeşitlilik</b></span></p><p> <br> <span style="font-size: 18px;">Avrupa dilleri aynı ailenin üyeleridir. Onların ayrı varlıkları bir mittir. Bilim, müzik, spor vb. için tüm Avrupa aynı kelime dağarcığını kullanır.</span></p> ',
            'description2' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Akademik Hayatın Renkleri</b></span></p><p> <br> <span style="font-size: 18px;">Üniversitemiz öğrencilere sadece eğitim değil, aynı zamanda zengin bir sosyal ortam vaat ediyor.</span></p> ',
            'description3' => '<p><span style="font-family: Inter; font-size: 24px;"><b>Yaratıcı Alanlar</b></span></p><p> <br> <span style="font-size: 18px;">Kampüs içerisindeki yaratıcı köşeler, öğrencilerin potansiyellerini ortaya çıkarmak için tasarlanmıştır.</span></p> ',
            'meta_title' => 'Kampüs Galerisi - TAU',
            'meta_keywords' => 'kampüs, galeri, öğrenci hayatı, okul ziyaretleri',
            'meta_description' => 'TAU kampüsünden en ilgi çekici görüntüler ve öğrenci buluşmalarından fotoğraflar.',
        ];

        return [
            'image' => 'campusGalleryPage.jpg',
            'image2' => 'campusGalleryPage2.jpg',
            'image3' => 'campusGalleryPage3.jpg',
            'image4' => 'campusGalleryPage4.jpg',
            'image5' => 'campusGalleryPage5.jpg',
            'video_url' => 'https://www.youtube.com/watch?v=rjOx7Brht8s',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
