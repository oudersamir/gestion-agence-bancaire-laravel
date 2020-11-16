<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnDebitMaxtoCompteCourants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('compte_courants', function (Blueprint $table) {
        $table->double('debit_max',15,8);
        $table->integer('n_carnet_cheque');

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
        $table->dropColumn('debit_max');
        $table->dropColumn('n_carnet_cheque');

        });
    }
}
