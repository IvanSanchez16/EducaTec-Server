<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescripcionesComentarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripciones_comentarios', function (Blueprint $table) {
            $table->bigInteger('dcom_comentario')->unsigned();
            $table->bigInteger('dcom_inc')->unsigned();
            $table->string('descripcion');

            $table->primary(['dcom_comentario','dcom_inc']);
            $table->foreign('dcom_comentario')->references('com_id')->on('comentarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descripciones_comentarios');
    }
}
