<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['user'];

    /**
     * Get the parent addressable model (user or tenant).
     */

    public function addressable()
    {
        return $this->morphTo();
    }
}
