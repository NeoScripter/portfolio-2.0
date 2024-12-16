<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Portfolio extends Component
{

    public function render()
    {
        return view('livewire.pages.user.portfolio', [
            'projects' => Project::paginate(6),
        ]);
    }
}
