<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generos', function (Blueprint $table) {
            $table->id();
            $table->string('NombreGenero');
            $table->timestamps();
        });

        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('NombrePaciente');
            $table->string('TipoidPaciente');
            $table->string('NumeroidPaciente');
            $table->string('EdadPaciente');
            $table->string('NombreAcudiente');
            $table->string('DireccionPaciente');
            $table->string('TelefonoPaciente');
            $table->date('FechaNacimiento');            
            $table->string('EmailPaciente');
            $table->unsignedBigInteger('generos_id'); //relacion con generos
            $table->foreign('generos_id')->references('id')->on('generos'); //clave foranea
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
        Schema::dropIfExists('pacientes');
        Schema::dropIfExists('generos');
    }
}
