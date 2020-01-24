<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration{

    public function up(){
        Schema::create('tw_posts', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->bigIncrements('id_post');
          $table->mediumText('post');
          $table->bigInteger('id_user')->unsigned();
          $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('tw_posts');
    }
}
