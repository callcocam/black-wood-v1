<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Roles;

use App\Models\Auth\Acl\Role;
use Tall\Table\TableComponent;
use Tall\Table\Fields\Column;
use Tall\Table\Fields\Action;
use Tall\Table\Fields\Link;
use Tall\Table\Fields\Delete;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

final class ListComponent extends TableComponent
{
    use AuthorizesRequests;
    
    public function mount()
    {
        $this->authorize(Route::currentRouteName());
    }
     /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota principal do crud, lista todos os dados
    |
    */

    public function route(){
        Route::get('/roles', static::class)->name('admin.roles');
    }

    /*
    |--------------------------------------------------------------------------
    |  Features query
    |--------------------------------------------------------------------------
    | Inicia a consulta ao banco de dados
    |
    */
    protected function query(){
        return Role::query();
    }

   
     /*
    |--------------------------------------------------------------------------
    |  Features tableAttr
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do table
    |
    */
    protected function tableAttr(): array
    {
        return [
           'tableTitle' => __('Role'),
       ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Features actions
    |--------------------------------------------------------------------------
    | Realacionado as ações de cada registro, como editar deletar e visualizar
    |
    */
    protected function actions(){

        return [
            Link::make('Edit')->route('admin.role.edit')->xs()->icon('pencil-alt')->primary(),
            Delete::make('Delete')->xs()->icon('trash')->negative(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Features columns
    |--------------------------------------------------------------------------
    | Configuração das colunas da tabel o cards de exibição
    |
    */
    protected function columns(){
        return [
            Column::make('Name')->searchable()->sortable()->makeInputText('name'),
            //Column::make('Name')->searchable()->livewire()->sortable()->makeInputText('name'),
            //Column::make('Name')->searchable()->view('_coner')->sortable()->makeInputText('name'),
            // Column::make('Name')->searchable()->format(function($model, $column){
            //     return view(include_table("_coner"), compact('model','column'));
            // })->sortable()->makeInputText('name'),

            // Column::make('Email')->sortable()->makeInputText('email'),
            // Column::make('Status','status.name')->format(function($model, $column){
            //     return view(include_table("_status"), compact('model','column'));
            // })->makeInputStatus(),
            Column::make('Status','status.name')->field('status_id')
            ->makeInputStatus()
            ->status(),
            Column::make('Created At')->format(function($model, $column){
                return $model->created_at->format('d/m/Y');
            })
            ->field('created_at_formatted')
            ->makeInputDatePicker('created_at'),
        ];
    }
}
