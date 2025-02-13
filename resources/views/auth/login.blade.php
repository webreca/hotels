<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                            <form method="POST" action="{{ route('login.verify-number') }}" id="login-form">
                                @csrf
                                <h2 class="fw-bold mt-2 mb-3">Login / Signup</h2>

                                <div class="form-group mb-2">
                                    <label for="phone"
                                        class="col-form-label fw-bold text-md-end">{{ __('Please enter your phone number to continue') }}</label>

                                    <input id="phone" type="text"
                                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ old('phone') }}" required autocomplete="phone"
                                        autofocus>

                                    <input id="dial-code" name="dialcode" type="hidden">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-broup mb-2" id="password_div" style="display: none;">
                                    <label for="password"
                                        class="col-form-label fw-bold text-md-end">{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2" style="display: none;">
                                    <select id="country" class="form-select" name="iso2">
                                        <option value="">Select Country</option>
                                    </select>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-success login-button" form="login-form">
                                        {{ __('Verify Number') }}
                                    </button>

                                    <p class="mt-3 mb-5" id="password_text">Prefer to Sign in with password instead? <a
                                            href="javascript:void(0)" class="text-danger text-decoration-none fw-bold"
                                            onclick="showPasswordField()">Click Here</a></p>
                                    <p class="mt-3 mb-5" id="otp_text" style="display: none">Prefer to Sign in with OTP
                                        instead? <a href="javascript:void(0)"
                                            class="text-danger text-decoration-none fw-bold"
                                            onclick="showOTPField()">Click Here</a></p>
                                    <p class="mt-5 pt-5 fs-14 no-span fw-bold other-login-options">Or sign in as</p>
                                    <ul class="list-inline login-other-options other-login-options">
                                        <li class="list-inline-item sign-in-travel-agent fw-bold">Travel Agent <i
                                                class="bi bi-chevron-right text-grey ms-2"></i></li>
                                        <li class="list-inline-item sign-in-corporate ps-4 fw-bold">Corporate <i
                                                class="bi bi-chevron-right text-grey ms-2"></i></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
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
            initialCountry: "{{ old('iso2', 'IN') }}",
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
    <script>
        function showPasswordField() {
            $('#password_div').show(1000);
            $('#password_text').hide(2000);
            $('#otp_text').show(3000);
            $('.login-button').text("Login");
            $('.other-login-options').hide(4000);
            $('#login-form').attr('action', '{{ route('login') }}');
        }
    </script>
    <script>
        function showOTPField() {
            $('#password_div').hide(1000);
            $('#password_text').show(2000);
            $('#otp_text').hide(3000);
            $('.login-button').text("Verify Number");
            $('.other-login-options').show(4000);
            $('#login-form').attr('action', '{{ route('login.verify-number') }}');
        }
    </script>
</body>

</html>
