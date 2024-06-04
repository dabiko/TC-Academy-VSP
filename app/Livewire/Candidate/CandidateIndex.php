<?php

namespace App\Livewire\Candidate;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class CandidateIndex extends Component
{
    #[Title('Candidates')]
    public function render(): View
    {
        return view('livewire.candidate.candidate-index');
    }
}
