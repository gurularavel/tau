<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicLookupSeeder extends Seeder
{
    public function run(): void
    {
        // Türkçe (tr) eklendi
        $locales = ['az', 'en', 'ru', 'tr'];

        // 🔥 SEMESTERS
        $semesters = [
            ['az' => 'Payız', 'en' => 'Fall', 'ru' => 'Осень', 'tr' => 'Güz'],
            ['az' => 'Bahar', 'en' => 'Spring', 'ru' => 'Весна', 'tr' => 'Bahar'],
            ['az' => 'Yay', 'en' => 'Summer', 'ru' => 'Лето', 'tr' => 'Yaz'],
        ];

        foreach ($semesters as $item) {
            $id = DB::table('semesters')->insertGetId([]);
            foreach ($locales as $locale) {
                DB::table('semester_translations')->insert([
                    'semester_id' => $id,
                    'locale' => $locale,
                    'name' => $item[$locale],
                ]);
            }
        }

        // 🔥 EDUCATION LEVELS
        $levels = [
            ['az' => 'Bakalavr', 'en' => 'Bachelor', 'ru' => 'Бакалавр', 'tr' => 'Lisans'],
            ['az' => 'Magistr', 'en' => 'Master', 'ru' => 'Магистр', 'tr' => 'Yüksek Lisans'],
            ['az' => 'Doktorantura', 'en' => 'PhD', 'ru' => 'Докторантура', 'tr' => 'Doktora'],
        ];

        foreach ($levels as $item) {
            $id = DB::table('education_levels')->insertGetId([]);
            foreach ($locales as $locale) {
                DB::table('education_level_translations')->insert([
                    'education_level_id' => $id,
                    'locale' => $locale,
                    'name' => $item[$locale],
                ]);
            }
        }

        // 🔥 FACULTIES
        $faculties = [
            ['az' => 'İnformasiya Texnologiyaları', 'en' => 'IT', 'ru' => 'ИТ', 'tr' => 'Bilişim Teknolojileri'],
            ['az' => 'İqtisadiyyat', 'en' => 'Economics', 'ru' => 'Экономика', 'tr' => 'İktisat'],
            ['az' => 'Hüquq', 'en' => 'Law', 'ru' => 'Право', 'tr' => 'Hukuk'],
            ['az' => 'Tibb', 'en' => 'Medicine', 'ru' => 'Медицина', 'tr' => 'Tıp'],
            ['az' => 'Memarlıq', 'en' => 'Architecture', 'ru' => 'Архитектура', 'tr' => 'Mimarlık'],
            ['az' => 'Mühəndislik', 'en' => 'Engineering', 'ru' => 'Инженерия', 'tr' => 'Mühendislik'],
            ['az' => 'Pedaqogika', 'en' => 'Pedagogy', 'ru' => 'Педагогика', 'tr' => 'Eğitim Bilimleri'],
            ['az' => 'Turizm', 'en' => 'Tourism', 'ru' => 'Туризм', 'tr' => 'Turizm'],
        ];

        foreach ($faculties as $item) {
            $id = DB::table('faculties')->insertGetId([]);
            foreach ($locales as $locale) {
                DB::table('faculty_translations')->insert([
                    'faculty_id' => $id,
                    'locale' => $locale,
                    'name' => $item[$locale],
                ]);
            }
        }

        // 🔥 EDUCATION TYPES
        $types = [
            ['az' => 'Əyani', 'en' => 'Full-time', 'ru' => 'Очное', 'tr' => 'Örgün Öğretim'],
            ['az' => 'Qiyabi', 'en' => 'Part-time', 'ru' => 'Заочное', 'tr' => 'İkinci Öğretim'],
            ['az' => 'Distant', 'en' => 'Distance', 'ru' => 'Дистанционное', 'tr' => 'Uzaktan Eğitim'],
        ];

        foreach ($types as $item) {
            $id = DB::table('education_types')->insertGetId([]);
            foreach ($locales as $locale) {
                DB::table('education_type_translations')->insert([
                    'education_type_id' => $id,
                    'locale' => $locale,
                    'name' => $item[$locale],
                ]);
            }
        }

        // 🔥 EVENT TYPES
        $eventTypes = [
            ['az' => 'İmtahan', 'en' => 'Exam', 'ru' => 'Экзамен', 'tr' => 'Sınav'],
            ['az' => 'Qeydiyyat', 'en' => 'Registration', 'ru' => 'Регистрация', 'tr' => 'Kayıt'],
            ['az' => 'Dərs başlanğıcı', 'en' => 'Classes Start', 'ru' => 'Начало занятий', 'tr' => 'Ders Başlangıcı'],
            ['az' => 'Dərs bitişi', 'en' => 'Classes End', 'ru' => 'Окончание занятий', 'tr' => 'Ders Bitimi'],
            ['az' => 'Tətil', 'en' => 'Holiday', 'ru' => 'Каникулы', 'tr' => 'Tatil'],
            ['az' => 'Digər', 'en' => 'Other', 'ru' => 'Другое', 'tr' => 'Diğer'],
        ];

        foreach ($eventTypes as $item) {
            $id = DB::table('event_types')->insertGetId([]);
            foreach ($locales as $locale) {
                DB::table('event_type_translations')->insert([
                    'event_type_id' => $id,
                    'locale' => $locale,
                    'name' => $item[$locale],
                ]);
            }
        }
    }
}
