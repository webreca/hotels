<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Login </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/intl-tel-input/css/intlTelInput.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        type="text/css">

    @stack('styles')
</head>

<body>
    <div id="app" class="login-bg">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <a class="navbar-brand fw-bold text-dark" href="{{ url('/') }}">
                        <div class="login-page-logo">
                            <h2>{{ config('app.name', 'Laravel') }} </h2>
                            <h6 class="mt-3">
                                <span class="text-white fw-bold">Hotels and homes across 800 cities, 24+
                                    countries</span>
                            </h6>
                        </div>
                    </a>
                    <div class="login-content-card d-none d-lg-block">
                        <h1 class="text-white fw-bold login-content-heading">There’s a smarter way to OYO around</h1>
                        <p class="text-white fw-bold login-content-description">Sign up with your phone number and get
                            exclusive access to discounts and savings on OYO stays and with our many travel partners.
                        </p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card my-5">
                        <div class="card-header bg-danger text-start fs-13"><button
                                class="btn btn-sm btn-light btn-rounded me-2"><i
                                    class="bi bi-percent"></i></button><span
                                class="fw-bold">{{ __('Sign up & Get ₹500 OYO Money') }}</span></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('signup') }}" id="login-form">
                                @csrf
                                <h2 class="fw-bold mt-2 mb-3">Onboarding</h2>

                                <div class="form-group mb-2">
                                    <label for="phone"
                                        class="col-form-label fw-bold text-md-end">{{ __('Phone Number') }}</label>

                                    <input id="phone" type="text"
                                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone', $user->phone) }}" autocomplete="phone"
                                        readonly>

                                    <input id="dial-code" name="dialcode" type="hidden">
                                    @error('phone')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="name"
                                        class="col-form-label fw-bold text-md-end">{{ __('Full Name') }}</label>

                                    <input id="name" type="text"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label for="email"
                                        class="col-form-label fw-bold text-md-end">{{ __('Email Address') }}</label>

                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email-address">

                                    @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-broup mb-2" id="password_div">
                                    <label for="password"
                                        class="col-form-label fw-bold text-md-end">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" autocomplete="new-password">

                                    @error('password')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2" style="display: none;">
                                    <select id="country" class="form-select" name="iso2">
                                        <option value="">Select Country</option>
                                    </select>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-success login-button" form="login-form">
                                        {{ __('Complete Onboarding') }}
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('guest.partials.scripts')

    {{-- Dialcode Selector Script - Webreca Technologies --}}
    <script src="{{ asset('plugins/intl-tel-input/js/intlTelInput.min.js') }}"></script>
    <script>
        // get the country data from the plugin
        var countryData = window.intlTelInputGlobals.getCountryData(),

            input = document.querySelector("#phone"),
            dialCode = document.querySelector("#dial-code");
        countryDropdown = document.querySelector("#country");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            var optionNode = document.createElement("option");
            optionNode.value = country.iso2;
            var textNode = document.createTextNode(country.name);
            optionNode.appendChild(textNode);
            countryDropdown.appendChild(optionNode);
        }

        // init plugin
        var iti = window.intlTelInput(input, {
            initialCountry: "{{ old('iso2', $user->iso2) }}",
            utilsScript: "{{ asset('plugins/intl-tel-input/js/utils.js') }}" // just for formatting/placeholders etc
        });

        // set it's initial value
        dialCode.value = '+' + iti.getSelectedCountryData().dialCode;
        countryDropdown.value = iti.getSelectedCountryData().iso2;

        // listen to the telephone input for changes
        input.addEventListener('countrychange', function(e) {
            dialCode.value = '+' + iti.getSelectedCountryData().dialCode;
            countryDropdown.value = iti.getSelectedCountryData().iso2;
        });

        // listen to the address dropdown for changes
        countryDropdown.addEventListener('change', function() {
            iti.setCountry(this.value);
        });
    </script>

</body>

</html>
