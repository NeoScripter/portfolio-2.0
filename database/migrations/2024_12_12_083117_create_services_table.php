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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('image_alt_en')->nullable();
            $table->string('image_alt_fr')->nullable();
            $table->string('image_alt_ru')->nullable();
            $table->string('title_en');
            $table->string('title_fr');
            $table->string('title_ru');
            $table->string('deadline_en');
            $table->string('deadline_fr');
            $table->string('deadline_ru');
            $table->string('description_en');
            $table->string('description_fr');
            $table->string('description_ru');
            $table->boolean('is_featured')->default(true);
            $table->integer('priority')->default(1);
            $table->integer('min_price')->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
