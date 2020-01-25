<?php

namespace App\Http\Controllers\Posts;

use App\Posts\Post;
use App\Posts\Like;
use App\Posts\Retwind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class PostController extends Controller{
  public function __construct(){
    $this->middleware('auth');
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

  public function like(Request $request){
    $like = new Like;
    $like->id_post = $request->id_post;
    $like->id_user = Auth::id();

    $post = Post::find($request->id_post);
    $post->likes += 1;

    if($like->save()){
      if($post->save()){
        return redirect()->back();
      }else{
        $like->delete();
      }
    }
  }

  public function retweet(Request $request){
    $retwind = new Retwind;
    $retwind->id_post = $request->id_post;
    $retwind->id_user = Auth::id();

    $post = Post::find($request->id_post);
    $post->retwinds += 1;

    if($retwind->save()){
      if($post->save()){
        return redirect()->back();
      }else{
        $retwind->delete();
      }
    }
  }
}
