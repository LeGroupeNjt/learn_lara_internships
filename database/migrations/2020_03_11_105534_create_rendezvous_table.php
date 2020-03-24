<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRendezvousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_patient')->unsigned();
            $table->integer('id_consultation')->unsigned();
            $table->date('daterendezvous');
            $table->string('description');
            $table->timestamps();
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->foreign('id_consultation')->references('id')->on('consultations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rendezvous');
    }
}
