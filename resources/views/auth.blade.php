
    @guest
        <div class="auth">
            <h3><a href="{{ route('home') }}">Авторизоваться</a></h3>
        </div>
    @else
        <div style="width: 280px; display: flex; justify-content: space-evenly; height: -webkit-fill-available; align-items: center;">
            <a id="navbarDropdown" class="" style="font-size: 1.3em;" href="{{route('updateProfile')}}">
                {{ Auth::user()->name }}
            </a>

            <div class="auth" style="width: 160px;" aria-labelledby="navbarDropdown">
                <a class="" style="line-height: 42px; font-size: 1.3em;" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    @endguest