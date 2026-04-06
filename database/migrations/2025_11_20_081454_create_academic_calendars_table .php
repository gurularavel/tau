<?php

use App\Models\Announcement;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
        });
        Schema::create('semester_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('name');
            $table->unique(['semester_id', 'locale']);
        });
        Schema::create('education_levels', function (Blueprint $table) {
            $table->id();
        });
        Schema::create('education_level_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_level_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('name');
            $table->unique(['education_level_id', 'locale']);
        });
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
        });
        Schema::create('faculty_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('name');
            $table->unique(['faculty_id', 'locale']);
        });
        Schema::create('education_types', function (Blueprint $table) {
            $table->id();
        });
        Schema::create('education_type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_type_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('name');
            $table->unique(['education_type_id', 'locale']);
        });
        Schema::create('event_types', function (Blueprint $table) {
            $table->id();
        });
        Schema::create('event_type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_type_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('name');
            $table->unique(['event_type_id', 'locale']);
        });
        Schema::create('academic_calendars', function (Blueprint $table) {
            $table->id();

            $table->boolean('is_active')->default(1);

            // relations (filter üçün ideal)
            $table->foreignId('semester_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('education_level_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('faculty_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('education_type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('event_type_id')->nullable()->constrained()->nullOnDelete();

            // əlavə filter
            $table->string('academic_year')->nullable(); // 2025-2026

            // əsas məlumat
            $table->date('event_date');
            $table->integer('order')->default(0);

            $table->timestamps();
        });
        Schema::create('academic_calendar_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('academic_calendar_id')->constrained()->cascadeOnDelete();

            $table->string('locale', 2)->index();
            $table->string('subject')->nullable();

            $table->unique(['academic_calendar_id', 'locale'], 'ac_cal_tr_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_calendars');
    }
};
