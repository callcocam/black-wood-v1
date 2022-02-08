<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug')->commet('url amigavel')->nullable(); 
            $table->float('price')->comment('preço reserva')->nullable();
            $table->integer('occupation')->commet('quantidade de lugares ocupados')->nullable();
            $table->foreignUuid('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignUuid('status_id')->nullable()->constrained('statuses')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesas');
    }
}