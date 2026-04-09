<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('hero_slide_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hero_slide_id')->constrained('hero_slides')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->unique(['hero_slide_id', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slide_translations');
        Schema::dropIfExists('hero_slides');
    }
};
