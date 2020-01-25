<?php

namespace App\Posts;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'tw_likes';
    protected $primaryKey = 'id_like';
}
