<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requesthelps', function (Blueprint $table) {
            $table->bigIncrements('request_id');
            $table->integer('user_id')->unsigned()->references('id')->on('users');           
            $table->string('concern')->default('');
            $table->string('message')->default(''); 
            $table->string('country')->default('country');
            $table->string('state')->default('State');
            $table->string('city')->default('City'); 
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
        Schema::dropIfExists('requests');
    }
}
