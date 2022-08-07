<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->references('id')->on('users');           
                 $table->string('country')->default(101);
            $table->string('state')->default('State');
            $table->string('city')->default('City'); 

            $table->string('emailid')->default('Email'); 
              $table->string('Phoneno')->default('Phone'); 
               $table->string('triptitle')->default('Title'); 
              $table->string('Noofdays')->default('Day'); 
               $table->string('location')->default('Location'); 
               $table->string('iternary')->default('iternary'); 
               $table->string('operatoremail')->default('operatoremail'); 
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
        Schema::dropIfExists('add_trips');
    }
}
