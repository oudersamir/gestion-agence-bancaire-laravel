<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIdEpargneBenificiaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('virements', function (Blueprint $table) {
            //
            $table->integer('idEpargneBenificiare');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('virements', function (Blueprint $table) {
            //
                   $table->dropColumn(['idEpargneBenificiare']);     
 
        });
    }
}
