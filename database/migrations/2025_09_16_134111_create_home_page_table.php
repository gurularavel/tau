<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_page', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
             $table->string('image2')->nullable();
              $table->string('image3')->nullable();
            $table->string('student')->nullable();
            $table->string('course')->nullable();
            $table->string('startup')->nullable();
            $table->string('teacher')->nullable();
            $table->string('language')->nullable();
            $table->timestamps();
        });

        Schema::create('home_page_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_page_id');
            $table->string('locale', 2)->index();
            $table->text('title')->nullable();
            $table->text('title2')->nullable();
            $table->text('title3')->nullable();
            $table->text('title4')->nullable();
            $table->text('title5')->nullable();
            $table->text('description')->nullable();
            $table->text('description2')->nullable();
            $table->text('description3')->nullable();
            $table->text('description4')->nullable();
            $table->text('description5')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();

            $table->foreign('home_page_id')->references('id')->on('home_page')->onDelete('cascade');

            $table->unique(['home_page_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page');
    }
};
