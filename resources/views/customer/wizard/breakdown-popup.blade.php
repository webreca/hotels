<!-- Modal -->
<div class="modal fade" id="breakdown-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="breakdown-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pb-1 mb-1 border-bottom-none">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 mt-0">
               <div class="wizard-breakdown-image">
                <h2 class="text-danger text-center mt-3 pt-5 mb-0 pb-0 fw-bold">{{ config('app.name', 'Laravel') }}</h2>
                <h1 class="text-white text-center mt-0 pt-0">WIZARD</h1>
               </div>
               <div class="table-responsive">
                     <table class="table table-borderless">
                        <thead>
                            <tr>
                                <td><small class="text-muted fs-12">PAYMENT DETAILS</small></td>
                                <td></td>
                            </tr>
                        </thead>
                          <tbody>
                            <tr class="border-border-none border-top-none">
                                <td class="text-start fs-14">Membership Amount</td>
                                <td class="text-end fs-14" id="breakdown-amount">₹ 199</td>
                            </tr>
                            <tr class="border-border-none border-top-none">
                                <td class="text-start fs-14" id="breakdown-discount-type">Early Bird Discount (50% Off)</td>
                                <td class="text-end fs-14" id="breakdown-discount">- ₹ 100</td>
                            </tr>
                            <tr class="border-border-none border-top-none">
                                <td class="text-start fs-14">Have a Coupon Code</td>
                                <td class="text-end fs-14"><a href="javascript:void(0)" class="text-decoration-none"><i class="bi bi-pencil-square"></i></a></td>
                            </tr>
                            <tr class="border-border-none border-top-none">
                                <td class="text-start fw-bold fs-16">Payable Amount</td>
                                <td class="text-end fw-bold fs-16" id="breakdown-payable">₹ 99</td>
                            </tr>
                          </tbody>
                     </table>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
