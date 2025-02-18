<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <a class="navbar-brand text-uppercase" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item text-uppercase">
                                    <a class="nav-link text-uppercase" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item nav-text-menu">
                                <a class="nav-link text-uppercase" href="{{ route('atom.new') }}">{{ __('New Atom') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link text-uppercase" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-circle" src="{{ Gravatar::get(Auth::user()->email, 'navigation') }}" height="32" width="32" /></a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-uppercase" href="{{ route('profile.index', ['username' => Auth::user()->name]) }}">{{ __('Your Profile') }}</a>
                                    <a class="dropdown-item text-uppercase" href="#">{{ __('Your Atoms') }}</a>
                                    <a class="dropdown-item text-uppercase" href="#">{{ __('Update Profile') }}</a>
                                    <a class="dropdown-item text-uppercase" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>