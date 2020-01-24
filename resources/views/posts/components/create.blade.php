<div class="mb-5">
  <form action="{{route('post.create')}}" method="post">
    @csrf
    <div class="input-group">
      <textarea name="post" rows="3" class="form-control" placeholder="Escribe un comentario..."></textarea>
    </div>
    <button type="submit" class="btn btn-primary float-right mt-2">Twindear</button>
  </form>
</div>
