<?php

use App\Models\Footer;
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


        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(Footer::IS_ACTIVE);
            $table->boolean('order')->default(1);
            $table->timestamps();
        });
        Schema::create('footer_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('footer_id')->constrained('footers')->cascadeOnDelete();
            $table->string('locale', 2)->index();
            $table->string('title')->nullable();
            $table->unique(['footer_id', 'locale']);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
