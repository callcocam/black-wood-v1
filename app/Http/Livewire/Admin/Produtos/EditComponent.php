<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Produtos;

use App\Models\Produto;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\Currency;
use Tall\Form\Fields\Select;
use Tall\Form\Fields\Textarea;
use Tall\Form\Fields\Upload;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class EditComponent extends FormComponent
{
    use AuthorizesRequests;

    /*
    |--------------------------------------------------------------------------
    |  Features route
    |--------------------------------------------------------------------------
    | Rota de edição de um cadastro
    |
    */
    public function route(){
        Route::get('/produto/{model}/edit', static::class)->name('admin.produto.edit');
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Produto $model)
    {
        $this->authorize(Route::currentRouteName());
        
        $this->setFormProperties($model); // $produto from hereon, called $this->model
    }

   /*
    |--------------------------------------------------------------------------
    |  Features formAttr
    |--------------------------------------------------------------------------
    | Inicia as configurações basica do formulario
    |
    */
    protected function formAttr(): array
    {
        return [
           'formTitle' => __('Produto'),
           'formAction' => __('Edit'),
           'wrapWithView' => false,
           'showDelete' => false,
       ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Features fields
    |--------------------------------------------------------------------------
    | Inicia a configuração do campos disponiveis no formulario
    |
    */
    protected function fields(): array
    {
        return [
            Input::make('Name')->rules('required')->span(7),
            Select::make('Categoria','categoria_id')->span(5)->rules('required')
            ->options(\App\Models\Categoria::query()->where('type','product')->pluck('name','id')->toArray()),
            Input::make('Estoque','stock')->span(4)->rules('required'),
            Currency::make('Preço de custo','cost_price')->span(4)->rules('required'),
            Currency::make('Preço de venda','sale_price')->span(4)->rules('required'),
            Textarea::make('Observations', 'description.content')
            ->placeholder('Brief description for your profile. URLs are hyperlinked.'),
            Upload::make('Cover', 'cover')->placeholder("Select Your Image"),  
            Radio::make('Status', 'status_id')->status()->lg()
        ];
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features saveAndGoBackResponse
    |--------------------------------------------------------------------------
    | Rota de redirecionamento apos a criação bem sucedida de um novo registro
    |
    */
     /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndGoBackResponse()
    {
          return redirect()->route("admin.produtos");
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features goBack
    |--------------------------------------------------------------------------
    | Rota de retorno para a lista de dados
    |
    */
    public function goBack()
    {       
        return route("admin.produtos");
    }
}
