<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_customer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('uid');
            $table->string('name');
            $table->unsignedInteger('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
             $table->foreign('uid')->references('id')->on('tb_user');
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
        Schema::dropIfExists('tb_customer');
    }
}
