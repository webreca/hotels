<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        type="text/css">
</head>

<body class="bg-dark">
    <div id="app">
        <div class="container-fluid">
            <p id="status"></p>
            <a id="map-link" target="_blank"></a>
        </div>
        @include('customer.wizard.partials.header')
        <main class="py-0">
            <section class="container mt-0 py-3">
                <div class="row py-3">
                    <div class="col-lg-12 mx-auto">
                        <h3 class="fw-bold">Available plans</h3>
                    </div>
                    @foreach ($plans as $plan)
                        <div class="col-lg-4">
                            <div class="card plan-card">
                                <div class="card-body">
                                    <div class="text-center"><span
                                            class="badge {{$plan->name == "Silver" ? "text-dark" : ""}}" style="background-color: {{ $plan->color }}">{{ $plan->name }}</span></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
    @yield('pop-ups')
    @include('guest.partials.scripts')
</body>

</html>
