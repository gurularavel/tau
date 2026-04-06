<?php

use App\Models\Announcement;
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
        Schema::create('announcements', function(Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->longText('slug');
            $table->json('tags')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->integer('view_counts')->default(0);
            $table->boolean('status')->default(Announcement::IS_ACTIVE);
            $table->timestamps();
        });

        Schema::create('announcement_translations', function(Blueprint $table) {
            $table->increments('id');
            $table->foreignId('announcement_id')->constrained()->cascadeOnDelete();
            $table->string('locale',2)->index()->nullable();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unique(['announcement_id', 'locale']);
        });

        Schema::create('announcement_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('announcement_id')->constrained()->cascadeOnDelete();
            $table->string('image', 50);
            $table->integer('order')->nullable();
            $table->unique(['announcement_id', 'image']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
