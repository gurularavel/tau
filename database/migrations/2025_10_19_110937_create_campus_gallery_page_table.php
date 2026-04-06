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
        Schema::create('campus_gallery_pages', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->longText('video_url')->nullable();
            $table->timestamps();
        });

        Schema::create('campus_gallery_page_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campus_gallery_page_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->string('title2')->nullable();

            $table->longText('description')->nullable();
            $table->longText('description2')->nullable();
            $table->longText('description3')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['campus_gallery_page_id', 'locale'], 'cmps_gllry_page');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_gallery_page');
    }
};
