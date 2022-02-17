<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class Pedido  extends AbstractModel
{
  use HasFactory;
  //use HasCover;

  protected $guarded = ["id"];
  
  /**
   * @return string
   */
  protected function slugTo()
  {
      return false;
  }

  public function mesa()
  {
    return $this->belongsTo(Mesa::class);
  }

}
