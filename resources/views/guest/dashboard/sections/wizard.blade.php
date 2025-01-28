<div class="col-lg-4">
    <div class="card wizard-card">
        <div class="card-body">
            <img loading="lazy" class="pt-3" src="{{ asset('images/dashboard-wizard.png') }}" alt="dashboard-wizard-image"
                width="44px" />
            <h3 class="text-dark fw-bold py-3">{{ config('app.name', 'OYO') }} Wizard</h3>
            <p>{{ config('app.name', 'OYO') }} Wizard is our hospitality membership program. As a member, you
                will be entitled to additional discounts of up to {{ fake()->numberBetween(10, 20) }}% on
                {{ config('app.name', 'OYO') }} Wizard member hotels and will also enjoy exclusive benefits with
                our partner alliances.</p>
            <a href="javascript:void(0)" class="btn btn-md btn-success fw-bold mb-4" id="wizard-button">
                {{ __('Buy Membership') }}
            </a>
        </div>
    </div>
</div>
