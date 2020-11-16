<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMiseEncaisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mise_encaissements', function (Blueprint $table) {
            $table->increments('id_mise_encaissement');
            $table->dateTime('date');
            $table->integer('n_cheque');
            $table->string('tire');
            $table->string('nom');
            $table->string('prenom');
            $table->string('num_compte');
            $table->string('adresse');
            $table->double('montant',15,8);
            $table->integer('compte_courant_id_compte_courant');


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
        Schema::dropIfExists('mise_encaissements');
    }
}
