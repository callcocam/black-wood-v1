<?php

namespace App\Http\Livewire\Paginas\Pedidos;

use App\Http\Livewire\Paginas\AbstractPaginaComponent;

class CartComponent extends AbstractPaginaComponent
{

    public $listeners = ["cartUpdate"];
    public function route(){
        \Route::get('meu-carrinho', static::class)->name('cart');
    }

    public function cartUpdate()
    {
        # code...
    }
    public function view()
    {
        return 'livewire.paginas.pedidos.cart-component';
    }
}
