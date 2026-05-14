<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_life_clubs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('student_life_club_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_life_club_id');
            $table->foreign('student_life_club_id', 'slc_trans_id_foreign')
                ->references('id')
                ->on('student_life_clubs')
                ->onDelete('cascade');
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['student_life_club_id', 'locale'], 'slc_translations_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_life_club_translations');
        Schema::dropIfExists('student_life_clubs');
    }
};
