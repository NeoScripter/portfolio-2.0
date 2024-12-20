<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => collect(glob(storage_path('app/public/services/*.*')))
            ->map(fn($path) => 'services/' . basename($path))
            ->random(),
            'image_medium' => collect(glob(storage_path('app/public/services/medium/*.*')))
            ->map(fn($path) => 'services/medium/' . basename($path))
            ->random(),
            'image_small' => collect(glob(storage_path('app/public/services/small/*.*')))
            ->map(fn($path) => 'services/small/' . basename($path))
            ->random(),
            'image_tiny' => collect(glob(storage_path('app/public/services/tiny/*.*')))
            ->map(fn($path) => 'services/tiny/' . basename($path))
            ->random(),
            'title_en' => $this->faker->words(3, true),
            'title_fr' => $this->faker->words(3, true),
            'title_ru' => $this->faker->words(3, true),
            'description_en' => $this->faker->paragraph(10),
            'description_fr' => $this->faker->paragraph(10),
            'description_ru' => $this->faker->paragraph(10),
            'deadline_en' => $this->faker->randomElement(['From 2 to 4 month', 'Within 1 month']),
            'deadline_fr' => $this->faker->randomElement(['Entre 2 et 4 mois', 'Jusqu\'a 1 mois']),
            'deadline_ru' => $this->faker->randomElement(['От 2 до 4 месяцев', 'До 1 месяца']),
            'min_price' => $this->faker->numberBetween(100, 400),
        ];
    }
}
