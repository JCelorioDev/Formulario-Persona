<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datospersona', function (Blueprint $table) {
            $table->integer('id_tipo')->unsigned();            
            $table->foreign('id_tipo')->references('id')->on('tipos');

            $table->integer('id_especialidad')->unsigned();            
            $table->foreign('id_especialidad')->references('id')->on('especialidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
