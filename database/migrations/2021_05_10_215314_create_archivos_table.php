<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->id('arch_id');
            $table->string('arch_nombre');
            $table->bigInteger('arch_materia')->unsigned();
            $table->tinyInteger('arch_semestre')->unsigned();
            $table->boolean('arch_privado');
            $table->string('path');
            $table->integer('arch_user')->nullable();
            $table->timestamps();

            $table->foreign('arch_materia')->references('mat_id')->on('materias');
            $table->foreign('arch_user')->references('nocontrol')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos');
    }
}
