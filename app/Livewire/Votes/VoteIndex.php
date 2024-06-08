<?php

namespace App\Livewire\Votes;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class VoteIndex extends Component
{
    #[Title('Votes')]
    public function render(): View
    {
        return view('livewire.votes.vote-index');
    }
}
