<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends AbstractModel
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function isUser(){
        return false;
    }
    
    public static function isStatus($slug){
        return static::query()->where('slug', $slug)->first();
    }
}
