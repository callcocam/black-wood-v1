<?php

namespace App\Http\Livewire\Admin;

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
        \Route::get('', static::class)->name('admin');
        \Route::get('/dashboard', static::class)->name('dashboard');
    }

    public function render()
    {
        return view('livewire.admin.dashboard-component')->layout(theme_layout("app"));
    }
}
