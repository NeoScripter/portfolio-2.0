<?php

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can create a project', function () {
    $data = Service::factory()->create()->toArray();

    $response = $this->post(route('admin.service.store'), $data);

    $response->assertRedirect(route('login'));

    $this->assertDatabaseHas('services', [
        'title_en' => $data['title_en'],
        'description_en' => $data['description_en'],
        'image' => $data['image']
    ]);
});
