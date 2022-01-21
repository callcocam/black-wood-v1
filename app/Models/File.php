<?php

/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\HasFile;
class File extends AbstractModel
{
    use HasFactory, HasFile;

    protected $guarded = ['id'];

    /**
     * Get the parent fileable model (user or tenant).
     */

    public function fileable()
    {
        return $this->morphTo();
    }

}
