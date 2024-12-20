<?php

namespace App\Livewire;

use App\Models\Project as ModelsProject;
use Livewire\Component;

class Project extends Component
{
    public $project;

    public function mount($id) {
        $this->project = ModelsProject::select([
            'image', 'image_medium', 'image_small', 'image_tiny', 'featured_image', 'image_alt_' . app()->getLocale(), 'title_' . app()->getLocale(),
            'description_' . app()->getLocale(), 'stack', 'text_content_' . app()->getLocale(),
            'image_content_alt_' . app()->getLocale(), 'website_link', 'image_content'
        ])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pages.user.project');
    }
}
