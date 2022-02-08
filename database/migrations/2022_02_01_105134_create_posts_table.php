<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained("users")->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('post_views')->nullable();
            $table->foreignUuid('categoria_id')->nullable()->constrained("categorias")->nullOnDelete();
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
        Schema::dropIfExists('posts');
    }
}
