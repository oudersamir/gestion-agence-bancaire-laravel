<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteCourantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_courants', function (Blueprint $table) {
            $table->increments('id_compte_courant');
            $table->bigInteger('num_compte_courant');
            $table->dateTime('date_creation');
            $table->double('solde', 8, 2); 
            $table->timestamps();

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compte_courants');
    }
}
