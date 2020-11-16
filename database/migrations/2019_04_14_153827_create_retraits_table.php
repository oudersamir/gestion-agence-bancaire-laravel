<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetraitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retraits', function (Blueprint $table) {
             $table->increments('id_retrait');
             $table->double('montant',15,8);
             $table->datetime('date_versement');
             $table->integer('compte_courant_id_compte_courant')->unsigned();  
             $table->integer('tiere_id_tiere')->unsigned();
             $table->foreign('compte_courant_id_compte_courant')->references('id_compte_courant')->on('compte_courants');
             $table->foreign('tiere_id_tiere')->references('id_tiere')->on('tieres');

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
        Schema::dropIfExists('retraits');
    }
}
