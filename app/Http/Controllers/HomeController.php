<?php

namespace App\Http\Controllers;

use App\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller{

    public function welcome(){
      $posts = Post::join('users', 'users.id', 'tw_posts.id_user')
      ->select('users.nickname', 'users.name', 'tw_posts.*')->orderBy('tw_posts.id_post', 'desc')->get();
      return view('welcome', compact('posts'));
    }

    public function index(){
      $posts = Post::join('users', 'users.id', 'tw_posts.id_user')
      ->select('users.nickname', 'users.name', 'tw_posts.*')->orderBy('tw_posts.id_post', 'desc')->get();
      return view('home', compact('posts'));
    }
}
