<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class HomePage extends Component
{
    public $projects;

    public function mount() {
        $this->projects = Project::where('is_featured', true)->latest()->limit(9)->get()->map(function ($project, $index) {
            return [
                'index' => $index,
                'image' => Storage::url($project->image),
                'title' => $project->title,
                'desc' => Str::words($project->description, 25),
                'link' => $project->website_link,
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.pages.user.home');
    }
}
