<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class HomePage extends Component
{
    public $projects;
    public $services;
    public $reviews;

    public function mount() {
        $this->projects = Project::where('is_featured', true)->select(['id', 'featured_image', 'image_alt_en', 'image_alt_fr', 'image_alt_ru', 'title_en', 'title_fr', 'title_ru', 'description_en', 'description_fr', 'description_ru'])->latest()->limit(9)->get()->map(function ($project, $index) {
            return [
                'index' => $index,
                'image' => Storage::url($project->featured_image),
                'image_alt' => $project->{'image_alt_' . app()->getLocale()},
                'title' => $project->{'title_' . app()->getLocale()},
                'desc' => Str::words($project->{'description_' . app()->getLocale()}, 25),
                'link' => $project->website_link,
            ];
        })->toArray();

        $this->reviews = __('reviews');

        $this->services = Service::where('is_featured', true)->latest()->limit(4)->get();
    }

    public function render()
    {
        return view('livewire.pages.user.home');
    }
}
