<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use App\Models\Traits\HasCover;

class PedidoItem  extends AbstractModel
{
  use HasFactory;
  //use HasCover;

  protected $guarded = ["id"];

  public function pedido()
  {
    return $this->hasOne(Pedido::class);
  }

  public function produto()
  {
    return $this->belongsTo(Produto::class);
  }

  /**
   * @return string
   */
  protected function slugTo()
  {
      return false;
  }
}
