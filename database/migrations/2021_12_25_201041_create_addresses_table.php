<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('zip', 20)->nullable();
            $table->string('state', 5)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('number', 20)->nullable();
            $table->string('complement', 255)->nullable();
            $table->string('country', 200)->default('Brasil')->nullable();
            $table->uuidMorphs('addressable');
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
        Schema::dropIfExists('addresses');
    }
}
