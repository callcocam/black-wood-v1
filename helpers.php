<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

use Illuminate\Support\Facades\Cache;

if (!function_exists('lista_estados')) {
    
    function lista_estados($sigla=null){
        return [
           "AC"=>"Acre",
           "AL"=>"Alagoas",
           "AP"=>"Amapá",
           "AM"=>"Amazonas",
           "BA"=>"Bahia",
           "CE"=>"Ceará",
           "ES"=>"Espírito Santo",
           "GO"=>"Goiás",
           "MA"=>"Maranhão",
           "MT"=>"Mato Grosso",
           "MS"=>"Mato Grosso do Sul",
           "MG"=>"Minas Gerais",
           "PA"=>"Pará",
           "PB"=>"Paraíba",
           "PR"=>"Paraná",
           "PE"=>"Pernambuco",
           "PI"=>"Piauí",
           "RJ"=>"Rio de Janeiro",
           "RN"=>"Rio Grande do Norte",
           "RS"=>"Rio Grande do Sul",
           "RO"=>"Rondônia",
           "RR"=>"Roraima",
           "SC"=>"Santa Catarina",
           "TO"=>"São Paulo",
           "SE"=>"Sergipe",
           "DF"=>"Distrito Federal"
        ];
    }
}

if (!function_exists('lv_includes')) {
    
    function lv_includes($component){
        return sprintf("includes.%s-component", $component);
    }
}

if (!function_exists('clients')) {
    
    function clients(){
        return \App\Models\Auth\Acl\Role::query()->where('slug', 'client')->first();
    }
}

if (!function_exists('corretor')) {
    
    function corretor(){
        return \App\Models\Auth\Acl\Role::query()->where('slug', 'corretor')->first();
    }
}

if (!function_exists('published')) {
    
    function published($status="published"){
        if($published = Cache::remember("60", "{$status}_", function() use($status){
            return \App\Models\Status::where('slug', $status)->first();
        })){
            return ['status_id'=>$published->id];
           }
            return [];
    }
}


if (!function_exists('draft')) {
    
    function draft($status="draft"){
        if($draft = Cache::remember("60", "{$status}_", function() use($status){
            return \App\Models\Status::where('slug', $status)->first();
        })){
            return ['status_id'=>$draft->id];
           }
        return [];
    }
}
if(!function_exists('date_carbom_format')){

    function date_carbom_format($date, $format="d/m/Y H:i:s"){

        $date = explode(" ", str_replace(["-","/",":","T"]," ",$date));

        if(!isset($date[0])){
            $date[0]= null;
        }
        if(!isset($date[1])){
            $date[1]= null;
        }
        if(!isset($date[2])){
            $date[2]= null;
        }
        if(!isset($date[3])){
            $date[3]= null;
        }
        if(!isset($date[4])){
            $date[4]= null;
        }
        if(!isset($date[5])){
            $date[5]= null;
        }
        list($y,$m,$d,$h,$i,$s) = $date;

        //$carbon = \Carbon\Carbon::now();
        $carbon = \Illuminate\Support\Facades\Date::now();
        $carbon->setLocale('pt_BR');
        if(strlen($date[0]) == 4){
          // echo  $carbon->create($y,$m,$d,$h,$i,$s)->toDateTimeLocalString().PHP_EOL;
         //  echo  $carbon->create($y,$m,$d,$h,$i,$s)->toDayDateTimeString().PHP_EOL;
         
            return $carbon->create($y,$m,$d,$h,$i,$s);

        }
        if($y && $m && $d ){
            return $carbon->create($d,$m,$y,$h,$i,$s);
        }
        return $carbon->create(null,null,null,null,null,null);

    }
}



if ( ! function_exists('form_w'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function form_w($post) {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $post); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }
}

if ( ! function_exists('form_read'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function form_read($post) {
        if(is_numeric($post)):
            return @number_format($post,2, ",", "."  );
        endif;
        return $post;
    }
}