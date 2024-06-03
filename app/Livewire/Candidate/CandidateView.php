<?php

namespace App\Livewire\Candidate;

use App\Livewire\Forms\CandidateForm;
use App\Models\Candidate;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class CandidateView extends Component
{

     public CandidateForm $form;

    public bool $ViewCandidateModal = false;

    #[On('dispatch-view-candidate')]
    public function setCandidateEdit(Candidate $id): void
    {
        $this->form->setCandidate($id);

        $this->ViewCandidateModal = true;

    }
    public function render(): View
    {
       $posts = Post::all();
        return view('livewire.candidate.candidate-view',
            [
                'posts' => $posts,
            ]
        );
    }
}
