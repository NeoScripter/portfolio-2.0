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

    /**
     * Reset pagination when the search term changes.
     */
    public function updatedSearchText($value)
    {
        $this->resetPage();
        $this->dispatch('load-images');
        $this->validate();
    }

    /**
     * Render the view with paginated projects.
     */
    public function render()
    {
        $this->dispatch('load-images');

        $searchTerm = "%{$this->searchText}%";

        // Get paginated projects
        $projects = Project::when($this->searchText, function ($query) use ($searchTerm) {
            $query->where('stack', 'LIKE', $searchTerm);
        })
            ->orderBy('priority', 'desc')
            ->paginate(6);

        return view('livewire.pages.user.portfolio', compact('projects'));
    }
}

/* return view('livewire.pages.user.portfolio', [
    'projects' => Project::orderBy('priority', 'desc')->paginate(6),
]); */
