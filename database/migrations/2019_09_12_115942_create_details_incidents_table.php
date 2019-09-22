<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_data_id');
            $table->unsignedInteger('incident_id');
            $table->decimal('latitude',10,8);
            $table->decimal('longitude',10,8);
            $table->dateTime('tanggal');
            $table->foreign('user_data_id')->references('id')->on('data_users');
            $table->foreign('incident_id')->references('id')->on('incidents');
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
        Schema::dropIfExists('details_incidents');
    }
}
