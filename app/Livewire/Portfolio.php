<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Portfolio extends Component
{
    use WithPagination;

    #[Validate('required')]
    public $searchText = '';

    protected $queryString = ['searchText'];

    public function updatedSearchText($value)
    {
        $this->resetPage();
        $this->validate();
    }

    public function render()
    {
        $searchTerm = $this->searchText ? '%' . mb_strtolower($this->searchText, 'UTF-8') . '%' : null;

        $projects = Project::query()
            ->when($searchTerm, function ($query, $searchTerm) {
                $locale = app()->getLocale();

                $query->whereRaw('LOWER(stack) LIKE ?', [$searchTerm])
                    ->orWhereRaw('LOWER(title_' . $locale . ') LIKE ?', [$searchTerm])
                    ->orWhereRaw('LOWER(description_' . $locale . ') LIKE ?', [$searchTerm]);
            })
            ->orderBy('priority', 'desc')
            ->paginate(6);

        return view('livewire.pages.user.portfolio', compact('projects'));
    }
}
