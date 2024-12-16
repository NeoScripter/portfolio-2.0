<?php

namespace App\Livewire;

use App\Models\Project as ModelsProject;
use Livewire\Component;

class Project extends Component
{
    public $project;

    public function mount($id) {
        $this->project = ModelsProject::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pages.user.project');
    }
}
