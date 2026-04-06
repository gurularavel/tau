<?php

use App\Models\Vacancy;
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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->integer('view_counts')->default(0);
            $table->string('slug')->unique(); // Slug unikal olmalıdır
            $table->boolean('is_active')->default(Vacancy::IS_ACTIVE);

            $table->date('deadline')->nullable();

            $table->date('published_at')->nullable();

            $table->timestamps();
        });

        Schema::create('vacancy_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vacancy_id')->constrained('vacancies')->cascadeOnDelete();
            $table->string('locale', 2)->index();

            $table->string('title')->nullable();


            $table->string('status_text')->nullable();

            $table->longText('description')->nullable();
            $table->longText('content')->nullable();

            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->unique(['vacancy_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancy_translations');
        Schema::dropIfExists('vacancies');
    }
};
