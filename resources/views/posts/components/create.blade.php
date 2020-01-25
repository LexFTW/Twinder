<div class="media mb-5">
  <img class="mr-3 rounded-circle" style="width: 4em" src="https://www.w3schools.com/w3css/img_avatar3.png" alt="Generic placeholder image">
  <div class="media-body">
    <form action="{{route('post.create')}}" method="post">
      @csrf
      <div class="input-group">
        <textarea name="post" rows="2" class="form-control border-0" style="resize: none; outline: none" placeholder="Escribe un comentario..."></textarea>
      </div>
      <button type="submit" class="btn btn-primary float-right mt-2">Twindear</button>
    </form>
  </div>
</div>
<hr class="my-0 py-0 mb-2" style="border: 5px solid #ddd; margin-left: -20px; margin-right: -20px">
