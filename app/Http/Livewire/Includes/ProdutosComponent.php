<?php

namespace App\Http\Livewire\Includes;

use App\Http\Livewire\Paginas\AbstractPaginaComponent;
use App\Models\Produto;

class ProdutosComponent extends AbstractPaginaComponent
{
    public $model;

    public function mount(Produto $model)
    {
        $this->model = $model;
    }
    public function view()
    {
        return 'livewire.includes.produtos-component';
    }

    protected function query()
    {
        return Produto::query();
    }
}
