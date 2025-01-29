<div class="col-lg-6" id="forgot-password-div" @if (request()->query('tab') == 'verify-otp') @else style="display: none;" @endif>
    <div class="card password-card">
        <div class="card-body">
            <h3 class="text-dark fw-bold float-start py-3">{{ __('Change Password') }}</h3>
            <h3 class="py-3 float-end"><a href="javascript:void(0)" class="text-danger fw-bold text-decoration-none"
                    onclick="togglePasswordForm()"><i class="bi bi-pencil-square"></i></a></h3>
            <div class="clearfix"></div>
            <div class="table-responsive">
                <form action="{{ route('forgot-password') }}" method="POST" id="forgot-password-form">
                    @csrf
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <label for="otp" class="form-label">{{ __('Enter OTP') }}</label>

                                    <input id="otp" type="text"
                                        class="form-control @error('otp') is-invalid @enderror" name="otp"
                                        value="{{ old('otp') }}" required>
                                    @if (request()->query('tab') == 'verify-otp')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>Please enter correct OTP</strong>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr class="password-field">
                                <td>
                                    <label for="forgot_new_password" class="form-label">{{ __('New Password') }}</label>
                                    <input id="forgot_new_password" type="password"
                                        class="form-control profile-field @error('new_password') is-invalid @enderror"
                                        name="new_password" value="{{ old('new_password') }}" required>
                                    <span class="help-text text-sm text-muted small">Password should have atleast 8
                                        characters including 1 special character.</span>
                                    @error('new_password')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                            </tr>

                            <tr class="forgot-password-submit-button">
                                <td>
                                    <button type="submit" class="btn btn-md btn-success fw-bold"
                                        id="forgot-password-submit-button">
                                        {{ __('Update') }}
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="mt-3 mb-4 fw-bold fs-15"><a href="javascript:void(0)"
                                            class="text-decoration-none text-danger bg-light" id="resend-code">Resend
                                            Code
                                            <span id="timer-text" style="display: none">in <span
                                                    id="timer"></span></span></a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
