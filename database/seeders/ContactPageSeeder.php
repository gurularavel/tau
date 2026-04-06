<?php

namespace Database\Seeders;

use App\Models\ContactPage;
use Illuminate\Database\Seeder;
use App\Traits\FileManagable;

class ContactPageSeeder extends Seeder
{
    use FileManagable;

    private const TARGET = 'Contact Page';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Creating ' . self::TARGET);

        ContactPage::factory()->create();

        $this->command->info('1 fake page ' . self::TARGET . ' are created');
    }
}
