<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="input-group-icon mt-10">
        <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
        <label for="email" class="d-none">{{ __('E-Mail Address') }}</label>
        <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter Email Address"
            onblur="this.placeholder = 'Enter Email Address'"
            required
            class="single-input"
            value="{{ old('email') }}"
            autocomplete="email"
            autofocus
        >
    </div>

    <div class="form-group row mb-0 mt-10">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </div>

</form>
