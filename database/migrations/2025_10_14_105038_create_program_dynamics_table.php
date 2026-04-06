<?php

use App\Models\Dynamic;
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
        Schema::create('program_dynamics', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->text('video')->nullable();
            $table->boolean('type')->nullable();
            $table->integer('order')->nullable();
            $table->json('program_dynamic_item_ids')->nullable();
            $table->boolean('is_active')->default(Dynamic::IS_ACTIVE);
            $table->integer('layout_row')->default(1);
            $table->integer('layout_column')->default(1);
            $table->enum('layout_width', ['half', 'full']);

            $table->timestamps();
        });
        Schema::create('program_dynamic_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_dynamic_id')->constrained('program_dynamics')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['program_dynamic_id', 'locale']);
        });



        Schema::create('program_dynamic_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_dynamic_id')->constrained()->cascadeOnDelete();
            $table->string('image', 50);
            $table->integer('order')->nullable();
            $table->unique(['program_dynamic_id', 'image']);
        });

        Schema::create('program_dynamic_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_dynamic_id')->constrained('program_dynamics')->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->boolean('type')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('url')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->integer('order')->default(0);
            $table->text('room')->nullable();
            $table->text('hour')->nullable();
            $table->text('code')->nullable();
            $table->text('credit')->nullable();
            $table->timestamps();
        });

        Schema::create('program_dynamic_item_translations', function (Blueprint $table) {
            $table->id();
$table->unsignedBigInteger('program_dynamic_item_id');

$table->foreign('program_dynamic_item_id', 'pd_item_trans_fk')
      ->references('id')
      ->on('program_dynamic_items')
      ->cascadeOnDelete();

            $table->string('locale', 2)->index();
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->text('name')->nullable();
            $table->text('profession')->nullable();

            $table->text('education_type')->nullable();
            $table->text('subject_name')->nullable();
            $table->text('examine_type')->nullable();

            $table->text('day')->nullable();
            $table->text('professor')->nullable();
            $table->text('subtitle')->nullable();

            $table->unique(['program_dynamic_item_id', 'locale'], 'prgr_dynmc_uniqe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
