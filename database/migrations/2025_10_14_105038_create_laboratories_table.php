<?php

use App\Models\Laboratory;
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
        Schema::create('laboratory_pages', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('laboratory_page_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laboratory_page_id');
            $table->foreign('laboratory_page_id', 'l_trans_id_foreign')->references('id')->on('laboratory_pages')->onDelete('cascade');
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['laboratory_page_id', 'locale'], 'l_translations_unique');
        });

        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('is_active')->default(Laboratory::IS_ACTIVE);
            $table->timestamps();
        });
        Schema::create('laboratory_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laboratory_id')->constrained('laboratories')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['laboratory_id', 'locale']);
        });

        Schema::create('laboratory_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laboratory_id')->constrained()->cascadeOnDelete();
            $table->string('image', 50);
            $table->integer('order')->nullable();
            $table->unique(['laboratory_id', 'image']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};
