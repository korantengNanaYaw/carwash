<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email',45)->unique();
            $table->string('password');
            $table->string('phone');
            $table->text('address');
            $table->string('latitude');
            $table->string('longitutde');
            $table->string('motovehicle');
            $table->string('salooncar');
            $table->string('trucks');
            $table->string('services');
            $table->text('startclose');
            $table->rememberToken();
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
