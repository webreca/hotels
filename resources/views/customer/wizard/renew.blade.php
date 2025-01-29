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
                    <div class="col-lg-12 mx-auto mb-3">
                        <h3 class="fw-bold">Available plans</h3>
                    </div>
                    @foreach ($plans as $plan)
                        <div class="col-lg-4">
                            <div class="card plan-card" style="border-top: 1px solid {{ $plan->color }} !important;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <span class="badge text-dark"
                                            style="background-color: {{ $plan->color }}">{{ Str::upper($plan->name) }}</span>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless borderless mt-5">
                                            <tbody>
                                                @foreach ($plan->benefits as $benefit)
                                                    <tr>
                                                        <td class="bg-transparent">
                                                            <h4><i class="bi bi-check2 my-auto"
                                                                    style="color: {{ $plan->color }} !important;"></i>
                                                            </h4>
                                                        </td>
                                                        <td class="bg-transparent">
                                                            <h6 class="mb-0 pb-0 text-white plan-title">{{ $benefit->title }}</h6>
                                                            <p class="mt-0 pt-0 small text-light plan-description">
                                                                {{ $benefit->description }}</p>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @php
                                        $discount   = round($plan->discount_type == "flat" ? $plan->discount : $plan->price * $plan->discount / 100);
                                        $total      = round($plan->price - $discount);
                                    @endphp
                                    <div class="plan-button d-grid gap-2">
                                        <button class="btn" style="background-color: {{ $plan->color }}">Renew to wizard {{ $plan->name }} for {{ config('app.currency_symbol') }}{{ $total }} <span class="text-decoration-line-through ms-1">{{ config('app.currency_symbol') }}{{ $plan->price }}</span></button>
                                    </div>
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
