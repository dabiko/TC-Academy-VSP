<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use App\Traits\EncryptDecrypt;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class PostView extends Component
{

    use EncryptDecrypt;

    public PostForm $form;

    public bool $ViewPostModal = false;

    public string $user_id = '';

    #[On('dispatch-view-post')]
    public function setPostEdit(Post $id): void
    {
        $this->form->setPost($id);

        $this->ViewPostModal = true;

    }

    public function render(): View
    {
        return view('livewire.posts.post-view');
    }
}
