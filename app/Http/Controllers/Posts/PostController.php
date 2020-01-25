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

  public function hasLike(Request $request){
      if(Like::where('id_post', $request->id_post)->where('id_user', Auth::id())->count() > 0){
        return true;
      }
      return false;
  }

  public function hasRetwind(Request $request){
      if(Retwind::where('id_post', $request->id_post)->where('id_user', Auth::id())->count() > 0){
        return true;
      }
      return false;
  }

  public function like(Request $request){
    if(!$this->hasLike($request)){
      $like = new Like;
      $like->id_post = $request->id_post;
      $like->id_user = Auth::id();
      if($like->save()){
        if($this->changeValueLikes($request, true)){
          return redirect()->back();
        }else{
          $like->delete();
        }
      }
    }else{
      $like = Like::where('id_post', $request->id_post)->where('id_user', Auth::id());
      if($like->delete()){
        if($this->changeValueLikes($request, false)){
          return redirect()->back();
        }else{
          $like->save();
          return redirect()->back();
        }
      }
    }
  }

  public function changeValueLikes(Request $request, $boolean){
    $post = Post::find($request->id_post);
    if($boolean){
      $post->likes += 1;
    }else{
      $post->likes -= 1;
    }
    if($post->save()){
      return true;
    }
    return false;
  }

  public function changeValueRetwinds(Request $request, $boolean){
    $post = Post::find($request->id_post);
    if($boolean){
      $post->retwinds += 1;
    }else{
      $post->retwinds -= 1;
    }
    if($post->save()){
      return true;
    }
    return false;
  }

  public function retweet(Request $request){
    if(!$this->hasRetwind($request)){
      $retwind = new Retwind;
      $retwind->id_post = $request->id_post;
      $retwind->id_user = Auth::id();
      if($retwind->save()){
        if($this->changeValueRetwinds($request, true)){
          return redirect()->back();
        }else{
          $like->delete();
        }
      }
    }else{
      $retwind = Retwind::where('id_post', $request->id_post)->where('id_user', Auth::id());
      if($retwind->delete()){
        if($this->changeValueRetwinds($request, false)){
          return redirect()->back();
        }else{
          $retwind->save();
          return redirect()->back();
        }
      }
    }
  }
}
