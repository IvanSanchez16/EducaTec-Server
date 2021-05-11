<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescripcionesPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripciones_posts', function (Blueprint $table) {
            $table->bigInteger('dpost_post')->unsigned();
            $table->bigInteger('dpost_inc')->unsigned();
            $table->string('descripcion');

            $table->primary(['dpost_post','dpost_inc']);
            $table->foreign('dpost_post')->references('post_id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descripciones_posts');
    }
}
