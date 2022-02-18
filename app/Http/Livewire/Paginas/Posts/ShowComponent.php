<?php

namespace App\Http\Livewire\Paginas\Posts;

use App\Http\Livewire\Paginas\AbstractPaginaComponent;
use App\Models\Post;

class ShowComponent extends AbstractPaginaComponent
{
     
    public function route(){
        \Route::get('posts/{model}', static::class)->name('posts.show');
    }

    
    public function mount(Post $model)
    {
        $this->setFormProperties($model);
    }

    public function view()
    {
        return 'livewire.paginas.posts.show-component';
    }
}
