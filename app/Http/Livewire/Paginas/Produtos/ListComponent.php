<?php

namespace App\Http\Livewire\Paginas\Produtos;

use App\Http\Livewire\Paginas\AbstractPaginaComponent;

class ListComponent extends AbstractPaginaComponent
{
    
    public function route(){
        \Route::get('produtos', static::class)->name('produtos');
    }


    public function view()
    {
        return 'livewire.paginas.produtos.list-component';
    }

    protected function query()
    {
        return \App\Models\Produto::query();
    }
}
