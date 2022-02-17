<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained("users")->nullOnDelete();
            $table->foreignUuid('client_id')->nullable()->constrained("users")->nullOnDelete();
            $table->foreignUuid('officeboy_id')->nullable()->constrained("users")->nullOnDelete();
            $table->foreignUuid('mesa_id')->nullable()->constrained("mesas")->nullOnDelete();
            $table->integer('delivery')->default(0)->nullable();
            $table->float('desconto')->nullable();
            $table->float('delivery_fee')->nullable();
            $table->float('total')->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}
