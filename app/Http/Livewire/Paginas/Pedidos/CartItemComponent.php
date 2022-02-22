<?php

namespace App\Http\Livewire\Paginas\Pedidos;

use App\Http\Livewire\Paginas\AbstractPaginaComponent;
use App\Models\PedidoItem;
use App\Http\Livewire\Paginas\Traits\CartTrait;

class CartItemComponent extends AbstractPaginaComponent
{
    use CartTrait;
    
    public $listeners = ["cartUpdate"];
    public function mount(PedidoItem $model)
    {
        $this->setFormProperties($model);

    }

    public function cartUpdate()
    {
        # code...
    }

    public function view()
    {
        return 'livewire.paginas.pedidos.cart-item-component';
    }
}
