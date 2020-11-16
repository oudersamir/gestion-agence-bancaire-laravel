<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsVersements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('versements', function (Blueprint $table) {
        $table->foreign('compte_courant_id_compte_courant')->references('id_compte_courant')->on('compte_courants');
        $table->foreign('tiere_id_tiere')->references('id_tiere')->on('tieres');

        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

Schema::table('versements', function (Blueprint $table) {
      
             $table->dropForeign(['tiere_id_tiere']);
             $table->dropForeign(['compte_courant_id_compte_courant']);


        });

            }
}
