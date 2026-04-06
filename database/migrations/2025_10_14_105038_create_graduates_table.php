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
        Schema::create('graduate_pages', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('graduate_page_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('graduate_page_id');
            $table->foreign('graduate_page_id')->references('id')->on('graduate_pages')->onDelete('cascade');
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['graduate_page_id', 'locale'], 'l_translations_unique');
        });

        Schema::create('graduates', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('is_active')->default(Laboratory::IS_ACTIVE);
            $table->timestamps();
        });
        Schema::create('graduate_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('graduate_id')->constrained('graduates')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->string('profession')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['graduate_id', 'locale']);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduates');
    }
};
