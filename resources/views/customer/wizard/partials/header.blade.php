<nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm sticky-top" id="nav1">
    <div class="container">
        <a class="navbar-brand fw-bold text-danger " href="{{ url('/') }}">
            <h2>{{ config('app.name', 'Laravel') }}</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login / Signup') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-menu-link-2" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-gear text-white" style="font-size: 32px;"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-menu-link-2">
                            <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('home') }}">My Bookings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                               document.getElementById('header-logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="header-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
