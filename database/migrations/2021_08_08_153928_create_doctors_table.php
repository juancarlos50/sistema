<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('NombreDoctor');
            $table->string('DireccionDoctor');
            $table->string('TelefonoDoctor');
            $table->string('TipoidDoctor');
            $table->string('NumeroidDoctor');
            $table->string('EmailDoctor');
            $table->string('ImagenDoctor');            

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
        Schema::dropIfExists('doctors');
    }
}
