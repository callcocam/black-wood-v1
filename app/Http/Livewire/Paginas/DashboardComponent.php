<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas;

use Livewire\Component;

class DashboardComponent extends AbstractPaginaComponent
{
    
        /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */

    protected $perPage = 1000;

    public function route(){
        \Route::get('', static::class)->name('home');
    }

    public function view()
    {
        return 'livewire.paginas.dashboard-component';
    }

    
   protected function query()
   {
      
        if(auth()->user()->pedido()->whereNull('mesa_id')->count()){
          return \App\Models\Mesa::query();
        }
        return null;
   }
}
