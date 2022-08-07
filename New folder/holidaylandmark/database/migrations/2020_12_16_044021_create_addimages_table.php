<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addimages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();   
            $table->string('trips')->default('trips');
            $table->string('image_name')->default('image_name'); 
            $table->string('email')->default('email'); 
             $table->string('img')->default('img'); 
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
        Schema::dropIfExists('addimages');
    }
}
