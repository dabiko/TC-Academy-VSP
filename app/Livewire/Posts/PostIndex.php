<?php

namespace App\Livewire\Posts;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class PostIndex extends Component
{
    #[Title('Posts')]
    public function render(): View
    {
        return view('livewire.posts.post-index');
    }
}
