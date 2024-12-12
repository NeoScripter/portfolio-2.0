<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => collect(glob(storage_path('app/public/projects/*.*')))
            ->map(fn($path) => 'projects/' . basename($path))
            ->random(),
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(10),
            'website_link' => $this->faker->url,
            'text_content' => json_encode($this->faker->paragraphs(5)),
        ];
    }
}
