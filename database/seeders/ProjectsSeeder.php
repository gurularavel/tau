<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Projects';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('projects');

        for ($i = 1; $i <= 3; $i++) {
            moveFactoryImageToUploads('projects', 'projects', 'project' . $i . '.webp');
        }

$projects = [
    [
        'image' => 'project1.webp',
        'project_category_id' => 1, // Kompüter Mühəndisliyi
        'slug' => 'smart-campus-enerji-idareetme',
        'duration' => '2026-2027',
        'participant_count' => '15',
        'publisher_count' => '20',
        'partners' => 'ODTU, AZTU, SOCAR',
        'title' => [
            'az' => 'Smart Campus Enerji İdarəetmə Sistemi',
            'en' => 'Smart Campus Energy Management System',
            'ru' => 'Система управления энергией Smart Campus',
            'tr' => 'Akıllı Kampüs Enerji Yönetim Sistemi',
        ],
        'author' => [
            'az' => 'Prof.Dr. Əli Məmmədov',
            'en' => 'Prof.Dr. Ali Mammadov',
            'ru' => 'Проф.Др. Али Мамедов',
            'tr' => 'Prof.Dr. Ali Mammadov',
        ],
        'description' => [
            'az' => 'Kampus binalarında enerji istehlakını real-time izləyən və optimallaşdıran IoT əsaslı sistem. 30% qənaət təmin edir.',
            'en' => 'IoT-based system tracking and optimizing energy consumption in campus buildings. Provides 30% savings.',
            'ru' => 'Система на базе IoT для мониторинга и оптимизации энергопотребления в кампусе. Обеспечивает 30% экономии.',
            'tr' => 'Kampüs binalarında enerji tüketimini gerçek zamanlı izleyen IoT tabanlı sistem. %30 tasarruf sağlar.',
        ],
        'meta_title' => [ 'az' => 'Smart Energy Project', 'en' => 'Smart Energy Project', 'ru' => 'Smart Energy Project', 'tr' => 'Smart Energy Project' ],
        'meta_description' => [ 'az' => 'IoT enerji idarəetməsi.', 'en' => 'IoT energy management.', 'ru' => 'Управление энергией IoT.', 'tr' => 'IoT enerji yönetimi.' ],
        'meta_keywords' => [ 'az' => 'iot, enerji, smart campus', 'en' => 'iot, energy, smart campus', 'ru' => 'iot, энергия', 'tr' => 'iot, enerji' ],
    ],
    [
        'image' => 'project2.webp',
        'project_category_id' => 2, // Kiber Təhlükəsizlik
        'slug' => 'milli-kiber-mudafie-platformasi',
        'duration' => '2025-2026',
        'participant_count' => '10',
        'publisher_count' => '12',
        'partners' => 'RİNN, DTX, ITU',
        'title' => [
            'az' => 'Milli Kiber Müdafiə və Analiz Platforması',
            'en' => 'National Cyber Defense and Analysis Platform',
            'ru' => 'Национальная платформа киберзащиты и анализа',
            'tr' => 'Milli Siber Savunma ve Analiz Platformu',
        ],
        'author' => [
            'az' => 'Dos. Dr. Leyla Qasımova',
            'en' => 'Assoc. Prof. Leyla Gasimova',
            'ru' => 'Доц. Др. Лейла Гасымова',
            'tr' => 'Doç. Dr. Leyla Gasimova',
        ],
        'description' => [
            'az' => 'Dövlət qurumları üçün kritik infrastrukturun kiber hücumlardan qorunması məqsədilə hazırlanmış təhlükəsizlik həlli.',
            'en' => 'Security solution developed for government agencies to protect critical infrastructure from cyber attacks.',
            'ru' => 'Решение безопасности, разработанное для защиты критической инфраструктуры госорганов от кибератак.',
            'tr' => 'Kamu kurumları için kritik altyapıyı siber saldırılardan korumak amacıyla geliştirilen güvenlik çözümü.',
        ],
        'meta_title' => [ 'az' => 'Cyber Defense Project', 'en' => 'Cyber Defense Project', 'ru' => 'Cyber Defense Project', 'tr' => 'Cyber Defense Project' ],
        'meta_description' => [ 'az' => 'Kiber təhlükəsizlik layihəsi.', 'en' => 'Cyber security project.', 'ru' => 'Проект кибербезопасности.', 'tr' => 'Siber güvenlik projesi.' ],
        'meta_keywords' => [ 'az' => 'cybersecurity, hacking, defense', 'en' => 'cybersecurity, hacking, defense', 'ru' => 'кибербезопасность', 'tr' => 'siber güvenlik' ],
    ],
    [
        'image' => 'project3.webp',
        'project_category_id' => 3, // Süni İntellekt
        'slug' => 'tibbi-diaqnostika-ai',
        'duration' => '2026-2028',
        'participant_count' => '25',
        'publisher_count' => '45',
        'partners' => 'Səhiyyə Nazirliyi, Harvard Medical, IBM',
        'title' => [
            'az' => 'Süni İntellekt Əsaslı Tibbi Diaqnostika',
            'en' => 'AI-Based Medical Diagnostics',
            'ru' => 'Медицинская диагностика на базе ИИ',
            'tr' => 'Yapay Zeka Tabanlı Tıbbi Teşhis',
        ],
        'author' => [
            'az' => 'Dr. Kamran Əliyev',
            'en' => 'Dr. Kamran Aliyev',
            'ru' => 'Др. Кямран Алиев',
            'tr' => 'Dr. Kamran Aliyev',
        ],
        'description' => [
            'az' => 'Rentgen və MRT görüntülərini analiz edərək xəstəlikləri 98% dəqiqliklə müəyyən edən neyron şəbəkə.',
            'en' => 'A neural network that identifies diseases with 98% accuracy by analyzing X-ray and MRI images.',
            'ru' => 'Нейронная сеть, выявляющая заболевания с точностью 98% путем анализа рентгеновских и МРТ снимков.',
            'tr' => 'Röntgen ve MR görüntülerini analiz ederek hastalıkları %98 doğrulukla belirleyen sinir ağı.',
        ],
        'meta_title' => [ 'az' => 'AI in Medicine', 'en' => 'AI in Medicine', 'ru' => 'AI in Medicine', 'tr' => 'AI in Medicine' ],
        'meta_description' => [ 'az' => 'Süni intellekt və tibb.', 'en' => 'Artificial intelligence and medicine.', 'ru' => 'ИИ в медицине.', 'tr' => 'Yapay zeka ve tıp.' ],
        'meta_keywords' => [ 'az' => 'ai, machine learning, medical', 'en' => 'ai, machine learning, medical', 'ru' => 'ИИ, медицина', 'tr' => 'yapay zeka, tıp' ],
    ],
];
        seedTranslationAttributes(Project::class, $projects);

        $this->command->info(count($projects) . ' Projects created.');
    }
}
