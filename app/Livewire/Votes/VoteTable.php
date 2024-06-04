<?php

namespace App\Livewire\Votes;

use App\Models\Candidate;
use App\Models\Post;
use App\Models\Votes;
use App\Traits\EncryptDecrypt;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class VoteTable extends Component
{

        use EncryptDecrypt;

    use WithPagination;
    #[Url]
    public int $per_page = 5;

    #[Url(history: true)]
    public string $search = '';

    #[Url(history: true)]
    public string $group = '';

    #[Locked]
    #[Url(history: true)]
    public string $sortBy = 'id';

    #[Url(history: true)]
    public string  $sortDirection = 'DESC';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function setSortBy($sortByField): void
    {
        if ($this->sortBy === $sortByField){

            $this->sortDirection = ($this->sortDirection == "ASC") ? 'DESC' : "ASC";
            return;
        }

        $this->sortBy = $sortByField;
        $this->sortDirection = 'DESC';
    }


    public function render(): View
    {
        $candidates = Candidate::search($this->search)
            ->when($this->group !== '', function ($query) {
                $query->where('post_id', $this->group);
            })
            ->orderBy($this->sortBy,$this->sortDirection)
            ->paginate($this->per_page);

       $posts = Post::all();
       $votes = Votes::all();

        return view('livewire.votes.vote-table',
            [
                'votes' => $votes,
                'posts' => $posts,
                'candidates' => $candidates,
            ]
        );
    }
}
