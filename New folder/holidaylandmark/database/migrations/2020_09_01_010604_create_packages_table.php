<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->references('id')->on('users');           
            $table->string('country')->default(101);
            $table->string('state')->default('State');
            $table->string('city')->default('City'); 
            $table->string('slug');
            $table->string('slug1');
            $table->string('slug2');
               $table->string('country_state')->default('country_state');
            $table->string('country_state_city')->default('country_state_city');
            $table->string('c_s_c_cat')->default('c_s_c_cat');
             $table->string('TripTitle')->default('TripTitle'); 
              $table->string('Phoneno')->default('Phone'); 
                $table->string('NoOfDays')->default('NoOfDays'); 
               $table->string('Description')->default('Description'); 
               $table->string('Category')->default('Category'); 
               $table->string('Iternary')->default('Iternary'); 
               $table->string('Keyword')->default('Keyword'); 
               $table->string('Image')->default('Image'); 
               $table->string('Destination')->default('Destination'); 
               $table->string('Subscriber')->default('0');
               $table->string('email')->default('email'); 
               $table->string('img')->default('img'); 
               $table->string('Permission')->default('no');
               $table->date('datetime'); 
               $table->time('time'); 
              
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
        Schema::dropIfExists('packages');
    }
}
