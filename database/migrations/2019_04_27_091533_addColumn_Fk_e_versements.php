<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnFkEVersements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::table('e_versements', function (Blueprint $table) {
            $table->integer('compte_epargne_id_compte_epargne')->unsigned();
            $table->foreign('compte_epargne_id_compte_epargne')->references('id_compte_epargnes')->on('compte_epargnes');
        }); 
            }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

  Schema::table('e_versements', function (Blueprint $table) {
            $table->dropForeign(['compte_epargne_id_compte_epargne']);
            $table->dropColumn(['compte_epargne_id_compte_epargne']);
        });

    }
}
