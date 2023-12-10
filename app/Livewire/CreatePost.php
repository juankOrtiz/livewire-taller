<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreatePost extends Component
{
    #[Rule('required', message: 'El título es obligatorio')]
    #[Rule('min:4', message: 'El título es muy corto')]
    public $title = '';

    #[Rule('required', message: 'El contenido es obligatorio')]
    public $content = '';

    public function save() {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->redirect('/posts');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}