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
        return view($this->view())
        ->with('model', $this->model)
        ->with('models', $this->models());
    }


    protected function models(){
        if($this->query()){
            return $this->query()->simplePaginate($this->perPage);
        }
        return null;
    }
}
