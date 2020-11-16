<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnDateVersementToDateRetrait extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retraits', function (Blueprint $table) {
         $table->renameColumn('date_versement', 'date_retrait');
         

     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

               Schema::table('retraits', function (Blueprint $table) {

         $table->renameColumn('date_retrait','date_versement');
    });
}

}
