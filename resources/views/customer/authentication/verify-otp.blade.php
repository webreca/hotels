<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Verify OTP</title>

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
                            <form method="POST" action="{{ route('login.submit-otp') }}" id="otp-form">
                                @csrf
                                <input type="hidden" name="phone" id="phone" value="{{ $login_data->phone }}">
                                <input type="hidden" name="iso2" id="iso2" value="{{ $login_data->iso2 }}">
                                <input type="hidden" name="dialcode" id="dialcode"
                                    value="{{ $login_data->dialcode }}">
                                <h2 class="fw-bold mt-2 mb-3">Share OTP</h2>
                                <p class="mt-3 mb-4 fw-bold fs-15">We have sent a temporary passcode to you at <span
                                        class="text-danger">{{ $login_data->dialcode }}
                                        {{ $login_data->phone }}</span></p>
                                <p class="mt-3 mb-4 fw-bold fs-15"><a href="{{ route('login') }}"
                                        class="text-decoration-none text-danger">Use a different number</a></p>
                                <div class="form-group mb-2">
                                    <label for="phone"
                                        class="col-form-label fw-bold text-md-end">{{ __('Enter your 4-digit passcode') }}</label>

                                    <div id="inputs" class="inputs">
                                        <input class="input" type="text" inputmode="numeric" name="otp_digit_1"
                                            maxlength="1" />
                                        <input class="input" type="text" inputmode="numeric" name="otp_digit_2"
                                            maxlength="1" />
                                        <input class="input" type="text" inputmode="numeric" name="otp_digit_3"
                                            maxlength="1" />
                                        <input class="input" type="text" inputmode="numeric" name="otp_digit_4"
                                            maxlength="1" />
                                    </div>

                                    @error('otp_digit_4')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>Please enter valid OTP.</strong>
                                        </div>
                                    @enderror

                                    @error('otp_digit_1')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>Please enter valid OTP.</strong>
                                        </div>
                                    @else
                                        @error('otp_digit_2')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>Please enter valid OTP.</strong>
                                            </div>
                                        @else
                                            @error('otp_digit_3')
                                                <div class="invalid-feedback" role="alert">
                                                    <strong>Please enter valid OTP.</strong>
                                                </div>
                                            @else
                                                @error('otp_digit_4')
                                                    <div class="invalid-feedback" role="alert">
                                                        <strong>Please enter valid OTP.</strong>
                                                    </div>
                                                @enderror
                                            @enderror
                                        @enderror
                                    @enderror



                                </div>




                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-success login-button" form="otp-form">
                                        {{ __('Submit') }}
                                    </button>


                                </div>
                                <p class="mt-3 mb-4 fw-bold fs-15"><a href="javascript:void(0)"
                                        class="text-decoration-none text-danger" id="resend-code">Resend Code
                                        <span id="timer-text" style="display: none">in <span
                                                id="timer"></span></span></a>
                                </p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('guest.partials.scripts')

    {{-- Resend OTP Script Webreca Technologies --}}
    <script>
        var timerOn = false;
        $("#resend-code").click(function() {
            resendOTP();
        });

        function resendOTP() {
            $("#resend-code").off();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "$(meta[name='csrf-token']').attr('content')",
                }
            });
            var formData = {
                dialcode: $('#dialcode').val(),
                phone: $('#phone').val(),
                iso2: $('#iso2').val(),
                _token: '{{ csrf_token() }}'
            };
            $.ajax({
                type: 'POST',
                url: '{{ route('login.resend-otp') }}',
                data: formData,
                dataType: 'json',
                beforeSend: function() {
                    console.log('Please wait sending OTP...');
                },
                success: function(res, status) {
                    $('#timer-text').show();
                    timer(30);
                },
                error: function(res, status) {
                    console.log('There was an error occured while sending OTP. Please Try again.');
                }
            });
        }
    </script>

    {{-- Resend OTP Timer Script Webreca Technologies --}}
    <script>
        function timer(remaining) {
            timerOn = true;
            var m = Math.floor(remaining / 60);
            var s = remaining % 60;
            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;
            document.getElementById('timer').innerHTML = m + ':' + s;
            remaining -= 1;

            if (remaining >= 0 && timerOn) {
                setTimeout(function() {
                    timer(remaining);
                }, 1000);
                return;
            }

            if (!timerOn) {
                // Do validate stuff here
                return;
            }

            // Do timeout stuff here
            $('#timer-text').hide();
            $("#resend-code").bind("click", function() {
                resendOTP();
            });
        }
    </script>

    {{-- OTP Input Field Handler Script Webreca Technologies --}}
    <script>
        const inputs = document.getElementById("inputs");
        inputs.addEventListener("input", function(e) {
            const target = e.target;
            const val = target.value;

            if (isNaN(val)) {
                target.value = "";
                return;
            }

            if (val != "") {
                const next = target.nextElementSibling;
                if (next) {
                    next.focus();
                }
            }
        });

        inputs.addEventListener("keyup", function(e) {
            const target = e.target;
            const key = e.key.toLowerCase();

            if (key == "backspace" || key == "delete") {
                target.value = "";
                const prev = target.previousElementSibling;
                if (prev) {
                    prev.focus();
                }
                return;
            }
        });
    </script>
</body>

</html>
