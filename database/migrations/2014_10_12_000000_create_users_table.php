<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Builder;

class CreateUsersTable extends Migration{

    public function up(){
      if(!Schema::hasTable('users')){
        Schema::create('users', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('email')->unique();
          $table->string('nickname')->unique();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
        });
      }
    }

    public function down(){
      Schema::dropIfExists('users');
    }

}
