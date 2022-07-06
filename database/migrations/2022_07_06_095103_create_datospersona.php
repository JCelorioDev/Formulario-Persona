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
        Schema::create('datospersona', function (Blueprint $table) {
            $table->engine = 'InnoDB';   
            $table->increments('id');
            $table->string('nom');
            $table->string('ape');
            $table->string('CI');
            $table->string('dir');
            $table->string('telf');
            $table->boolean('estado');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datospersona');
    }
};
