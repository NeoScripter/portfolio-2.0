<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Portfolio extends Component
{

    public function render()
    {
        $this->dispatch('load-images');

        return view('livewire.pages.user.portfolio', [
            'projects' => Project::orderBy('priority', 'desc')->paginate(6),
        ]);
    }
}
