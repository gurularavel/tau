<?php

use App\Models\Project;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('internship_program_pages', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('internship_program_page_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('internship_program_page_id');
            $table->foreign('internship_program_page_id', 'i_trans_id_foreign')->references('id')->on('internship_program_pages')->onDelete('cascade');
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['internship_program_page_id', 'locale'], 'i_translations_unique');
        });

        Schema::create('internship_programs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->string('duration')->nullable();
            $table->integer('place_count')->nullable();
            $table->boolean('is_active')->default(Project::IS_ACTIVE);
            $table->timestamps();
        });
        Schema::create('internship_program_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internship_program_id')->constrained('internship_programs')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['internship_program_id', 'locale'], 'int_prog_trns_unq');
        });

        Schema::create('internship_program_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internship_program_id')->constrained()->cascadeOnDelete();
            $table->string('image', 50);
            $table->integer('order')->nullable();
            $table->unique(['internship_program_id', 'image'], 'int_prog_unq');
        });

        Schema::create('internship_program_page_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('internship_program_page_id');
            $table->foreign('internship_program_page_id', 'in_trans_id_foreign')->references('id')->on('internship_program_pages')->onDelete('cascade');
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('internship_program_page_item_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('internship_program_page_item_id')->constrained('internship_program_page_items', 'id', 'int_prog_item_fk')->cascadeOnDelete();

            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();

            $table->unique(['internship_program_page_item_id', 'locale'], 'int_prog_page_item_unq');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_programs');
    }
};
