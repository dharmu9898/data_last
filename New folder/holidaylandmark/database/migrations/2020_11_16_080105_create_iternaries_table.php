<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIternariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iternaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();   
            $table->string('Days')->default('Days');
            $table->string('trips')->default('trips');
            $table->string('email')->default('email'); 
            $table->string('location')->default('location');
            $table->string('explanation')->default('explanation');
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
        Schema::dropIfExists('iternaries');
    }
}
