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
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <i class="bi bi-gear text-white" style="font-size: 32px;"></i>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
