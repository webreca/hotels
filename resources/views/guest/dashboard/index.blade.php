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
@endpush
