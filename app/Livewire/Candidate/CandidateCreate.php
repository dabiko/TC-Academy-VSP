<?php

namespace App\Livewire\Candidate;

use App\Livewire\Forms\CandidateForm;
use Illuminate\View\View;
use Livewire\Component;

class CandidateCreate extends Component
{
    public CandidateForm $form;

    public bool $CreateCandidateModal = false;

    public function render(): View
    {
        return view('livewire.candidate.candidate-create');
    }
}
