<?php

namespace App\Livewire\Candidate;

use App\Livewire\Forms\CandidateForm;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class CandidateCreate extends Component
{
    public CandidateForm $form;

    public bool $CreateCandidateModal = false;


     public function save(): void
    {
        $this->validate();

        $user = $this->form->store();

        is_null($user)
            ? $this->dispatch('notify', title: 'success', message:  ' '.$this->form->name. ' created successfully')
            : $this->dispatch('notify', title: 'fail', message: 'Ops!! Something went wrong');

        $this->dispatch('dispatch-candidate-created')->to(CandidateTable::class);


        $this->CreateCandidateModal = false;

    }

    public function render(): View
    {
        $posts= Post::all();

        return view('livewire.candidate.candidate-create',
            [
                'posts' => $posts,
            ]
        );
    }
}
