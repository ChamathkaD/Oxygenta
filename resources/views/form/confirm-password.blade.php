<form method="POST" action="{{ route('password.update') }}">

    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

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
            value="{{ $email ?? old('email') }}"
            autocomplete="email"
            autofocus
        >
    </div>

    <div class="input-group-icon mt-10">
        <div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
        <label for="password" class="d-none">{{ __('Password') }}</label>
        <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter Password"
            onblur="this.placeholder = 'Enter Password'"
            required
            class="single-input"
            autocomplete="new-password"
        >
    </div>

    <div class="input-group-icon mt-10">
        <div class="icon"><i class="fa fa-lock" aria-hidden="true"></i></div>
        <label for="password-confirm" class="d-none">{{ __('Confirm Password') }}</label>
        <input
            type="password"
            name="password_confirmation"
            id="password-confirm"
            placeholder="Re-Enter Password"
            onblur="this.placeholder = 'Re-Enter Password'"
            required
            class="single-input"
            autocomplete="new-password"
        >
    </div>

    <div class="text-center mt-10">
        <button type="submit" class="btn btn-primary">
            {{ __('Save Changes') }}
        </button>
    </div>
</form>
