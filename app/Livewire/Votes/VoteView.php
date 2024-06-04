<?php

namespace App\Livewire\Votes;

use App\Livewire\Forms\CandidateForm;
use App\Models\Candidate;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class VoteView extends Component
{
    public CandidateForm $form;

    public bool $ViewVoteModal = false;

    #[On('dispatch-view-vote')]
    public function setCandidateEdit(Candidate $id): void
    {
        $this->form->setCandidate($id);

        $this->ViewVoteModal = true;

    }
    public function render(): View
    {
         $posts = Post::all();

        return view('livewire.votes.vote-view',
         [
                'posts' => $posts,
         ]
        );
    }
}
