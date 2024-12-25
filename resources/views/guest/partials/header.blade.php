<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top" id="nav1">
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
                            <i class="bi bi-person-circle" style="font-size: 32px;"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-menu-link-2">
                            <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('home') }}">My Bookings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top" id="nav2" style="display: none;">
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
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-2">
                    <input type="text" class="form-control location-search"
                        placeholder="Search by city, hotel, or neighborhood">
                    <button class="btn btn-sm py-0 btn-light find-me get-my-location" id="find-me"><i
                            class="bi bi-crosshair"></i>
                        <span class="near-me">Near
                            me</span></button>
                </li>
                <li class="nav-item px-2">
                    <input type="text" placeholder="Choose Dates" name="daterange"
                        class="form-control booking-dates">
                </li>
                <li class="nav-item px-2">
                    <a href="javascript:void(0)" class="text-decoration-none text-placeholder form-control"
                        data-bs-toggle="modal" data-bs-target="#guest-modal"><span class="room-count me-1">1</span><span
                            class="room-text">Room</span>, <span class="guest-count me-1">1</span><span
                            class="guest-text">Guest</span></a>
                </li>
                <li class="nav-item px-2 d-grid">
                    <button type="button" class="btn btn-danger">Search</button>
                </li>
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
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-menu-link-1" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 32px;"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-menu-link-1">
                            <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('home') }}">My Bookings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
