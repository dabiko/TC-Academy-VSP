<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use App\Traits\EncryptDecrypt;
use Illuminate\Database\QueryException;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class PostEdit extends Component
{
    use EncryptDecrypt;

    public PostForm $form;

    public bool $EditPostModal = false;


    #[On('dispatch-edit-post')]
    public function set_post(Post $id): void
    {
        $this->form->setPost($id);

        $this->EditPostModal = true;
    }

    public function edit(): void
    {
        $this->validate();

        try{

            $update = $this->form->update();

            is_null($update)
                ? $this->dispatch('notify', title: 'success', message:  ' '.$this->form->name. ' Updated successfully')
                : $this->dispatch('notify', title: 'fail', message: 'Ops!! Something went wrong');

            $this->EditPostModal = false;

            $this->dispatch('dispatch-post-updated')->to(PostTable::class);

        }catch (QueryException $e){

            $errorCode = $e->errorInfo[1];

            ($errorCode == 1062)
                ? $this->dispatch('notify', title: 'fail', message: 'we have a duplicate entry problem')
                : $this->dispatch('notify', title: 'fail', message: 'Something strange happened ');
        }

    }

    public function render(): View
    {
        return view('livewire.posts.post-edit');
    }
}
