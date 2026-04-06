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
        Schema::create('media_guide_pages', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->timestamps();
        });

        Schema::create('media_guide_page_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_guide_page_id')->constrained()->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();

            $table->longText('description')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['media_guide_page_id', 'locale'], 'm_g_page');
        });

        Schema::create('media_guide_page_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_guide_page_id')->constrained()->cascadeOnDelete();
            $table->string('image', 50);
            $table->integer('order')->nullable();
            $table->unique(['media_guide_page_id', 'image']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_guide_page');
    }
};
