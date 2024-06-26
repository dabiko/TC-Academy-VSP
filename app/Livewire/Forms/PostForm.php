<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PostForm extends Form
{
     public ?Post  $post;

    #[Rule('required', message: ' Post name is required')]
    #[Rule('string', message: 'Invalid post name')]
    #[Rule('min:4', message: 'Post name  can not be less than 4 characters')]
    #[Rule('max:20', message: 'Post name  can not be more than 20 characters')]
    #[Rule('unique:'.Post::class.',name', message: ' :input has already been created')]
    public string $name;

    public function setPost(Post $post): void
    {
        $this->post = $post;

        $this->name = $post->name;

    }

    public function store(): void
    {
            Post::create([
                'name' => str($this->name)->squish(),
                'user_id' => Auth::id(),
                'slug' => Str::slug($this->name, '-'),
                'status' => 1,
            ]);

            $this->reset($this->name = ' ');
    }

    public function update(): void
    {
        $this->post->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name, '-'),
            'updated_by' => Auth::id(),
        ]);
    }
}
