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
                    <h1 class="text-danger text-center pt-3 mb-0 pb-0 fw-bold">{{ config('app.name', 'Laravel') }}</h2>
                    <h2 class="text-white text-center mt-0 pt-0">WIZARD</h1>
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
                                <td class="text-end fs-14" id="breakdown-amount">₹ 0</td>
                            </tr>
                            <tr class="border-border-none border-top-none">
                                <td class="text-start fs-14" id="breakdown-discount-type">No Discount</td>
                                <td class="text-end fs-14" id="breakdown-discount">- ₹ 0</td>
                            </tr>
                            <tr class="border-border-none border-top-none">
                                <td class="text-start fs-14">Have a Coupon Code</td>
                                <td class="text-end fs-14"><a href="javascript:void(0)" onclick="$('#coupon-row').toggle()"
                                        class="text-decoration-none text-primary"><i
                                            class="bi bi-pencil-square"></i></a></td>
                            </tr>
                            <tr class="border-border-none border-top-none" id="coupon-row" style="display: none">
                            <td colspan="2">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Enter Coupon Code"
                                        id="coupon-code" name="coupoin_code">
                                    <div class="input-group-append">
                                        <button class="btn btn-success border-radius-none" type="button">Apply</button>
                                    </div>
                                </div>

                            </td>
                            </tr>
                            <tr class="border-border-none border-top-none">
                                <td class="text-start fw-bold fs-16">Payable Amount</td>
                                <td class="text-end fw-bold fs-16" id="breakdown-payable">₹ 0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success w-100">Pay Now</button>
            </div>
        </div>
    </div>
</div>
