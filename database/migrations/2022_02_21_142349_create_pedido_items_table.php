<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained("users")->nullOnDelete();
            $table->foreignUuid('pedido_id')->nullable()->constrained("pedidos")->nullOnDelete();
            $table->foreignUuid('produto_id')->nullable()->constrained("produtos")->nullOnDelete();
            $table->integer('quantidade')->default(1)->nullable();
            $table->float('sale_price',9,4)->nullable();
            $table->float('total',9,4)->nullable();
            $table->foreignUuid('status_id')->nullable()->constrained('statuses')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_items');
    }
}
