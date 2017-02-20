<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarwashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carwash',function (Blueprint $table){

           $table->increments('id');
           $table->string('name');
           $table->string('phone')->unique();;
           $table->text('address');
           $table->string('latitude');
           $table->string('longitutde');
            $table->string('motovehicle');
            $table->string('salooncar');
            $table->string('trucks');
            $table->string('services');
            $table->text('startclose');
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
        Schema::dropIfExists('carwash');
    }
}
