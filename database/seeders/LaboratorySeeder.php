<?php

namespace Database\Seeders;

use App\Models\Laboratory;
use App\Models\LaboratoryCategory;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class LaboratorySeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Laboratories';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('laboratories');

        for ($i = 1; $i <= 3; $i++) {
            moveFactoryImageToUploads('laboratories', 'laboratories', 'laboratory' . $i . '.jpg');
        }

$laboratories = [
    [
        'image' => 'laboratory1.jpg',
        'slug' => 'proqramlasdirma-laboratoriyasi',
        'title' => [
            'az' => 'Proqramlaşdırma Laboratoriyası',
            'en' => 'Programming Laboratory',
            'ru' => 'Лаборатория программирования',
            'tr' => 'Programlama Laboratuvarı',
        ],
        'description' => [
            'az' => 'Müasir proqram təminatının hazırlanması, alqoritmlərin test edilməsi və bulud texnologiyalarının tətbiqi üçün nəzərdə tutulmuş innovativ mühit.',
            'en' => 'An innovative environment designed for modern software development, algorithm testing, and cloud technology application.',
            'ru' => 'Инновационная среда, предназначенная для современной разработки ПО, тестирования алгоритмов и применения облачных технологий.',
            'tr' => 'Modern yazılım geliştirme, algoritma testi ve bulut teknolojisi uygulamaları için tasarlanmış yenilikçi bir ortam.',
        ],
        'meta_title' => [
            'az' => 'Proqramlaşdırma Laboratoriyası - Tədqiqat Mərkəzi',
            'en' => 'Programming Laboratory - Research Center',
            'ru' => 'Лаборатория программирования - Исследовательский центр',
            'tr' => 'Programlama Laboratuvarı - Araştırma Merkezi',
        ],
        'meta_description' => [
            'az' => 'Yüksək texnologiyalı proqramlaşdırma laboratoriyamızda tətbiq edilən layihələr və imkanlar.',
            'en' => 'Projects and opportunities implemented in our high-tech programming laboratory.',
            'ru' => 'Проекты и возможности, реализованные в нашей высокотехнологичной лаборатории программирования.',
            'tr' => 'Yüksek teknolojili programlama laboratuvarımızda uygulanan projeler ve imkanlar.',
        ],
        'meta_keywords' => [
            'az' => 'proqramlaşdırma, kodlaşdırma, proqram təminatı, laboratoriya',
            'en' => 'programming, coding, software development, lab',
            'ru' => 'программирование, кодирование, разработка ПО, лаборатория',
            'tr' => 'programlama, kodlama, yazılım geliştirme, laboratuvar',
        ],
    ],
    [
        'image' => 'laboratory2.jpg',
        'slug' => 'kiber-tehlukesizlik-merkezi',
        'title' => [
            'az' => 'Kiber Təhlükəsizlik Laboratoriyası',
            'en' => 'Cyber Security Laboratory',
            'ru' => 'Лаборатория кибербезопасности',
            'tr' => 'Siber Güvenlik Laboratuvarı',
        ],
        'description' => [
            'az' => 'Şəbəkə təhlükəsizliyi, nüfuzetmə testləri və rəqəmsal kriminalistika sahəsində praktiki tədqiqatların aparıldığı ixtisaslaşmış mərkəz.',
            'en' => 'A specialized center for practical research in network security, penetration testing, and digital forensics.',
            'ru' => 'Специализированный центр для практических исследований в области сетевой безопасности, тестирования на проникновение и цифровой криминалистики.',
            'tr' => 'Ağ güvenliği, sızma testleri ve dijital adli tıp alanlarında pratik araştırmaların yapıldığı uzmanlaşmış merkez.',
        ],
        'meta_title' => [
            'az' => 'Kiber Təhlükəsizlik Laboratoriyası və Tədqiqatlar',
            'en' => 'Cyber Security Lab and Research',
            'ru' => 'Лаборатория кибербезопасности и исследования',
            'tr' => 'Siber Güvenlik Laboratuvarı ve Araştırmalar',
        ],
        'meta_description' => [
            'az' => 'Kiber təhlükəsizlik sahəsində ən son texnologiyaların tədqiqi və müdafiə sistemlərinin qurulması.',
            'en' => 'Research of the latest technologies in cyber security and building defense systems.',
            'ru' => 'Исследование новейших технологий в области кибербезопасности и создание систем защиты.',
            'tr' => 'Siber güvenlik alanındaki en son teknolojilerin araştırılması ve savunma sistemlerinin kurulması.',
        ],
        'meta_keywords' => [
            'az' => 'kiber təhlükəsizlik, şəbəkə, pentest, təhlükəsizlik laboratoriyası',
            'en' => 'cyber security, network, pentest, security lab',
            'ru' => 'кибербезопасность, сеть, пентест, лаборатория безопасности',
            'tr' => 'siber güvenlik, ağ, pentest, güvenlik laboratuvarı',
        ],
    ],
    [
        'image' => 'laboratory3.jpg',
        'slug' => 'suni-intellekt-lab',
        'title' => [
            'az' => 'Süni İntellekt Laboratoriyası',
            'en' => 'Artificial Intelligence Laboratory',
            'ru' => 'Лаборатория искусственного интеллекта',
            'tr' => 'Yapay Zeka Laboratuvarı',
        ],
        'description' => [
            'az' => 'Maşın öyrənməsi, dərin öyrənmə və robototexnika layihələrinin icrası üçün nəzərdə tutulmuş elmi-tədqiqat laboratoriyası.',
            'en' => 'A research laboratory designed for the execution of machine learning, deep learning, and robotics projects.',
            'ru' => 'Научно-исследовательская лаборатория, предназначенная для выполнения проектов в области машинного и глубокого обучения, а также робототехники.',
            'tr' => 'Makine öğrenimi, derin öğrenme ve robotik projelerinin yürütülmesi için tasarlanmış araştırma laboratuvarı.',
        ],
        'meta_title' => [
            'az' => 'Süni İntellekt və Robototexnika Laboratoriyası',
            'en' => 'AI and Robotics Laboratory',
            'ru' => 'Лаборатория ИИ и робототехники',
            'tr' => 'Yapay Zeka ve Robotik Laboratuvarı',
        ],
        'meta_description' => [
            'az' => 'Gələcəyin texnologiyaları: Süni intellekt və böyük verilənlərin analizi laboratoriyası.',
            'en' => 'Technologies of the future: Artificial intelligence and big data analysis laboratory.',
            'ru' => 'Технологии будущего: лаборатория искусственного интеллекта и анализа больших данных.',
            'tr' => 'Geleceğin teknolojileri: Yapay zeka ve büyük veri analizi laboratuvarı.',
        ],
        'meta_keywords' => [
            'az' => 'süni intellekt, AI, maşın öyrənməsi, big data',
            'en' => 'AI, machine learning, deep learning, robotics lab',
            'ru' => 'искусственный интеллект, ИИ, машинное обучение',
            'tr' => 'yapay zeka, AI, makine öğrenimi, robotik',
        ],
    ],
];
        seedTranslationAttributes(Laboratory::class, $laboratories);

        $this->command->info(count($laboratories) . ' Laboratory created.');
    }
}
