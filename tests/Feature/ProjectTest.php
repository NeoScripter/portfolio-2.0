<?php

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a project', function () {
    $data = Project::factory()->create([
            'title_en' => 'Test Project',
            'title_fr' => 'Projet de test',
            'title_ru' => 'Тестовый проект',
            'description_en' => 'Test project description in English.',
            'description_fr' => 'Description du projet de test en français.',
            'description_ru' => 'Описание тестового проекта на русском.',
            'image' => 'test_image_path.jpg',
            'is_featured' => true,
            'priority' => 1,
            'stack' => ['Laravel', 'PHP', 'JavaScript'],
            'text_content_en' => ['Some content in English.'],
            'text_content_fr' => ['Du contenu en français.'],
            'text_content_ru' => ['Содержимое на русском.'],
            'website_link' => 'http://example.com',
    ])->toArray();

    $response = $this->post(route('admin.project.store'), $data);

    $response->assertRedirect(route('login'));

    $this->assertDatabaseHas('projects', [
        'title_en' => $data['title_en'],
        'description_en' => $data['description_en'],
        'image' => $data['image']
    ]);
});
