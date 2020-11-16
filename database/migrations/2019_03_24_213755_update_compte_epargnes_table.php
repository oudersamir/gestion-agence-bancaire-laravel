<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCompteEpargnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compte_epargnes', function (Blueprint $table) {
        $table->integer('compte_id_comptes')->unsigned()->after('id_compte_epargnes');
            $table->foreign('compte_id_comptes')->references('id_comptes')->on('comptes')->onDelete('cascade');            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compte_epargnes', function (Blueprint $table) {
            //
             $table->dropForeign(['compte_id_comptes']);
            $table->dropColumn('compte_id_comptes');
        });

    }
}
