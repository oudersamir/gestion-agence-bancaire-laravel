<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTracesoldes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracesoldes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idOperation');
            $table->double('solde',10,8);
            $table->dateTime('date_operation');
            $table->string('type_operation');
            $table->string('opeartion');
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
        Schema::dropIfExists('tracesoldes');
    }
}
