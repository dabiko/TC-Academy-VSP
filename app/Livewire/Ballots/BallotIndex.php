<?php

namespace App\Livewire\Ballots;

use Illuminate\View\View;
use Livewire\Component;

class BallotIndex extends Component
{
    public function render(): View
    {
        return view('livewire.ballots.ballot-index');
    }
}
