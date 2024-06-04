<?php

namespace App\Livewire\Ballots;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class BallotIndex extends Component
{
    #[Title('Ballots')]
    public function render(): View
    {
        return view('livewire.ballots.ballot-index');
    }
}
