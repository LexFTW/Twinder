<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration{

    public function up(){
      if(!Schema::hasTable('tw_likes')){
        Schema::create('tw_likes', function (Blueprint $table) {
          $table->bigIncrements('id_like');
          $table->bigInteger('id_post')->unsigned();
          $table->foreign('id_post')->references('id_post')->on('tw_posts')->onDelete('cascade')->onUpdate('cascade');
          $table->bigInteger('id_user')->unsigned();
          $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          $table->timestamps();
        });
      }
    }

    public function down(){
      Schema::dropIfExists('likes');
    }
}
