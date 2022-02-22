<?php
namespace App\Http\Livewire\Paginas\Traits;
/**
 * Administração do cart
 */
trait CartTrait
{
    
    public $quantidade = 1;

    public function add($produto)
    {
        if($item = $this->current_order()->items()->where('produto_id', $produto)->first()){
            $item->update([
                'total'=>Calcular($item->quantidade, $item->sale_price, '*',false),
            ]);
        }
        else{
            $produto = \App\Models\Produto::find($produto);
            $this->current_order()->items()->create([
                'produto_id'=>$produto->id,
                'quantidade'=>$this->quantidade,
                'sale_price'=> $produto->sale_price,
                'total'=> $produto->sale_price,
            ]);
        }
    
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

    public function up($produto)
    {
        if($item = $this->current_order()->items()->where('produto_id', $produto)->first()){
            $item->increment('quantidade', 1);
        }
        //$this->quantidade++;
        $this->add($produto);
    }

    public function down($produto)
    {
        if($item = $this->current_order()->items()->where('produto_id', $produto)->first()){
            $item->decrement('quantidade', 1);
        }
        $this->add($produto);
    }

    public function item()
    {
        
    }
}
