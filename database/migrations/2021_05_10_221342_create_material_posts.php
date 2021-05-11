<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_posts', function (Blueprint $table) {
            $table->bigInteger('mat_post')->unsigned();
            $table->bigInteger('mat_arch')->unsigned();

            $table->primary(['mat_post','mat_arch']);

            $table->foreign('mat_post')->references('post_id')->on('posts');
            $table->foreign('mat_arch')->references('arch_id')->on('archivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material_posts');
    }
}
