<div class="col-lg-6" id="change-password-div" @if (request()->query('tab') == 'verify-otp') style="display: none;" @endif>
    <div class="card password-card">
        <div class="card-body">
            <h3 class="text-dark fw-bold float-start py-3">{{ __('Change Password') }}</h3>
            <h3 class="py-3 float-end"><a href="javascript:void(0)" class="text-danger fw-bold text-decoration-none"
                    onclick="togglePasswordForm()"><i class="bi bi-pencil-square"></i></a></h3>
            <div class="clearfix"></div>
            <div class="table-responsive">
                <form action="{{ route('password') }}" method="POST" id="password-form">
                    @csrf
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <label for="current_password"
                                        class="form-label">{{ __('Current Password') }}</label>
                                    <h6 class="fw-bold mt-0 pt-0 password-text">
                                        ●&nbsp;●&nbsp;●&nbsp;●&nbsp;●&nbsp;●&nbsp;●&nbsp;●
                                    </h6>
                                    <input id="current_password" type="password"
                                        class="form-control password-field @error('current_password') is-invalid @enderror"
                                        name="current_password" value="{{ old('current_password') }}"
                                        style="display: none;">
                                    @error('current_password')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="password-field" style="display: none;">
                                <td>
                                    <label for="new_password" class="form-label">{{ __('New Password') }}</label>
                                    <input id="new_password" type="password"
                                        class="form-control profile-field @error('new_password') is-invalid @enderror"
                                        name="new_password" value="{{ old('new_password') }}">
                                    <span class="help-text text-sm text-muted small">Password should have atleast 8
                                        characters including 1 special character.</span>
                                    @error('new_password')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                            </tr>

                            <tr class="password-submit-button" style="display: none;">
                                <td>
                                    <button type="submit" class="btn btn-md btn-success fw-bold"
                                        id="password-submit-button">
                                        {{ __('Update') }}
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0)" class="text-danger bg-light text-decoration-none" onclick="sendOTP()">Forgot
                                        Password ?</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
