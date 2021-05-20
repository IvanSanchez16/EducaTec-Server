<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->bigInteger('cal_id')->unsigned();
            $table->boolean('cal_post');
            $table->integer('cal_user');
            $table->boolean('cal_calificacion');

            $table->primary(['cal_id','cal_post']);
            $table->foreign('cal_user')->references('nocontrol')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
