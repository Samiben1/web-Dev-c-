<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email',255)->unique();
            $table->string('password');
            $table->text('address')->nullable();
            $table->tinyInteger('user_type')->comment('0:Admin,1:Restaurant,2:User');
            $table->tinyInteger('is_approve')->nullable()->comment('This field is only for restaurant.0:pending,1:approved');
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
        Schema::dropIfExists('users');
    }
}
