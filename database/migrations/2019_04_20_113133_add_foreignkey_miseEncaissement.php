<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyMiseEncaissement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mise_encaissements', function (Blueprint $table) {
            $table->integer('compte_courant_id_compte_courant')->unsigned()->change();
           $table->foreign('compte_courant_id_compte_courant')->references('id_compte_courant')->on('compte_courants');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mise_encaissements', function (Blueprint $table) {
            
   $table->dropForeign('compte_courant_id_compte_courant');

                    });
    }
}
