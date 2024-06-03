<?php

namespace App\Livewire\Candidate;

use App\Livewire\Forms\CandidateForm;
use App\Models\Candidate;
use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class CandidateEdit extends Component
{

    public CandidateForm $form;

    public bool $UpdateCandidateModal = false;


    #[On('dispatch-edit-candidate')]
    public function set_candidate(Candidate $id): void
    {
        $this->form->setCandidate($id);

        $this->UpdateCandidateModal = true;
    }

    public function save(): void
    {
        $this->validate();

        try{

            $update = $this->form->update();

            is_null($update)
                ? $this->dispatch('notify', title: 'success', message:  ' '.$this->form->name. ' Updated successfully')
                : $this->dispatch('notify', title: 'fail', message: 'Ops!! Something went wrong');

            $this->UpdateCandidateModal = false;

            $this->dispatch('dispatch-candidate-updated')->to(CandidateTable::class);

        }catch (QueryException $e){

            $errorCode = $e->errorInfo[1];

            ($errorCode == 1062)
                ? $this->dispatch('notify', title: 'fail', message: 'we have a duplicate entry problem')
                : $this->dispatch('notify', title: 'fail', message: 'Something strange happened ');
        }

    }

    public function render(): View
    {
        $posts = Post::all();
        return view('livewire.candidate.candidate-edit',
            [
                'posts' => $posts,
            ]
        );
    }
}
