<?php

namespace App\Livewire\Posts;

use Illuminate\View\View;
use Livewire\Component;

class PostIndex extends Component
{
    public function render(): View
    {
        return view('livewire.posts.post-index');
    }
}
