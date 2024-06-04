<?php

namespace App\Livewire\Votes;

use Illuminate\View\View;
use Livewire\Component;

class VoteIndex extends Component
{
    public function render(): View
    {
        return view('livewire.votes.vote-index');
    }
}
