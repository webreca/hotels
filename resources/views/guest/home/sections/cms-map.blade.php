@php
    $country_styles = [
        'indonesia' => 'color: #FF6633 !important',
        'malaysia' => 'color: #FFB399 !important',
        'denmark' => 'color: #FF33FF !important',
        'united_states' => 'color: #1AB64F !important',
        'united_kingdom' => 'color: #00B3E6 !important',
        'netherlands' => 'color: #E6B333 !important',
    ];
@endphp
<section class="cms-map mt-5 px-4">
    <div class="row">
        <div class="col-sm-6">
            <img src="https://assets.oyoroomscdn.com/cmsMedia/b44cad94-daf3-4989-b4d6-8b22487c589a.png" class="w-100">
        </div>
        <div class="col-sm-6 px-lg-5">
            <h3 class="pt-5 text-start">There's an <span class="text-danger">OYO</span> around. Always.</h3>
            <p class="pt-3 text-start">More Destinations. More Ease. More Affordable.</p>
            <div class="row">
                <div class="col-2">
                    <h2 class="pt-3 mb-0 pb-0 text-start">35+</h2>
                    <p class="mt-0 pt-0 text-start text-danger">Countries</p>
                </div>
                <div class="col-10">
                    <h2 class="pt-3 mb-0 pb-0 text-start">184,000+</h2>
                    <p class="mt-0 pt-0 text-start text-danger">Hotels & Homes</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 pb-4 pt-0">
                    <table class="table table-sm table-borderless">
                        <tbody>
                            <tr>
                                <td class="text-start bg-transparent py-2 px-0"><a href="javascript:void(0)"
                                        class="text-dark fw-bold text-decoration-none cms-countries"><i
                                            class="bi bi-compass me-1"
                                            style="{{ $country_styles['indonesia'] }}"></i>Indonesia</a></td>
                                <td class="text-start bg-transparent py-2 px-0"><a href="javascript:void(0)"
                                        class="text-dark fw-bold text-decoration-none cms-countries"><i
                                            class="bi bi-compass me-1"
                                            style="{{ $country_styles['malaysia'] }}"></i>Malaysia</a></td>
                                <td class="text-start bg-transparent py-2 px-0"><a href="javascript:void(0)"
                                        class="text-dark fw-bold text-decoration-none cms-countries"><i
                                            class="bi bi-compass me-1"
                                            style="{{ $country_styles['denmark'] }}"></i>Denmark</a></td>
                            </tr>
                            <tr>
                                <td class="text-start bg-transparent py-2 px-0"><a href="javascript:void(0)"
                                        class="text-dark fw-bold text-decoration-none cms-countries"><i
                                            class="bi bi-compass me-1"
                                            style="{{ $country_styles['united_states'] }}"></i>United States</a></td>
                                <td class="text-start bg-transparent py-2 px-0"><a href="javascript:void(0)"
                                        class="text-dark fw-bold text-decoration-none cms-countries"><i
                                            class="bi bi-compass me-1"
                                            style="{{ $country_styles['united_kingdom'] }}"></i>United Kingdom</a></td>
                                <td class="text-start bg-transparent py-2 px-0"><a href="javascript:void(0)"
                                        class="text-dark fw-bold text-decoration-none cms-countries"><i
                                            class="bi bi-compass me-1"
                                            style="{{ $country_styles['netherlands'] }}"></i>Netherlands</a></td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>

</section>
