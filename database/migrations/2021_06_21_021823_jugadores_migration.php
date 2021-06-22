<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JugadoresMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('pais');
            $table->string('nombre1');
            $table->string('nombre2');
            $table->string('nombre3');
            $table->string('nombre4');
            $table->string('nombre5');
            $table->string('nombre6');
            $table->string('nombre7');
            $table->string('nombre8');
            $table->string('nombre9');
            $table->string('nombre10');
            $table->string('nombre11');
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
        Schema::dropIfExists('jugadores');
    }
}