<?php

namespace App\Livewire\Posts;

use App\Livewire\Forms\PostForm;
use Illuminate\Database\QueryException;
use Illuminate\View\View;
use Livewire\Component;

class PostCreate extends Component
{
     public PostForm $form;

    public bool $CreatePostModal = false;

      public function save(): void
    {
        $this->validate();

        foreach ($this->validate() as $key => $value) {
            try{

                $post = $this->form->store();

                is_null($post)
                    ? $this->dispatch('notify', title: 'success', message:  ' '.$value. ' created successfully')
                    : $this->dispatch('notify', title: 'fail', message: 'Ops!! Something went wrong');

                $this->dispatch('dispatch-post-created')->to(PostTable::class);

            }catch (QueryException $e){

                $errorCode = $e->errorInfo[1];

                ($errorCode == 1062)
                    ? $this->dispatch('notify', title: 'fail', message: 'we have a duplicate entry problem')
                    : $this->dispatch('notify', title: 'fail', message: 'Something strange happened ');
            }
        }

    }

    public function render(): View
    {
        return view('livewire.posts.post-create');
    }
}
