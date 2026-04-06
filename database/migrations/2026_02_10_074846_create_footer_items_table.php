<?php

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
        Schema::create('footer_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('footer_id')->constrained('footers')->cascadeOnDelete();
            $table->boolean('is_active')->default(true);
            $table->string('slug')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('footer_item_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('footer_item_id')->constrained('footer_items')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->unique(['footer_item_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_items');
    }
};
