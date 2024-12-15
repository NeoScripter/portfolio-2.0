<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.user.services', [
            'services' => Service::paginate(4),
        ]);
    }
}
