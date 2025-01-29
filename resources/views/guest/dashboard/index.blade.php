@extends('layouts.guest')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@section('content')
    <section class="container mt-0 py-3">
        <div class="row py-3">
            <div class="col-lg-12 branding-left">
                <h3 class="text-dark fw-bold">Hi, {{ $user->name }}</h3>
            </div>
        </div>
        <div class="row py-3">
            @include('guest.dashboard.sections.wizard')
            @php
                $balance = fake()->numberBetween(2000, 3000);
                $expires = \Carbon\Carbon::now()->format('M d, Y');
                $usable_this_month = $balance;
            @endphp
            @include('guest.dashboard.sections.money')
        </div>
        <div class="row py-3">
            @include('guest.dashboard.sections.booking-history')
        </div>
        <div class="row py-3">
            @include('guest.dashboard.sections.profile')
            @include('guest.dashboard.sections.change-password')
            @include('guest.dashboard.sections.forgot-password')
        </div>
    </section>
@endsection
@section('pop-ups')
    @include('guest.home.sections.guest-modal')
@endsection
@push('scripts')
    @include('guest.home.scripts')
    <script>
        toggleProfileForm = () => {
            $('.profile-text').toggle();
            $('.profile-field').toggle();
            $('.profile-submit-button').toggle();
        }
    </script>
    <script>
        togglePasswordForm = () => {
            $('.password-text').toggle();
            $('.password-field').toggle();
            $('.password-submit-button').toggle();
        }
    </script>
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
                dialcode: "{{ $user->dialcode }}",
                phone: "{{ $user->phone }}",
                iso2: "{{ $user->iso2 }}",
                _token: "{{ csrf_token() }}"
            };
            $.ajax({
                type: "POST",
                url: "{{ route('forgot-password.resend-otp') }}",
                data: formData,
                dataType: "json",
                beforeSend: function() {
                    console.log("Please wait sending OTP...");
                    $("#change-password-div").hide();
                    $("#forgot-password-div").show();
                },
                success: function(res, status) {
                    $("#timer-text").show();
                    timer(30);
                },
                error: function(res, status) {
                    console.log('There was an error occured while sending OTP. Please Try again.');
                }
            });
        }

        function sendOTP() {


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "$(meta[name='csrf-token']').attr('content')",
                }
            });
            var formData = {
                dialcode: "{{ $user->dialcode }}",
                phone: "{{ $user->phone }}",
                iso2: "{{ $user->iso2 }}",
                _token: "{{ csrf_token() }}"
            };
            $.ajax({
                type: "POST",
                url: "{{ route('forgot-password.resend-otp') }}",
                data: formData,
                dataType: "json",
                beforeSend: function() {
                    console.log("Please wait sending OTP...");
                    $("#change-password-div").hide();

                },
                success: function(res, status) {
                    $("#forgot-password-div").show();
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
    @if (request()->query('tab') == 'verify-otp')
        <script>
            $(document).ready(function() {
                // Handler for .ready() called.
                $('html, body').animate({
                    scrollTop: $('#forgot-password-div').offset().top
                }, 'slow');
            });
        </script>
    @endif
@endpush
