<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Helpers;
use Symfony\Component\Finder\Finder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SitemapHelper{

      /**
     * @var array
     */
    private $ignore = ['show','wireui','admin','livewire','certificado','two-factor', 'ignition','password','login','register', 'auth','store', 'remove-file', 'auto-route', 'translate', 'profile'];

    protected $options = [];

    public static function make()
    {
        return new static;
    }

    public function routes()
    {
        
        foreach (\Route::getRoutes() as $route) {

            if (isset($route->action['as'])) :
         
                $data = explode(".", $route->action['as']);

                if ($this->getIgnore($data)) :

                    if (in_array("GET",$route->methods)) :
                        
                        array_push($this->options, [
                            "URL"=>route($route->action['as']),
                            "DATA"=>now()->tz('UTC')->toAtomString()
                        ]);

                    endif;

                endif;
            endif;
        }
        return $this;
    }


    public function models(){

        foreach ((new Finder)->in(app_path("Models")) as $model) { 

            $componentPath = $model->getRealPath();

            $namespace = Str::after($componentPath, app_path());

            $namespace = Str::replace(['/', '.php'], ['\\', ''], $namespace);
          
            $component = "App" . $namespace;

            if (class_exists($component)) {

                if (method_exists($component, 'toSitemapTag')) {

                     $models = app($component)->where(published())->get();

                     foreach($models as $model):

                        array_push($this->options, [
                                  "URL"=>$model->toSitemapTag(),
                                  "DATA"=>$model->created_at->tz('UTC')->toAtomString()
                        ]);

                     endforeach;

                }

            }

        }      

        return $this;
    }

    public function generate($path="sitemap")
    {


        $base = File::get(resource_path('stubs/sitemap-url.stub'));

        $content = [];

        foreach($this->options as $option):
            $stub = str_replace(['{{ URL }}','{{ DATA }}'], $option, $base);
            $content[] = $stub;
        endforeach;

        $content = implode(PHP_EOL, $content);

        $stub = File::get(resource_path('stubs/sitemap.stub'));

        $stub = str_replace('{{ CONTENT }}', $content, $stub);

        $path = public_path(sprintf("%s.xml", $path));

        //File::ensureDirectoryExists($path);
        if (File::exists($path)) {
            File::delete($path);
        }
        File::put($path, $stub);

        return $stub;

    }
    private function getIgnore($value)
    {

        $result = true;

        foreach ($this->ignore as $item) {

            if (in_array($item, $value)) {

                $result = false;
            }
        }

        return $result;
    }
}