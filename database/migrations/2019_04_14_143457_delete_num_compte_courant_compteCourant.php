<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteNumCompteCourantCompteCourant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
 Schema::table('compte_courants', function ($table) {
  
    $table->dropColumn('num_compte_courant');


       });


            }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('compte_courants', function ($table) {
  
            $table->bigInteger('num_compte_courant');


       });
    }
}
