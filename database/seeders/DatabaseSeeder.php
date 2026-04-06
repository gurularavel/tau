<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Artisan;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $factorySeeders = [
            AcademicLookupSeeder::class,
            AcademicCalendarSeeder::class,
            MenuSeeder::class,
            HomePageSeeder::class,
            PartnersSeeder::class,
            ProjectPageSeeder::class,
            NewsSeeder::class,
            AnnouncementSeeder::class,
            ContactPageSeeder::class,
            ProjectsCategorySeeder::class,
            ProjectsSeeder::class,
            CareerPageSeeder::class,
            VacancySeeder::class,
            CampusGalleryPageSeeder::class,
            StudentClubPageSeeder::class,
            StudentClubSeeder::class,
            PageSeeder::class,
            EventPageSeeder::class,
            EventsCategorySeeder::class,
            EventsSeeder::class,
            StudentProjectPageSeeder::class,
            StudentProjectSeeder::class,
            LaboratoryPageSeeder::class,
            LaboratorySeeder::class,
            InternshipProgramPageSeeder::class,
            InternshipProgramsSeeder::class,
            InternshipProgramItemsSeeder::class,
            GraduatePageSeeder::class,
            GraduateSeeder::class,
            CareerOpportunityPageSeeder::class,
            CareerOpportunityCategorySeeder::class,
            CareerOpportunitySeeder::class,
            MediaGuidePageSeeder::class,
            FooterSeeder::class,
            ProgramSeeder::class


        ];


        $seeders = [
            LanguageSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,

        ];
        if (app()->isLocal()) {
            $seeders = array_merge($seeders, $factorySeeders);
        }
        Artisan::call('storage:link');
        $this->command->info('Linked storage file');

        Artisan::call('key:generate');
        $this->command->info('Application key generated and config cleared successfully');


        $this->call($seeders);

        Artisan::call('optimize:clear');
        $this->command->info('Optimized cache cleared successfully');

    }
}
