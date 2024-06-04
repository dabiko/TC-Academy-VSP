<?php

namespace App\Livewire\Ballots;

use App\Models\Candidate;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Component;

class BallotCandidates extends Component
{
    public function render(): View
    {
        $candidates = Candidate::all();
        $posts = Post::all();

        return view('livewire.ballots.ballot-candidates',
            [
                'candidates' => $candidates,
                'posts' => $posts
            ]
        );
    }
}
