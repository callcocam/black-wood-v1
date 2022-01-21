<?php

/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Description extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the parent descriptionable model (user or tenant).
     */

    public function descriptionable()
    {
        return $this->morphTo();
    }

    /**
     * @return string
     */
    protected function slugTo()
    {
    return false;
    }
    
    public function isUser(){
        return false;
    }
}
