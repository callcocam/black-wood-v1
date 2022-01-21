<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Paginas;

use Livewire\Component;

class DashboardComponent extends Component
{
    
        /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */

    public function route(){
        \Route::get('', static::class)->name('home');
    }

    public function render()
    {
        return view('livewire.paginas.dashboard-component');
    }
}
