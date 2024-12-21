<?php

namespace App\Livewire;

use Livewire\Component;

class AboutMePage extends Component
{
    public function render()
    {
        /* $this->dispatch('load-images'); */

        return view('livewire.pages.user.about');
    }
}
