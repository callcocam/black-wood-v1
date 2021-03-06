<?php
namespace App\Http\Livewire\Paginas\Traits;
/**
 * Administração do cart
 */
trait CartTrait
{
    
    public $quantidade = 1;

    public function add($produto,$item)
    {
       
        $item->update([
            'total'=>Calcular($item->quantidade, $item->sale_price, '*',false),
        ]);
        $this->load_items();
    }

    public function up($produto)
    {
        // \App\Models\Pedido::query()->where([
        //     'user_id'=>auth()->user()->id,
        //     'client_id'=>auth()->user()->id,
        // ])->delete();
        if($current_order = $this->current_order()){
            if($item = $current_order->items()->where('produto_id', $produto)->first()){
                $item->increment('quantidade', 1);
                $this->add($produto,$item);
            }
            else{
                $produto = \App\Models\Produto::find($produto);
                    $this->current_order()->items()->create([
                    'produto_id'=>$produto->id,
                    'quantidade'=>$this->quantidade,
                    'sale_price'=> $produto->sale_price,
                    'total'=> $produto->sale_price,
                ]);                
                return redirect()->route('cart');
            }
        }
        else{
             if(!$this->current_order()){
                $current_order =  \App\Models\Pedido::firstOrCreate([
                    'user_id'=>auth()->user()->id,
                    'client_id'=>auth()->user()->id,
                    'mesa_id'=>null,
                    'delivery'=>0,
                    'status_id'=>\App\Models\Status::isStatus('aberto')->id,
                ]);
                $produto = \App\Models\Produto::find($produto);
                $current_order->items()->create([
                    'produto_id'=>$produto->id,
                    'quantidade'=>$this->quantidade,
                    'sale_price'=> $produto->sale_price,
                    'total'=> $produto->sale_price,
                ]);
                return redirect()->route('cart');
             }else{
                $produto = \App\Models\Produto::find($produto);
                $this->current_order()->items()->create([
                    'produto_id'=>$produto->id,
                    'quantidade'=>$this->quantidade,
                    'sale_price'=> $produto->sale_price,
                    'total'=> $produto->sale_price,
                ]);
                
                return redirect()->route('cart');
             }
           
        }
        //$this->quantidade++;
    }

    public function down($produto)
    {
        if($current_order = $this->current_order()){
            if($item = $current_order->items()->where('produto_id', $produto)->first()){
                if($item->quantidade == 1){
                    $item->delete();  
                    $this->load_items();
                }    
                else{
                    $item->decrement('quantidade', 1);   
                    $this->add($produto,$item);
                }
            }                  
            
        }
    }
    public function load_items()
    {
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

    public function item()
    {
        
    }
}
