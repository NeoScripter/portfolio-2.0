<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'text_content_en' => 'array',
        'image_content_alt_en' => 'array',
        'text_content_fr' => 'array',
        'image_content_alt_fr' => 'array',
        'text_content_ru' => 'array',
        'image_content_alt_ru' => 'array',
        'image_content' => 'array',
        'stack' => 'array',
    ];
}
