<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Traits\EncryptDecrypt;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class PostDelete extends Component
{

    use EncryptDecrypt;

    #[Locked]
    public string $id;

    #[Locked]
    public string $name;

    public bool $DeletePostModal = false;

    #[On('dispatch-delete-post')]
    public function set_post($id, $name): void
    {
        $this->id = $id;
        $this->name = $name;

        $this->DeletePostModal  = true;
    }

     public function deletePost(): void
    {
        $delete = Post::destroy($this->decryptId($this->id));

        ($delete)
            ? $this->dispatch('notify', title: 'success', message:  ' '.$this->name. ' Deleted successfully')
            : $this->dispatch('notify', title: 'fail', message: 'Ops!! Something went wrong');

        $this->dispatch('dispatch-post-deleted')->to(PostTable::class);

        $this->DeletePostModal  = false;

    }
    public function render(): View
    {
        return view('livewire.posts.post-delete');
    }
}
