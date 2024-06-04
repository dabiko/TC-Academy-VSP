<?php

namespace App\Livewire\Ballots;

use App\Models\Candidate;
use App\Models\Post;
use App\Models\Votes;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class BallotCandidates extends Component
{

    #[On('dispatch-ballot-casted')]
    public function render(): View
    {
        $candidates = Candidate::all();
        $posts = Post::all();
        $votes = Votes::all();

        return view('livewire.ballots.ballot-candidates',
            [
                'candidates' => $candidates,
                'posts' => $posts,
                'votes' => $votes,
            ]
        );
    }
}
