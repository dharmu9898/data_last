<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country')->default(101);
            $table->string('state')->default('state');
            $table->string('city')->default('city');
            $table->string('slug');
            $table->string('Describes')->default('Describes'); 
              $table->string('country_state_city')->default('country_state_city'); 
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
        Schema::dropIfExists('add_cities');
    }
}
