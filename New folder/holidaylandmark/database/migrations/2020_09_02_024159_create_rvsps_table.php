<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRvspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rvsps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emailid')->unique(); 
            $table->string('Name')->default('Name'); 
            $table->string('Phoneno')->default('Phone'); 
             $table->string('Address')->default('Address'); 
             $table->string('TripTitle')->default('TripTitle'); 
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
        Schema::dropIfExists('rvsps');
    }
}
