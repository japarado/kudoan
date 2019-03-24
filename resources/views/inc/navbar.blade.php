<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ URL::to('/') }}">E-Manager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @yield('home-active')">
                <a class="nav-link" href="{{ URL::to('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item @yield('login-active')">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @endguest

            @guest
                <li class="nav-item @yield('register-active')">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endguest

            @auth
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    Log Out
                </a>

                {{ Form::open(['route' => 'logout', 'method' => 'post', 'id' => 'logout-form']) }}
                    {{ Form::token() }}
                {{ Form::close() }}
            @endauth
        </ul>
        <!--<form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>-->
    </div>
</nav>
