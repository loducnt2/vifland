<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_of_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_extend_id')->nullable();
            $table->integer('product_cate_id')->nullable();
            $table->nullableTimestamps();
            $table->foreign('product_extend_id')->references('id')->on('product_extend')->onDelete('cascade');
            $table->foreign('product_cate_id')->references('id')->on('product_cate')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_product');
    }
}
