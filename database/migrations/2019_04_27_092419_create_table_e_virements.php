<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEVirements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
        Schema::create('e_virements', function (Blueprint $table) {
            $table->increments('id_virement');
            $table->integer('id_operation');
            $table->double('montant',10,8);
            $table->enum('type', ['credit', 'debit']);
            $table->dateTime('date_virement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('e_virements');
    }
}