<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListimageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_listimage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('images');
            $table->unsignedInteger('pid');
            $table->timestamps();
            $table->foreign('pid')->references('id')->on('tb_product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_listimage');
    }
}
