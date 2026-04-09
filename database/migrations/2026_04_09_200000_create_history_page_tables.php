<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('history_page', function (Blueprint $table) {
            $table->id();
            $table->string('breadcrumb')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('stat1_value')->nullable();
            $table->string('stat2_value')->nullable();
            $table->string('stat3_value')->nullable();
            $table->string('stat4_value')->nullable();
            $table->timestamps();
        });

        Schema::create('history_page_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('history_page_id');
            $table->string('locale', 10)->index();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->string('stat1_label')->nullable();
            $table->string('stat2_label')->nullable();
            $table->string('stat3_label')->nullable();
            $table->string('stat4_label')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
            $table->foreign('history_page_id')->references('id')->on('history_page')->onDelete('cascade');
            $table->unique(['history_page_id', 'locale']);
        });

        Schema::create('history_page_infos', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('history_page_info_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('history_page_info_id');
            $table->string('locale', 10)->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('history_page_info_id')->references('id')->on('history_page_infos')->onDelete('cascade');
            $table->unique(['history_page_info_id', 'locale'], 'hp_info_trans_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history_page_info_translations');
        Schema::dropIfExists('history_page_infos');
        Schema::dropIfExists('history_page_translations');
        Schema::dropIfExists('history_page');
    }
};
