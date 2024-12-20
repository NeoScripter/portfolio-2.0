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
        $desc_en = str_repeat('This is the description of the current project in English. ', 10);
        $desc_fr = str_repeat('Ceci est la description du projet actuel en francais. ', 10);
        $desc_ru = str_repeat('Это описание данного проекта на русском языке. ', 10);

        $image_content_original = collect(glob(storage_path('app/public/projects/*.*')))
        ->map(fn($path) => 'projects/' . basename($path))
        ->random();

        $image_content_medium = collect(glob(storage_path('app/public/projects/medium/*.*')))
        ->map(fn($path) => 'projects/medium/' . basename($path))
        ->random();

        $image_content_small = collect(glob(storage_path('app/public/projects/small/*.*')))
        ->map(fn($path) => 'projects/small/' . basename($path))
        ->random();

        $image_content_tiny = collect(glob(storage_path('app/public/projects/tiny/*.*')))
        ->map(fn($path) => 'projects/tiny/' . basename($path))
        ->random();

        $image_content = [
            'original' => $image_content_original,
            'medium' => $image_content_medium,
            'small' => $image_content_small,
            'tiny' => $image_content_tiny,
        ];


        return [
            'image' => collect(glob(storage_path('app/public/projects/*.*')))
            ->map(fn($path) => 'projects/' . basename($path))
            ->random(),
            'image_medium' => collect(glob(storage_path('app/public/projects/medium/*.*')))
            ->map(fn($path) => 'projects/medium/' . basename($path))
            ->random(),
            'image_small' => collect(glob(storage_path('app/public/projects/small/*.*')))
            ->map(fn($path) => 'projects/small/' . basename($path))
            ->random(),
            'image_tiny' => collect(glob(storage_path('app/public/projects/tiny/*.*')))
            ->map(fn($path) => 'projects/tiny/' . basename($path))
            ->random(),
            'featured_image' => collect(glob(storage_path('app/public/projects/*.*')))
            ->map(fn($path) => 'projects/' . basename($path))
            ->random(),
            'featured_image_medium' => collect(glob(storage_path('app/public/projects/medium/*.*')))
            ->map(fn($path) => 'projects/medium/' . basename($path))
            ->random(),
            'featured_image_small' => collect(glob(storage_path('app/public/projects/small/*.*')))
            ->map(fn($path) => 'projects/small/' . basename($path))
            ->random(),
            'featured_image_tiny' => collect(glob(storage_path('app/public/projects/tiny/*.*')))
            ->map(fn($path) => 'projects/tiny/' . basename($path))
            ->random(),
            'stack' => $this->faker->randomElements(['React', 'PHP', 'Rust', 'Laravel', 'HTML', 'Tailwind', 'CSS', 'JavaScript', 'WordPress'], rand(2, 6)),
            'title_en' => 'This is the project title',
            'title_fr' => 'C\'est le titre du projet',
            'title_ru' => 'Это название данного проекта',
            'is_featured' => true,
            'description_en' => $desc_en,
            'description_fr' => $desc_fr,
            'description_ru' => $desc_ru,
            'website_link' => $this->faker->url,
            'image_content_alt_en' => $this->faker->sentences(5),
            'image_content_alt_fr' => $this->faker->sentences(5),
            'image_content_alt_ru' => $this->faker->sentences(5),
            'text_content_en' => [$desc_en, $desc_en, $desc_en, $desc_en, $desc_en],
            'text_content_fr' => [$desc_fr, $desc_fr, $desc_fr, $desc_fr, $desc_fr],
            'text_content_ru' => [$desc_ru, $desc_ru, $desc_ru, $desc_ru, $desc_ru],
            'image_content' => [$image_content, $image_content, $image_content,$image_content],
        ];
    }
}
