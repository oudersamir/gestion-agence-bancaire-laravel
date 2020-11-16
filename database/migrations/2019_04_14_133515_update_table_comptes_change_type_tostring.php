<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableComptesChangeTypeTostring extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('comptes', function ($table) {
    $table->string('num_comptes', 300)->change();
     });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
 Schema::table('comptes', function ($table) {
            $table->dateTimeTz('num_comptes');
     });    }
}
