<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistressCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distress_calls', function (Blueprint $table) {
            $table->increments('id');

            // driver
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // associated to
            $table->integer('travel_id')->unsigned()->nullable();
            $table->foreign('travel_id')->references('id')->on('travels');

            $table->string('lat');
            $table->string('lng');

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
        Schema::dropIfExists('distress_calls');
    }
}
