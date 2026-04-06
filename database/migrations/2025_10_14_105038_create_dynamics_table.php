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
        Schema::create('dynamics', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->text('video')->nullable();
            $table->boolean('type')->nullable();
            $table->integer('order')->nullable();
            $table->json('dynamic_item_ids')->nullable();
            $table->boolean('is_active')->default(Dynamic::IS_ACTIVE);
            $table->integer('layout_row')->default(1);
            $table->integer('layout_column')->default(1);
            $table->enum('layout_width', ['half', 'full']);
            $table->timestamps();
        });
        Schema::create('dynamic_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dynamic_id')->constrained('dynamics')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->longText('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['dynamic_id', 'locale']);
        });



        Schema::create('dynamic_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dynamic_id')->constrained()->cascadeOnDelete();
            $table->string('image', 50);
            $table->integer('order')->nullable();
            $table->unique(['dynamic_id', 'image']);
        });

        Schema::create('dynamic_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dynamic_id')->constrained('dynamics')->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->boolean('type')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('dynamic_item_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dynamic_item_id')->constrained('dynamic_items')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('profession')->nullable();
            $table->unique(['dynamic_item_id', 'locale']);
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
