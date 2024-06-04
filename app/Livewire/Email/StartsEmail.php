<?php

namespace App\Livewire\Email;

use App\Models\Votes;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class StartsEmail extends Component
{

    #[On('dispatch-ballot-email')]
    public function render(): View
    {
        $stats = Votes::all();
        return view('livewire.email.starts-email',
        [
            'stats' => $stats,
        ]
        );
    }
}
