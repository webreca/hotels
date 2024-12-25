{{-- Near me script (navigator.geolocation) - Webreca Technologies --}}
<script>
    function geoFindMe() {
        const status = document.querySelector("#status");
        const mapLink = document.querySelector("#map-link");

        mapLink.href = "";
        mapLink.textContent = "";

        function success(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            status.textContent = "";
            console.log(`https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`);
            console.log(`Latitude: ${latitude} °, Longitude: ${longitude} °`);
        }

        function error() {
            status.textContent = "Unable to retrieve your location";
            console.log(status.textContent);
        }

        if (!navigator.geolocation) {
            status.textContent = "Geolocation is not supported by your browser";
            console.log(status.textContent);
        } else {
            status.textContent = "Locating…";
            console.log(status.textContent);
            navigator.geolocation.getCurrentPosition(success, error);
        }
    }
    $(".get-my-location").click(function() {
        geoFindMe();
    })
</script>

{{-- Daterange Picker for Search Banner - Webreca Technologies --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(function() {
        let picker = $('input[name="daterange"]').daterangepicker({
            opens: 'bottom',
            autoApply: true,
            startDate: '{{ \Carbon\Carbon::now()->format('m/d/Y') }}',
            endDate: '{{ \Carbon\Carbon::now()->addDay(1)->format('m/d/Y') }}',
            locale: {
                cancelLabel: 'Clear'
            }
        }, function(start, end, label) {
            $('input[name="daterange"]').data('daterangepicker').setStartDate(start);
            $('input[name="daterange"]').data('daterangepicker').setEndDate(end);
        });
    });
</script>


{{-- Guest Modal Calculation - Webreca Technologies --}}
<script>
    var item_row = 2;

    function addItem() {

        if (item_row < 50) {
            html = '<tr id="item-row' + item_row + '">';
            html += '<td class="text-center py-3">Room ' + item_row + ' <input type="hidden" name="rooms[' + item_row +
                '][room]" id="room_' + item_row + '" value="' + item_row + '"></td>';
            html += '<td class="text-center py-3">';
            html += '<button type="button" class="btn btn-sm btn-danger" onclick="addGuestinRoom(' + item_row +
                ')"><i class="bi bi-plus"></i></button>';
            html += '<span class="mx-3" id="room_' + item_row + '_guest">1</span><input type="hidden" name="rooms[' +
                item_row + '][guest]" id="guest_' + item_row + '" value="1" class="total_guests">';
            html += '<button type="button" class="btn btn-sm btn-dark" onclick="removeGuestinRoom(' + item_row +
                ')"><i class="bi bi-dash"></i></button>';
            html += '</td>';
            html += '</tr>';
            $('#item tbody').append(html);
            $(".room-count").text(item_row);
            calculateTotalGuest();
            item_row++;
        }
    }
</script>

{{-- Add Guest - Webreca Technologies --}}
<script>
    function addGuestinRoom(row) {
        let current_count = $('#guest_' + row).val();

        if (current_count < 3) {
            current_count++;
            $('#guest_' + row).val(current_count);
            $('#room_' + row + '_guest').text(current_count);
        }
        calculateTotalGuest();

    }
</script>

{{-- Remove Guest - Webreca Technologies --}}
<script>
    function removeGuestinRoom(row) {
        let current_count = $('#guest_' + row).val();
        console.log(current_count);
        if (current_count > 1) {
            current_count--;
            $('#guest_' + row).val(current_count);
            $('#room_' + row + '_guest').text(current_count);
        }
        calculateTotalGuest();

    }
</script>

{{-- Remove Room - Webreca Technologies --}}
<script>
    function removeRoom() {
        var rows = $('#item tbody tr').length;
        if (rows > 1) {
            $('#item tbody tr:last').remove();
            item_row--;
            $(".room-count").text(item_row);
            calculateTotalGuest();
        }
    }
</script>

{{-- Calculate Total Guest - Webreca Technologies --}}
<script>
    function calculateTotalGuest() {
        let total_guests = 0;

        $('.total_guests').each(function() {
            total_guests += Number($(this).val());
        });

        $(".guest-count").text(total_guests);
        $(".searched-guest-count").text(total_guests);
        if (total_guests > 1) {
            $(".guest-text").text("Guests");
            $(".searched-guest-text").text("Guests");
        } else {
            $(".guest-text").text("Guest");
            $(".searched-guest-text").text("Guest");
        }
    }
</script>

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
