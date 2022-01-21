<?php

/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasCover;
class Image extends AbstractModel
{
    use HasFactory, HasCover;

    protected $guarded = ['id'];

    /**
     * Get the parent imageable model (user or tenant).
     */

    public function imageable()
    {
        return $this->morphTo();
    }

}
