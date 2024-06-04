<?php

namespace App\Livewire\Dashboard;

use App\Models\Candidate;
use App\Models\Post;
use App\Models\Votes;
use Illuminate\View\View;
use Livewire\Component;

class DashboardStatistics extends Component
{
    public function render(): View
    {
        $candidates = Candidate::all();
        $posts = Post::all();
        $votes = Votes::all();

        return view('livewire.dashboard.dashboard-statistics',
            [
                'candidates' => $candidates,
                'posts' => $posts,
                'votes' => $votes,
            ]
        );
    }
}
