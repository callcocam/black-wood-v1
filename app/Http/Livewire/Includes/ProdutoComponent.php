<?php

namespace App\Http\Livewire\Includes;

use Livewire\Component;
use App\Models\Produto;

class ProdutoComponent extends Component
{
    public $model;

    public function mount(Produto $model)
    {
        $this->model = $model;
    }
    public function render()
    {
        return view('livewire.includes.produto-component');
    }

    public function add()
    {
        \App\Models\Pedido::firstOrCreate([
            'user_id'=>auth()->user()->id,
            'client_id'=>auth()->user()->id,
            'mesa_id'=>$this->model->id,
            'delivery'=>0,
            'status_id'=>\App\Models\Status::isStatus('aberto')->id,
        ]);
    }
}
