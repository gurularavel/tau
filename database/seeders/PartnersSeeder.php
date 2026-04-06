<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\PartnerCategory;
use App\Traits\FileManagable;
use Illuminate\Database\Seeder;

class PartnersSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Partners';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        $this->remakeFolder('partners');

        for ($i = 1; $i <= 6; $i++) {
            moveFactoryImageToUploads('partners', 'partners', 'partners' . $i . '.jpg');
        }

$partners = [
    [
        'title' => ['az' => 'Azercell', 'en' => 'Azercell', 'tr' => 'Azercell', 'ru' => 'Azercell'],
        'title2' => ['az' => 'Telekom', 'en' => 'Telecom', 'tr' => 'Telekom', 'ru' => 'Телеком'],
        'description' => [
            'az' => 'Rabitə və rəqəmsal xidmətlər üzrə lider mobil operator.',
            'en' => 'Leading mobile operator in communications and digital services.',
            'tr' => 'İletişim ve dijital hizmetlerde lider mobil operatör.',
            'ru' => 'Ведущий мобильный оператор в сфере связи и цифровых услуг.',
        ],
        'address' => ['az' => 'Bakı, Tbilisi prospekti 149', 'en' => 'Baku, Tbilisi ave. 149', 'tr' => 'Bakü, Tiflis cad. 149', 'ru' => 'Баку, пр. Тбилиси 149'],
        'intership_location' => ['az' => '12 təcrübə yeri', 'en' => '12 internship positions', 'tr' => '12 staj yeri', 'ru' => '12 мест для стажировки'],
        'image' => 'partners-azercell.jpg',
    ],
    [
        'title' => ['az' => 'PASHA Bank', 'en' => 'PASHA Bank', 'tr' => 'PASHA Bank', 'ru' => 'PASHA Bank'],
        'title2' => ['az' => 'Bankçılıq', 'en' => 'Banking', 'tr' => 'Bankacılık', 'ru' => 'Банковское дело'],
        'description' => [
            'az' => 'Azərbaycanın aparıcı korporativ bankı.',
            'en' => 'The leading corporate bank of Azerbaijan.',
            'tr' => 'Azerbaycan\'ın öncü kurumsal bankası.',
            'ru' => 'Ведущий корпоративный банк Азербайджана.',
        ],
        'address' => ['az' => 'Bakı, Port Baku Towers', 'en' => 'Baku, Port Baku Towers', 'tr' => 'Bakü, Port Baku Towers', 'ru' => 'Баку, Port Baku Towers'],
        'intership_location' => ['az' => '5 təcrübə yeri', 'en' => '5 internship positions', 'tr' => '5 staj yeri', 'ru' => '5 мест для стажировки'],
        'image' => 'partners-pashabank.jpg',
    ],
    [
        'title' => ['az' => 'SOCAR', 'en' => 'SOCAR', 'tr' => 'SOCAR', 'ru' => 'SOCAR'],
        'title2' => ['az' => 'Enerji', 'en' => 'Energy', 'tr' => 'Enerji', 'ru' => 'Энергетика'],
        'description' => [
            'az' => 'Neft və qaz hasilatı üzrə dövlət şirkəti.',
            'en' => 'State oil and gas company.',
            'tr' => 'Devlet petrol ve doğalgaz şirketi.',
            'ru' => 'Государственная нефтегазовая компания.',
        ],
        'address' => ['az' => 'Bakı, Heydər Əliyev pr. 121', 'en' => 'Baku, Heydar Aliyev ave. 121', 'tr' => 'Bakü, Haydar Aliyev cad. 121', 'ru' => 'Баку, пр. Гейдара Алиева 121'],
        'intership_location' => ['az' => '20 təcrübə yeri', 'en' => '20 internship positions', 'tr' => '20 staj yeri', 'ru' => '20 мест для стажировки'],
        'image' => 'partners-socar.jpg',
    ],
    [
        'title' => ['az' => 'ASAN Xidmət', 'en' => 'ASAN Service', 'tr' => 'ASAN Hizmet', 'ru' => 'ASAN Служба'],
        'title2' => ['az' => 'Dövlət Agentliyi', 'en' => 'State Agency', 'tr' => 'Devlet Ajansı', 'ru' => 'Госагентство'],
        'description' => [
            'az' => 'Dövlət xidmətlərinin göstərilməsi üzrə innovativ mərkəz.',
            'en' => 'Innovative center for providing public services.',
            'tr' => 'Kamu hizmetlerinin sunumu için yenilikçi merkez.',
            'ru' => 'Инновационный центр предоставления государственных услуг.',
        ],
        'address' => ['az' => 'Bakı, Azərbaycan', 'en' => 'Baku, Azerbaijan', 'tr' => 'Bakü, Azerbaycan', 'ru' => 'Баку, Азербайджан'],
        'intership_location' => ['az' => '15 təcrübə yeri', 'en' => '15 internship positions', 'tr' => '15 staj yeri', 'ru' => '15 мест для стажировки'],
        'image' => 'partners-asan.jpg',
    ],
    [
        'title' => ['az' => 'ABB', 'en' => 'ABB', 'tr' => 'ABB', 'ru' => 'ABB'],
        'title2' => ['az' => 'Maliyyə', 'en' => 'Finance', 'tr' => 'Finans', 'ru' => 'Финансы'],
        'description' => [
            'az' => 'Rəqəmsal bankçılıq həlləri və geniş xidmət şəbəkəsi.',
            'en' => 'Digital banking solutions and extensive service network.',
            'tr' => 'Dijital bankacılık çözümleri ve geniş hizmet ağı.',
            'ru' => 'Цифровые банковские решения и широкая сеть обслуживания.',
        ],
        'address' => ['az' => 'Bakı, Nizami küçəsi 67', 'en' => 'Baku, Nizami str. 67', 'tr' => 'Bakü, Nizami cad. 67', 'ru' => 'Баку, ул. Низами 67'],
        'intership_location' => ['az' => '10 təcrübə yeri', 'en' => '10 internship positions', 'tr' => '10 staj yeri', 'ru' => '10 мест для стажировки'],
        'image' => 'partners-abb.jpg',
    ],
    [
        'title' => ['az' => 'Deloitte', 'en' => 'Deloitte', 'tr' => 'Deloitte', 'ru' => 'Deloitte'],
        'title2' => ['az' => 'Audit və Konsaltinq', 'en' => 'Audit & Consulting', 'tr' => 'Denetim ve Danışmanlık', 'ru' => 'Аудит и Консалтинг'],
        'description' => [
            'az' => 'Dünyanın ən böyük audit və peşəkar xidmətlər şəbəkəsi.',
            'en' => 'The world\'s largest audit and professional services network.',
            'tr' => 'Dünyanın en büyük denetim ve profesyonel hizmetler ağı.',
            'ru' => 'Крупнейшая в мире сеть аудиторских и профессиональных услуг.',
        ],
        'address' => ['az' => 'Bakı, Bakı Ağ Şəhər', 'en' => 'Baku, Baku White City', 'tr' => 'Bakü, Bakü Beyaz Şehir', 'ru' => 'Баку, Баку Белый Город'],
        'intership_location' => ['az' => '4 təcrübə yeri', 'en' => '4 internship positions', 'tr' => '4 staj yeri', 'ru' => '4 места для стажировки'],
        'image' => 'partners-deloitte.jpg',
    ],
];
        seedTranslationAttributes(Partner::class, $partners);

        $this->command->info(count($partners) . ' partners created.');
    }
}
