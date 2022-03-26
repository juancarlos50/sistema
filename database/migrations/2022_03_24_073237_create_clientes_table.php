<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombrecliente');
            $table->string('Tipoidcliente');
            $table->string('Numeroidcliente');
            $table->string('Edadcliente');
            $table->string('NombreAcudiente');
            $table->string('Direccioncliente');
            $table->string('Telefonocliente');
            $table->date('FechaNacimiento');            
            $table->string('Emailcliente');
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
        Schema::dropIfExists('clientes');
    }
}
