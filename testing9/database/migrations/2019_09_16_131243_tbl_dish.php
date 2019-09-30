<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDish extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('tbl_dish', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('restaurant_id');
            $table->string('d_name',255);
            $table->string('d_prise',255)->nullable();
            $table->text('d_photo')->nullable();

            $table->foreign('restaurant_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('tbl_dish');
    }
}
