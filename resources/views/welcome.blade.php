@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-3">
      @guest
        @include('auth.components.guest')
        @include('posts.components.tags')
      @else
        @include('auth.components.auth')
      @endguest
    </div>
    @guest
    <div class="col-md-8">
    @else
    <div class="col-md-6">
    @endguest
      <div class="card rounded-0">
        <div class="card-body">
          @auth
            @include('posts.components.create')
          @endauth
          @foreach($posts as $post)
            @include('posts.components.post')
          @endforeach
        </div>
      </div>
    </div>
    @auth
    <div class="col-md-3">
      @include('posts.components.tags')
    </div>
    @endauth
  </div>
@endsection
