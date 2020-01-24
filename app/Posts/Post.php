<?php

namespace App\Posts;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

  protected $table = 'tw_posts';
  protected $primaryKey = 'id_post';

}
