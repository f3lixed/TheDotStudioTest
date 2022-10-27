<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacitacionUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitacion_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('UsuarioAsignado');
            $table->integer('capacitacion_id')->unsigned()->nullable();
            $table->foreign('capacitacion_id')->references('id')->on('capacitacions')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('Activo');
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
        Schema::dropIfExists('capacitacion_usuarios');
    }
}
