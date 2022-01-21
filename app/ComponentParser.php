<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App;


use Livewire\Commands\ComponentParser as ComponentParserAlias;
use Illuminate\Support\Str;

use Symfony\Component\Finder\Finder;

class ComponentParser extends ComponentParserAlias
{


    public static function generateRoute($path, $search="app", $ns = "\\App")
    {

        if (!is_dir($path)) {
            return;
        }

        foreach ((new Finder)->in($path) as $component) {
           
            $componentPath = $component->getRealPath();
            $namespace = Str::after($componentPath, $search);
            $namespace = Str::replace(['/', '.php'], ['\\', ''], $namespace);
            $component = $ns . $namespace;
            if (class_exists($component)) {
                if (method_exists($component, 'route')) {
                    app($component)->route();
                }
            }
        }
    }
}
