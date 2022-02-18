<?php

namespace App\Http\Livewire\Paginas\Posts;

use App\Http\Livewire\Paginas\AbstractPaginaComponent;

class ListComponent extends AbstractPaginaComponent
{
    
    public function route(){
        \Route::get('posts', static::class)->name('posts');
    }

    public function view()
    {
        return 'livewire.paginas.posts.list-component';
    }
}
