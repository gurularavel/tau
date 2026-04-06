<?php

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
                Schema::create('career_opportunity_pages', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('career_opportunity_page_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('career_opportunity_page_id');
            $table->foreign('career_opportunity_page_id', 'c_o_trans_p_id_foreign')
            ->references('id')
            ->on('career_opportunity_pages')
            ->onDelete('cascade');
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['career_opportunity_page_id', 'locale'], 'c_o_p_translations_unique');
        });


        Schema::create('career_opportunity_categories', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->longText('slug');
            $table->boolean('is_active')->default(EventCategory::IS_ACTIVE);
            $table->timestamps();
        });

        Schema::create('career_opportunity_category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_opportunity_category_id');

            $table
                ->foreign('career_opportunity_category_id', 'c_o_cat_trans_fk')
                ->references('id')
                ->on('career_opportunity_categories')
                ->cascadeOnDelete();

            $table->string('locale', 2)->index();
            $table->string('title', 100)->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['career_opportunity_category_id', 'locale'], 'c_o_translations_unique');
        });
        Schema::create('career_opportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_opportunity_category_id')->constrained('career_opportunity_categories')->cascadeOnDelete();

            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('is_active')->default(Event::IS_ACTIVE);
            $table->timestamps();
        });
        Schema::create('career_opportunity_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_opportunity_id')->constrained('career_opportunities')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['career_opportunity_id', 'locale'], 'c_o_trans_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_opportunities');
    }
};
