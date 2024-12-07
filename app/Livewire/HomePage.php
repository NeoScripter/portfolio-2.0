<?php

namespace App\Livewire;

use Livewire\Component;

class HomePage extends Component
{
    public $title = 'Airplane';

    public function render()
    {
        return view('livewire.pages.user.home');
    }
}
