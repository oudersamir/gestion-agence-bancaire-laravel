<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virements', function (Blueprint $table) {
            $table->increments('id_virement');
            $table->integer('id_operation');
            $table->double('montant',15,8);
            $table->string('type_virement');
            $table->datetime('date_virement');
            $table->integer('compte_courant_id_compte_courant')->unsigned();
            $table->integer('compte_courant_id_compte_beneficiaire')->unsigned();
            $table->foreign('compte_courant_id_compte_courant')->references('id_compte_courant')->on('compte_courants');
            $table->foreign('compte_courant_id_compte_beneficiaire')->references('id_compte_courant')->on('compte_courants');

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
        Schema::dropIfExists('virements');
    }
}
