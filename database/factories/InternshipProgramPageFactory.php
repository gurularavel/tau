<?php

namespace Database\Factories;

use App\Models\InternshipProgramPage;
use App\Models\InternshipProgramPageItem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends Factory<InternshipProgramPage>
 */
class InternshipProgramPageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        moveFactoryImageToUploads('internshipProgramPage', 'internshipProgramPage', 'internshipProgramPage.jpg');
        $azTranslations = [
            'title' => 'Təcrübə proqramları',
            'description' => 'Tələbələrimizin nəzəri biliklərini praktika ilə birləşdirməsi üçün yerli və beynəlxalq tərəfdaşlarımızla geniş təcrübə imkanları yaradırıq. Təcrübə proqramları tələbələrin peşəkar vərdişlərə yiyələnməsi və iş dünyasına ilk addımlarını atması üçün mühüm platformadır. Aparıcı şirkətlərdə real iş mühiti ilə tanış olaraq gələcək karyeranızı bizimlə qurun.',
            'meta_title' => 'Təcrübə proqramları - TAU',
            'meta_keywords' => 'təcrübə proqramları, təcrübə imkanları, karyera mərkəzi, tələbə təcrübəsi',
            'meta_description' => 'TAU tələbələri üçün yerli və xarici şirkətlərdə təcrübə keçmək imkanları və proqram detalları.',
        ];

        $ruTranslations = [
            'title' => 'Программы стажировок',
            'description' => 'Мы создаем широкие возможности для стажировок совместно с нашими местными и международными партнерами, чтобы наши студенты могли совместить теоретические знания с практикой. Программы стажировок являются важной платформой для приобретения профессиональных навыков и первых шагов в деловом мире. Постройте свою будущую карьеру вместе с нами, познакомившись с реальной рабочей средой в ведущих компаниях.',
            'meta_title' => 'Программы стажировок - TAU',
            'meta_keywords' => 'стажировка, программы стажировок, возможности стажировки, карьера студента',
            'meta_description' => 'Возможности прохождения практики в местных и зарубежных компаниях для студентов TAU.',
        ];

        $enTranslations = [
            'title' => 'Internship Programs',
            'description' => 'We provide extensive internship opportunities with our local and international partners to help our students bridge the gap between theoretical knowledge and practice. Internship programs are a vital platform for students to acquire professional skills and take their first steps into the professional world. Build your future career with us by experiencing real-world work environments at leading companies.',
            'meta_title' => 'Internship Programs - TAU',
            'meta_keywords' => 'internship programs, internship opportunities, career center, student internship',
            'meta_description' => 'Internship opportunities in local and international companies for TAU students.',
        ];

        $trTranslations = [
            'title' => 'Staj Programları',
            'description' => 'Öğrencilerimizin teorik bilgilerini pratikle birleştirmeleri için yerel ve uluslararası ortaklarımızla geniş staj imkanları sunuyoruz. Staj programları, öğrencilerin profesyonel beceriler kazanması ve iş dünyasına ilk adımlarını atması için kritik bir platformdur. Önde gelen şirketlerde gerçek iş ortamıyla tanışarak gelecekteki kariyerinizi bizimle inşa edin.',
            'meta_title' => 'Staj Programları - TAU',
            'meta_keywords' => 'staj programları, staj imkanları, kariyer merkezi, öğrenci stajı',
            'meta_description' => 'TAU öğrencileri için yerel ve yabancı şirketlerde staj yapma imkanları ve program detayları.',
        ];

        return [
            'image' => 'internshipProgramPage.jpg',
            'az' => $azTranslations,
            'en' => $enTranslations,
            'ru' => $ruTranslations,
            'tr' => $trTranslations,
        ];
    }
}
