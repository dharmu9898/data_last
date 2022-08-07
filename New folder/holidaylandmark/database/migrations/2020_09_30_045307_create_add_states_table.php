<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country')->default(101);
            $table->string('state')->default('state');
            $table->string('slug');
            $table->string('Explain')->default('Explain'); 
             $table->string('country_state')->default('country_state');
            $table->string('Image')->default('Image'); 
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
        Schema::dropIfExists('add_states');
    }
}
