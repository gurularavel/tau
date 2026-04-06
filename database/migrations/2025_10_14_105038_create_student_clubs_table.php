<?php

use App\Models\Project;
use App\Models\StudentClub;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_clubs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('is_active')->default(StudentClub::IS_ACTIVE);
            $table->timestamps();
        });
        Schema::create('student_club_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_club_id')->constrained('student_clubs')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['student_club_id', 'locale']);
        });



        Schema::create('student_club_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_club_id')->constrained()->cascadeOnDelete();
            $table->string('image', 50);
            $table->integer('order')->nullable();
            $table->unique(['student_club_id', 'image']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_clubs');
    }
};
