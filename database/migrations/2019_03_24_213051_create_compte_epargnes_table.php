<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteEpargnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_epargnes', function (Blueprint $table) {
            //
            $table->increments('id_compte_epargnes');
            $table->string('prenom');
            $table->double('solde',8,2);
            $table->double('taux_interet',8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                    Schema::dropIfExists('compte_epargnes');

        
    }
}
