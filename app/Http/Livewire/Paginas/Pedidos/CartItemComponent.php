<?php

namespace App\Http\Livewire\Paginas\Pedidos;

use App\Http\Livewire\Paginas\AbstractPaginaComponent;
use App\Models\PedidoItem;
use App\Http\Livewire\Paginas\Traits\CartTrait;

class CartItemComponent extends AbstractPaginaComponent
{
    use CartTrait;
    
    public $listeners = ["cartUpdate"];
    public $delete = false;
    public function mount(PedidoItem $model)
    {
        $this->setFormProperties($model);

    }

    public function cartUpdate()
    {
        # code...
    }

    public function remove()
    {
        if($this->delete){
            $this->delete = false;
            $this->model->delete();          
            $pedido = \DB::table('pedido_items')
            ->select(\DB::raw('sum(total) as total_pedido'))
            ->where('pedido_id',  $this->current_order()->id)
            ->whereNull('deleted_at')
            ->first();
    
            $this->current_order()->update([
                'total'=>$pedido->total_pedido
            ]);  
            $this->emit('cartUpdate');
        }
       else{
            $this->delete = true;
       }
    }

    public function view()
    {
        return 'livewire.paginas.pedidos.cart-item-component';
    }
}
