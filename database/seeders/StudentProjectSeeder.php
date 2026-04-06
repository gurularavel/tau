<?php

namespace Database\Seeders;

use App\Models\StudentProject;
use App\Models\StudentProjectCategory;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class StudentProjectSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'StudentProjects';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('student_projects');

        for ($i = 1; $i <= 3; $i++) {
            moveFactoryImageToUploads('student_projects', 'student_projects', 'student_project' . $i . '.jpg');
        }

        $student_projects = [
            [
                'image' => 'student_project1.jpg',
                'slug' => 'genclerin-it-akademiyasi-layihesi',
                'title' => [
                    'az' => 'Gənclərin İT Akademiyası Layihəsi',
                    'en' => 'Youth IT Academy Project',
                    'ru' => 'Проект Молодежная ИТ-академия',
                    'tr' => 'Gençlerin BT Akademisi Projesi',
                ],
                'description' => [
                    'az' => 'Tələbələrin proqramlaşdırma və kiber təhlükəsizlik sahəsində praktiki biliklərini artırmaq üçün təşkil olunan intensiv təlim proqramı.',
                    'en' => 'An intensive training program organized to increase students practical knowledge in programming and cyber security.',
                    'ru' => 'Интенсивная программа обучения, организованная для повышения практических знаний студентов в области программирования и кибербезопасности.',
                    'tr' => 'Öğrencilerin programlama ve siber güvenlik alanındaki pratik bilgilerini artırmak için düzenlenen yoğun eğitim programı.',
                ],
                'meta_title' => ['az' => 'İT Akademiya Layihəsi', 'en' => 'IT Academy Project', 'ru' => 'ИТ-академия', 'tr' => 'BT Akademisi'],
                'meta_description' => ['az' => 'Tələbələr üçün İT kursları.', 'en' => 'IT courses for students.', 'ru' => 'ИТ-курсы для студентов.', 'tr' => 'Öğrenciler için BT kursları.'],
                'meta_keywords' => ['az' => 'it, akademiya, kodlaşdırma', 'en' => 'it, academy, coding', 'ru' => 'ит, академия', 'tr' => 'bt, akademi'],
            ],
            [
                'image' => 'student_project2.jpg',
                'slug' => 'karyera-gunleri-ve-sergisi',
                'title' => [
                    'az' => 'Karyera Günləri və İş Sərgisi',
                    'en' => 'Career Days and Job Fair',
                    'ru' => 'Дни карьеры и ярмарка вакансий',
                    'tr' => 'Kariyer Günleri ve İş Fuarı',
                ],
                'description' => [
                    'az' => 'Məzun və tələbələrin aparıcı şirkətlərin nümayəndələri ilə birbaşa görüşü və iş imkanlarının müzakirəsi üçün nəzərdə tutulmuş platforma.',
                    'en' => 'A platform designed for graduates and students to meet directly with representatives of leading companies and discuss job opportunities.',
                    'ru' => 'Платформа, предназначенная для непосредственных встреч выпускников и студентов с представителями ведущих компаний.',
                    'tr' => 'Mezunların ve öğrencilerin önde gelen şirketlerin temsilcileriyle doğrudan görüşmesi için tasarlanmış bir platform.',
                ],
                'meta_title' => ['az' => 'Karyera Günləri', 'en' => 'Career Days', 'ru' => 'Дни карьеры', 'tr' => 'Kariyer Günleri'],
                'meta_description' => ['az' => 'İş tapmaq və karyera imkanları.', 'en' => 'Finding a job and career opportunities.', 'ru' => 'Поиск работы и карьеры.', 'tr' => 'İş bulma ve kariyer imkanları.'],
                'meta_keywords' => ['az' => 'karyera, iş elanları, sərgi', 'en' => 'career, job fair, exhibition', 'ru' => 'карьера, работа', 'tr' => 'kariyer, iş fuarı'],
            ],
            [
                'image' => 'student_project3.jpg',
                'slug' => 'universitetlerarasi-idman-kuboku',
                'title' => [
                    'az' => 'Universitetlərarası İdman Kuboku',
                    'en' => 'Inter-University Sports Cup',
                    'ru' => 'Межвузовский спортивный кубок',
                    'tr' => 'Üniversiteler Arası Spor Kupası',
                ],
                'description' => [
                    'az' => 'Tələbələr arasında sağlam həyat tərzini təbliğ etmək məqsədilə müxtəlif idman növləri üzrə keçirilən genişmiqyaslı yarışlar.',
                    'en' => 'Large-scale competitions held in various sports to promote a healthy lifestyle among students.',
                    'ru' => 'Крупномасштабные соревнования по различным видам спорта, направленные на пропаганду здорового образа жизни.',
                    'tr' => 'Öğrenciler arasında sağlıklı bir yaşam tarzını teşvik etmek amacıyla çeşitli spor dallarında düzenlenen büyük yarışmalar.',
                ],
                'meta_title' => ['az' => 'İdman Kuboku', 'en' => 'Sports Cup', 'ru' => 'Спортивный кубок', 'tr' => 'Spor Kupası'],
                'meta_description' => ['az' => 'Futbol, voleybol və şahmat yarışları.', 'en' => 'Football, volleyball and chess competitions.', 'ru' => 'Футбол и волейбол.', 'tr' => 'Futbol ve voleybol.'],
                'meta_keywords' => ['az' => 'idman, yarış, futbol, kubok', 'en' => 'sports, competition, cup', 'ru' => 'спорт, соревнования', 'tr' => 'spor, yarışma'],
            ],
        ];
        seedTranslationAttributes(StudentProject::class, $student_projects);

        $this->command->info(count($student_projects) . ' Student Projects created.');
    }
}
