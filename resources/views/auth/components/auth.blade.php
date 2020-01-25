<div class="card rounded-0 mb-2">
  <div class="card-body text-center">
    <img src="https://www.w3schools.com/w3css/img_avatar3.png" class="w-100 rounded-circle" alt="">
    <h3 class="mt-2"><span>@</span>{{Auth::user()->nickname}}</h3>
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        {{ __('Cerrar Sesión') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</div>
