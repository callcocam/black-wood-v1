<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas;


use Livewire\{Component, WithPagination};

abstract class AbstractPaginaComponent extends Component
{
    use WithPagination;

    public $model;
    
    public $data;

    protected $perPage = 12;
    
   abstract protected function view();
   
    /**
     * @param null $model
     */
    protected function setFormProperties($model = null)
    {
        $this->model = $model;
        if ($model) {
            $this->data = $model->toArray();
        } else if (is_array($model)) {
            $this->data = $model;
        }
    }

   protected function query()
   {
       return null;
   }

    public function render()
    {
        $current_order_items_count = 0;
        if($current_order_items = $this->current_order_items()){
            $current_order_items_count = $current_order_items->count();
        }
        return view($this->view())
        ->with('cupom', 0)
        ->with('isPedido', $this->isPedido())
        ->with('current_order_items_count', $current_order_items_count)
        ->with('current_order', $this->current_order())
        ->with('model', $this->model)
        ->with('models', $this->models());
    }


    protected function models(){
        if($this->query()){
            return $this->query()->simplePaginate($this->perPage);
        }
        return null;
    }

    public function isPedido()
    {
       return auth()->user()->pedido()->where('current_order',1)->count();
    }

    
    public function current_order()
    {
       return auth()->user()->current_order;
    }
    
    public function current_order_items()
    {
        if($items = $this->current_order())
            return $items->items;

            return null;
    }
}
