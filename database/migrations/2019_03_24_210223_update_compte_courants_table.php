<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCompteCourantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compte_courants', function (Blueprint $table) {
           $table->renameColumn('compte_courants_id_comptes', 'compte_id_comptes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compte_courants', function (Blueprint $table) {
            $table->renameColumn('compte_id_comptes', 'compte_courants_id_comptes');
        });
    }
}
