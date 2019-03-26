<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ URL::to('/') }}">{{ env('APP_NAME') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">

            @auth
                @if(Auth::user()->type == 'USER')
                    <li class="nav-item @yield('user-active')">
                        <a class="nav-link" href="{{ route('user.index') }}">My Events<span class="sr-only">(current)</span></a>
                    </li>
                @endif
            @endauth

            @auth
                @if(Auth::user()->type == 'USER')
                    <li class="nav-item @yield('program-active')">
                        <a class="nav-link" href="{{ route('program.index') }}">Programs<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item @yield('speaker-active')">
                        <a class="nav-link" href="{{ route('speaker.index') }}">Speakers<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item @yield('sponsor-active')">
                        <a class="nav-link" href="{{ route('sponsor.index') }}">Sponsors<span class="sr-only">(current)</span></a>
                    </li>
                @endif
            @endauth

            @auth
                @if(Auth::user()->type == 'ADMIN')

                    <li class="nav-item @yield('program-active')">
                        <a class="nav-link" href="{{ route('program.index') }}">Programs<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item @yield('create-program-active')">
                        <a class="nav-link" href="{{ route('program.create') }}">Create Program<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item @yield('speaker-active')">
                        <a class="nav-link" href="{{ route('speaker.index') }}">Speakers<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item @yield('create-speaker-active')">
                        <a class="nav-link" href="{{ route('speaker.create') }}">Create Speakers<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item @yield('sponsor-active')">
                        <a class="nav-link" href="{{ route('sponsor.index') }}">Sponsors<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item @yield('create-sponsor-active')">
                        <a class="nav-link" href="{{ route('sponsor.create') }}">Create Sponsors<span class="sr-only">(current)</span></a>
                    </li>
                @endif
            @endauth

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
                @if(Auth::user()->type == 'ADMIN')
                    <li class="nav-item">
    public function index()
                        <a class="nav-link @yield('dashboard-active')" href="{{ route('admin.index') }}">
                            Dashboard
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link">
                        {{ Auth::user()->name }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                        Log Out
                    </a>
                </li>

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
