<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Tall\Form\FormComponent;
use Illuminate\Support\Facades\Route;
use Tall\Form\Fields\Input;
use Tall\Form\Fields\Radio;
use Tall\Form\Fields\Select;
use Tall\Form\Fields\Editor;
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
        Route::get('/post/{model}/edit', static::class)->name('admin.post.edit');
    }
    
    /*
    |--------------------------------------------------------------------------
    |  Features mount
    |--------------------------------------------------------------------------
    | Inicia o formulario com um cadastro selecionado
    |
    */
    public function mount(?Post $model)
    {
        $this->authorize(Route::currentRouteName());
        
        $this->setFormProperties($model); // $post from hereon, called $this->model
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
           'formTitle' => __('Post'),
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
            Input::make('Name')->rules('required'),
            Select::make('Caegoria','categoria_id')->options(\App\Models\Categoria::query()->pluck('name','id')->toArray())->rules('required'),
            Editor::make('Observations', 'description.preview')
            ->hint('Brief description for your profile. URLs are hyperlinked.'),
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
          return redirect()->route("admin.posts");
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
        return route("admin.posts");
    }
}
