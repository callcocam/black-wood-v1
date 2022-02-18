<?php

namespace App\Http\Livewire\Paginas\Produtos;

use App\Http\Livewire\Paginas\AbstractPaginaComponent;
use App\Models\Produto;

class ShowComponent extends AbstractPaginaComponent
{

    public function route(){
        \Route::get('produtos/{model}', static::class)->name('produtos.show');
    }

    public function mount(Produto $model)
    {
        $this->setFormProperties($model);
    }

    public function view()
    {
        return 'livewire.paginas.produtos.show-component';
    }
}
