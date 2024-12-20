<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;

    public $faqs;

    public function mount() {
        $this->faqs = __('faq');
    }

    public function render()
    {
        $this->dispatch('load-images');

        return view('livewire.pages.user.services', [
            'services' => Service::orderBy('priority', 'desc')->paginate(4),
        ]);

    }
}
