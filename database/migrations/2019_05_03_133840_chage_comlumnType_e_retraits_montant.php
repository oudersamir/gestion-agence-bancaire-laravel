<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChageComlumnTypeERetraitsMontant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        DB::statement('ALTER TABLE e_retraits MODIFY montant DOUBLE(8,2)  ;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('e_retraits', function (Blueprint $table) {
            //
        });
    }
}