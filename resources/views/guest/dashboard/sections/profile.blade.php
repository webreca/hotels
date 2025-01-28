<div class="col-lg-6">
    <div class="card profile-card">
        <div class="card-body">
            <h3 class="text-dark fw-bold py-3 float-start">{{ __('Edit Profile') }}</h3>
            <h3 class="py-3 float-end"><a href="javascript:void(0)" class="text-danger fw-bold text-decoration-none"
                    onclick="toggleProfileForm()"><i class="bi bi-pencil-square"></i></a></h3>
            <div class="clearfix"></div>
            <div class="table-responsive">
                <form action="{{route('profile')}}" method="POST" id="profile-form">
                    @csrf
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <h6 class="fw-bold mt-0 pt-0 profile-text" id="profile-name">{{ $user->name }}
                                    </h6>
                                    <input id="name" type="text"
                                        class="form-control profile-field @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $user->name) }}"
                                        onkeyup="$('#profile-name').text(this.value)" autofocus style="display: none;">
                                    @error('name')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="phone" class="form-label">{{ __('Phone') }}</label>
                                    <h6 class="fw-bold mt-0 pt-0">{{ $user->dialcode }} {{ $user->phone }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <h6 class="fw-bold mt-0 pt-0 profile-text" id="profile-email">{{ $user->email }}
                                    </h6>
                                    <input id="email" type="email"
                                        class="form-control profile-field @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email', $user->email) }}"
                                        onkeyup="$('#profile-email').text(this.value)" style="display: none;">
                                    @error('email')
                                        <div class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                            <tr class="profile-submit-button" style="display: none;">
                                <td>
                                    <button type="submit" class="btn btn-md btn-success fw-bold"
                                        id="profile-submit-button">
                                        {{ __('Update') }}
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
