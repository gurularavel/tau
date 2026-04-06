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
        Schema::create('contact_page', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('youtube')->nullable();
            $table->string('x_social_media')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->text('location_url')->nullable();
            $table->timestamps();
        });

        Schema::create('contact_page_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contact_page_id');
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->string('title2')->nullable();
            $table->string('title3')->nullable();
            $table->string('address')->nullable();
            $table->longText('description')->nullable();
            $table->string('opening_hour')->nullable();
            $table->string('footer')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();

            $table->foreign('contact_page_id')->references('id')->on('contact_page')->onDelete('cascade');

            $table->unique(['contact_page_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_page');
    }
};
