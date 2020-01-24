<?php

namespace App\Http\Controllers;

use App\Posts\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller{

    public function welcome(){
      $posts = Post::join('users', 'users.id', 'tw_posts.id_user')->select('users.nickname', 'tw_posts.*')->orderBy('tw_posts.id_post', 'desc')->get();
      return view('welcome', compact('posts'));
    }

    public function index(){
      $posts = Post::join('users', 'users.id', 'tw_posts.id_user')->select('users.nickname', 'tw_posts.*')->orderBy('tw_posts.id_post', 'desc')->get();
      return view('home', compact('posts'));
    }

    public function store(Request $request){
      if($this->isValid($request)){
        $post = new Post;
        $post->id_user = Auth::id();
        $post->post = $request->post;
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        if($post->save()){
          return redirect()->back();
        }
      }
    }

    public function isValid(Request $request){
      return $request->validate([
          'post' => 'required|max:255',
      ]);
    }
}
