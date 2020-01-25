<div class="media py-2 my-4 border-bottom">
  <img class="mr-3 rounded-circle" style="width: 4em" src="https://www.w3schools.com/w3css/img_avatar3.png" alt="Generic placeholder image">
  <div class="media-body">
    <h6 class="d-inline mr-1"><b>{{$post->name}}</b></h6>
    <span class="mt-0 mb-0 text-secondary"><span>@</span>{{$post->nickname}}</span>
    <p>{{$post->post}}</p>
    @auth
    <div class="float-right">
      <form method="post" action="{{route('post.retwind.store')}}" class="d-inline">
        @csrf
        <input type="hidden" name="id_post" value="{{$post->id_post}}">
        <button type="submit" class="btn btn-outline-primary btn-sm border-0">
          <i class="fas fa-retweet mr-2"></i> <span>{{$post->retwinds}}</span>
        </button>
      </form>
      <form method="post" action="{{route('post.like.store')}}" class="d-inline">
        @csrf
        <input type="hidden" name="id_post" value="{{$post->id_post}}">
        <button type="submit" class="btn btn-outline-danger btn-sm border-0">
          <i class="far fa-heart mr-2"></i> <span>{{$post->likes}}</span>
        </button>
      </form>
    </div>
    @endauth
  </div>
</div>
