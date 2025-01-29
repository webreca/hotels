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
    {{-- Change Navbar - Webreca Technologies --}}
    <script>
        // set variables to the navbar1, navbar2 and both navbars
        const navbar1 = document.querySelector("#nav1");
        const navbar2 = document.querySelector("#nav2");
        const navbars = document.querySelector("nav")

        // everytime the user scrolls, the window checks if the navbar1    // exists - aka render is complete
        window.onscroll = function() {
            if (navbar1) {
                renderIndexHTMLNav()
            } else {
                renderStickyNavBar(navbar2)
            }
        };
        /////////////////////////////////////////////////////////////////
        // checks if window's y coordinate surpasses either navbar's offset // from top - aka past the navbar, make sure navbars are sticky.
        // If goes back to the top of the page, remove sticky.
        function renderStickyNavBar(navbar2, navbar1) {
            if (window.pageYOffset >= navbars.offsetTop) {
                navbar2.classList.add("sticky");
                navbar1.classList.add("sticky");
            } else {
                navbar2.classList.remove("sticky");
                navbar1.classList.remove("sticky");
            }
        }
        /////////////////////////////////////////////////////////////////
        // runs the renderStickyNavBar to make sure either navbars are     // sticky
        function renderIndexHTMLNav() {
            renderStickyNavBar(navbar2, navbar1);
            // set mainbottom to determine coordinate of #about-page1 (grey div // after navbar)
            var mainbottom = $("#search-banner").offset().top + $("#search-banner").height();
            $(window).on('scroll', function() {

                // we round here to reduce a little workload
                var stop = Math.round($(window).scrollTop());

                if (stop > mainbottom) {
                    $("#nav1").hide();
                    $("#nav2").show();
                } else {
                    $("#nav2").hide();
                    $("#nav1").show();
                }

            });
        }
    </script>
@endpush
