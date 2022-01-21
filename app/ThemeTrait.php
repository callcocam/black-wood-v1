<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App;

trait ThemeTrait{

    protected function tableView(){
        return "tall-theme::datatable";
    }

    protected function formView(){
        return "tall-theme::form";
    }

    protected function theme_layout(){
        
        if(\Str::contains(\Route::currentRouteName(),'dev')){
            return "tall-theme::layouts.app";
        }
        return config('livewire.layout');
     }
}