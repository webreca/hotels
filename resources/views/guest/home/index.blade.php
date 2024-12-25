@extends('layouts.guest')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@section('content')
    @include('guest.home.sections.banner-search')
    @include('guest.home.sections.deals')
    @include('guest.home.sections.notify')
    @include('guest.home.sections.cms-map')
@endsection
@section('pop-ups')
    @include('guest.home.sections.guest-modal')
@endsection
@push('scripts')
    @include('guest.home.scripts')
@endpush
