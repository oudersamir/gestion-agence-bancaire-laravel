<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIdCourantBenificiaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('e_virements', function (Blueprint $table) {
            //
            $table->integer('idCourantBenificiare');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_virements', function (Blueprint $table) {
            //
            $table->dropColumn(['idCourantBenificiare']);     

        });
    }
}
