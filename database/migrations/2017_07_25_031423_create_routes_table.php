<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');

            // from
            $table->integer('from_id')->unsigned();
            $table->foreign('from_id')->references('id')->on('stations');
            // to
            $table->integer('to_id')->unsigned();
            $table->foreign('to_id')->references('id')->on('stations');

            $table->string('name');
            $table->float('time'); // in hours
            $table->float('distance'); // in kilometers

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
        Schema::dropIfExists('routes');
    }
}
