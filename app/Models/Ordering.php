<?php

/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ordering extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the parent orderingable model (user or tenant).
     */

    public function orderingable()
    {
        return $this->morphTo();
    }

}
