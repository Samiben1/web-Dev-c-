<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('tbl_cart',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('restaurant_id');
            $table->unsignedBigInteger('dish_id');
            $table->tinyInteger('is_ordered')->default(0)->comment('0:not ordered,1:ordered');
            $table->date('date');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('dish_id')
                ->references('id')
                ->on('tbl_dish')
                ->onDelete('cascade');
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('tbl_cart');
    }
}
