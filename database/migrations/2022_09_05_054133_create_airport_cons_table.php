<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirportConsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airport_cons', function (Blueprint $table) {
            $table->id();
            $table->string('airport_name');
            $table->string('country_name');
            $table->integer('country_ISO');
            $table->decimal('latitude', 15, 10);
            $table->decimal('longitude', 15, 10);
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
        Schema::dropIfExists('airport_cons');
    }
}
