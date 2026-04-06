<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AcademicCalendarSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $locales = ['az', 'en', 'ru', 'tr'];

        // Mövcud ID-ləri bazadan çəkirik ki, əlaqələr doğru qurulsun
        $semesterIds = DB::table('semesters')->pluck('id')->toArray();
        $educationLevelIds = DB::table('education_levels')->pluck('id')->toArray();
        $facultyIds = DB::table('faculties')->pluck('id')->toArray();
        $educationTypeIds = DB::table('education_types')->pluck('id')->toArray();
        $eventTypeIds = DB::table('event_types')->pluck('id')->toArray();

        // 10 ədəd fake məlumat yaradırıq
        for ($i = 1; $i <= 10; $i++) {

            // 1. Əsas cədvələ (academic_calendars) məlumat əlavə edirik
            $calendarId = DB::table('academic_calendars')->insertGetId([
                'is_active' => $faker->boolean(80), // 80% ehtimalla aktiv
                'semester_id' => $faker->randomElement($semesterIds),
                'education_level_id' => $faker->randomElement($educationLevelIds),
                'faculty_id' => $faker->randomElement($facultyIds),
                'education_type_id' => $faker->randomElement($educationTypeIds),
                'event_type_id' => $faker->randomElement($eventTypeIds),
                'academic_year' => '2025-2026',
                'event_date' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
                'order' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 2. Tərcümə cədvəlinə (academic_calendar_translations) hər dil üçün mövzu əlavə edirik
            foreach ($locales as $locale) {
                // Hər dil üçün fərqli mətnlər (nümunə üçün prefix ilə)
                $subjects = [
                    'az' => 'Akademik təqvim hadisəsi ' . $i,
                    'en' => 'Academic calendar event ' . $i,
                    'ru' => 'Событие академического календаря ' . $i,
                    'tr' => 'Akademik takvim etkinliği ' . $i,
                ];

                DB::table('academic_calendar_translations')->insert([
                    'academic_calendar_id' => $calendarId,
                    'locale' => $locale,
                    'subject' => $subjects[$locale],
                ]);
            }
        }
    }
}
