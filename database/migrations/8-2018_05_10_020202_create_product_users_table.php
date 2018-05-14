<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');           
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');           
            $table->string('quantitySold');
            $table->integer('totalPrice');
            $table->string('custom');
            $table->string('custom_id');
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
        Schema::dropIfExists('product_users');
    }
}
