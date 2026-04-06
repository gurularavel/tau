<?php

namespace Database\Seeders;

use App\Models\InternshipItem;
use App\Models\InternshipProgram;
use App\Models\InternshipProgramPageItem;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class InternshipProgramItemsSeeder extends Seeder
{
    use FileManagable;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'internship_program_page_id' => 1,
                'order' => 1,
                'title' => [
                    'az' => 'Onlayn müraciət',
                    'en' => 'Online Application',
                    'ru' => 'Онлайн заявка',
                    'tr' => 'Online Başvuru',
                ],
                'description' => [
                    'az' => 'CV və motivasiya məktubu ilə qeydiyyatdan keçin',
                    'en' => 'Apply with your CV and motivation letter',
                    'ru' => 'Подайте заявку с резюме и мотивационным письмом',
                    'tr' => 'CV ve motivasyon mektubu ile başvurun',
                ],
            ],
            [
                'internship_program_page_id' => 1,
                'order' => 2,
                'title' => [
                    'az' => 'İlkin Qiymətləndirmə',
                    'en' => 'Initial Assessment',
                    'ru' => 'Предварительная оценка',
                    'tr' => 'Ön Değerlendirme',
                ],
                'description' => [
                    'az' => 'Müraciətlərin kriteriyalara uyğunluğunun yoxlanılması',
                    'en' => 'Checking compliance of applications with criteria',
                    'ru' => 'Проверка соответствия заявок критериям',
                    'tr' => 'Başvuruların kriterlere uygunluğunun kontrol edilmesi',
                ],
            ],
            [
                'internship_program_page_id' => 1,
                'order' => 3,
                'title' => [
                    'az' => 'Test Mərhələsi',
                    'en' => 'Testing Phase',
                    'ru' => 'Этап тестирования',
                    'tr' => 'Test Aşaması',
                ],
                'description' => [
                    'az' => 'Analitik və ixtisas biliklərinin onlayn testlə yoxlanılması',
                    'en' => 'Testing analytical and professional knowledge online',
                    'ru' => 'Проверка аналитических и профессиональных знаний онлайн',
                    'tr' => 'Analitik ve mesleki bilginin online testle ölçülmesi',
                ],
            ],
            [
                'internship_program_page_id' => 1,
                'order' => 4,
                'title' => [
                    'az' => 'Texniki İntervyu',
                    'en' => 'Technical Interview',
                    'ru' => 'Техническое интервью',
                    'tr' => 'Teknik Mülakat',
                ],
                'description' => [
                    'az' => 'Mütəxəssislər tərəfindən peşəkar bacarıqların qiymətləndirilməsi',
                    'en' => 'Assessment of professional skills by experts',
                    'ru' => 'Оценка профессиональных навыков экспертами',
                    'tr' => 'Uzmanlar tarafından profesyonel becerilerin değerlendirilmesi',
                ],
            ],
        ];

        seedTranslationAttributes(InternshipProgramPageItem::class, $items);

        $this->command->info(count($items) . ' Internship Program items created.');
    }
}
