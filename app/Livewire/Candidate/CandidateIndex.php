<?php

namespace App\Livewire\Candidate;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class CandidateIndex extends Component
{
    public function render(): View
    {
        return view('livewire.candidate.candidate-index');
    }
}
