<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeInVersmenets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
               Schema::table('versements', function (Blueprint $table) {

        $table->integer('compte_courant_id_compte_courant')->unsigned()->change();
             $table->integer('tiere_id_tiere')->unsigned()->change();    


                 });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
