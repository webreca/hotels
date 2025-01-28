<div class="col-lg-4">
    <div class="card wizard-card">
        <div class="card-body">
            <img loading="lazy" class="pt-3" src="{{ asset('images/dashboard-wallet.gif') }}" alt="dashboard-wizard-image"
                width="46px" />
            <h3 class="text-dark fw-bold py-3">Your {{ config('app.name', 'OYO') }} Money <sup><i
                        class="bi bi-info-circle ms-2"></i></sup></h3>
            <ul class="list-group pb-4">
                <li class="list-group-item d-flex justify-content-between align-items-center money-wizard-list-item">
                    {{ config('app.name', 'OYO') }} Money Balance
                    <span class="fw-bold">₹{{ $balance }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center money-wizard-list-item">
                    Expires
                    <span class="fw-bold">{{ $expires }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center money-wizard-list-item">
                    Usable This Month
                    <span class="fw-bold text-end">₹{{ $usable_this_month }} <br>
                    <small class="text-muted">(max ₹25000 per month)</small></span>
                </li>
            </ul>
        </div>
    </div>
</div>
