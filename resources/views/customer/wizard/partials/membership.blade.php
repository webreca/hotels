<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header bg-dark text-white">
        <h5 id="offcanvasRightLabel" class="text-white">Membership Settings</h5>
        <button type="button" class="btn-close text-reset text-white" data-bs-dismiss="offcanvas"
            aria-label="Close">X</button>
    </div>
    <div class="offcanvas-body bg-dark text-white">
        <h2 class="text-title text-white mb-0 mt-0">Your base hotels</h2>
        <p class="text-description mt-1">You get flat 0% off on a wizard base hotels</p>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td class="bg-dark ps-0 ms-0"><i class="bi bi-info-circle"></i></td>
                    <td class="bg-dark text-base">To change or add another base hotel, download the OYO app on your smartphone.</td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex">
            <img src="{{ asset('images/wizard-google-play-footer.webp') }}" alt="google-play-store" class="me-2 ms-4" width="132px">
            <img src="{{ asset('images/wizard-apple-app-store.webp') }}" alt="apple-app-store" width="132px">
        </div>
        <h5 class="text-white mt-4">Membership Details</h5>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td class="bg-dark ps-0 ms-0 pb-3 text-mute">Current Plan</td>
                    <td class="bg-dark pb-3 text-end">Blue</td>
                </tr>
                <tr class="border-top-dashed">
                    <td class="bg-dark ps-0 ms-0 text-mute">Membership expires on</td>
                    <td class="bg-dark text-end">{{ \Carbon\Carbon::now()->format('M d, Y')  }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
