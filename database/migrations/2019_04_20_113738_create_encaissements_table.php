<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncaissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encaissements', function (Blueprint $table) {
            $table->increments('id_encaissement');
            $table->dateTime('date_encaissement');
            $table->integer('mise_encaissement_id_mise_encaissement')->unsigned();
            $table->foreign('mise_encaissement_id_mise_encaissement')->references('id_mise_encaissement')->on('mise_encaissements');
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
        Schema::dropIfExists('encaissements');
    }
}
