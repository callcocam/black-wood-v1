<?php

namespace App\Http\Livewire\Includes;


use App\Http\Livewire\Paginas\AbstractPaginaComponent;
use App\Models\Categoria;

class MenuComponent extends AbstractPaginaComponent
{
    public function view()
    {
        return 'livewire.includes.menu-component';
    }

    
    protected function query()
    {
        return Categoria::query();
    }

    public function getCategorias($type="post")
    {
        return $this->query()->where('type',$type)->get();
    }
}
