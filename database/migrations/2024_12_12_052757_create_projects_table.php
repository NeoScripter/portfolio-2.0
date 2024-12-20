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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('image_medium')->nullable();
            $table->string('image_small')->nullable();
            $table->string('image_tiny')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('featured_image_medium')->nullable();
            $table->string('featured_image_small')->nullable();
            $table->string('featured_image_tiny')->nullable();
            $table->string('image_alt_en')->nullable();
            $table->string('image_alt_fr')->nullable();
            $table->string('image_alt_ru')->nullable();
            $table->string('title_en');
            $table->string('title_fr');
            $table->string('title_ru');
            $table->string('description_en');
            $table->string('description_fr');
            $table->string('description_ru');
            $table->boolean('is_featured')->default(true);
            $table->integer('priority')->default(1)->nullable();
            $table->json('stack')->nullable();
            $table->json('text_content_en')->nullable();
            $table->json('text_content_fr')->nullable();
            $table->json('text_content_ru')->nullable();
            $table->json('image_content')->nullable();
            $table->json('image_content_alt_en')->nullable();
            $table->json('image_content_alt_fr')->nullable();
            $table->json('image_content_alt_ru')->nullable();
            $table->string('website_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
