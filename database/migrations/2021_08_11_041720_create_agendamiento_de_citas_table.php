<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamientoDeCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Schema::create('especialidads', function (Blueprint $table) {
          //  $table->id();
          //  $table->string('NombreEspecialidad');
           // $table->timestamps();
       // );

        Schema::create('agendamiento_de_citas', function (Blueprint $table) {
            $table->id();
            $table->string("SaladeConsulta");
            $table->date("HorayFecha");
           // $table->unsignedBigInteger('especialidads_id'); //relacion con especialidad
           // $table->foreign('especialidads_id')->references('id')->on(' '); //clave foranea

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
        Schema::dropIfExists('agendamiento_de_citas');
      //  Schema::dropIfExists('especialidads');
    }
}
