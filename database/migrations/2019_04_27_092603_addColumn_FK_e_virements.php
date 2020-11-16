<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnFKEVirements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_virements', function (Blueprint $table) {
            $table->integer('compte_epargne_id_compte_epargneBenificiaire')->unsigned();
            $table->foreign('compte_epargne_id_compte_epargneBenificiaire')->references('id_compte_epargnes')->on('compte_epargnes');       
            $table->integer('compte_epargne_id_compte_epargneClient')->unsigned();
            $table->foreign('compte_epargne_id_compte_epargneClient')->references('id_compte_epargnes')->on('compte_epargnes');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_virements', function (Blueprint $table) {
        $table->dropForeign(['compte_epargne_id_compte_epargneBenificiaire']);
        $table->dropColumn(['compte_epargne_id_compte_epargneBenificiaire']);     
         $table->dropForeign(['compte_epargne_id_compte_epargneClient']);
        $table->dropColumn(['compte_epargne_id_compte_epargneClient']);   

          });
    }
}
