<form method="POST" action="{{ route('password.change') }}">

    @csrf

    <div class="mt-10">
        <label for="current_password">{{ __('Current Password') }}</label>
        <input
            type="password"
            name="current_password"
            id="current_password"
            placeholder="Enter Current Password"
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Enter Current Password'"
            required
            class="single-input"
        >
    </div>

    <div class="mt-10">
        <label for="password">{{ __('New Password') }}</label>
        <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter New Password"
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Enter New Password'"
            required
            class="single-input"
        >
    </div>

    <div class="mt-10">
        <label for="password">{{ __('Re-enter New Password') }}</label>
        <input
            type="password"
            name="password_confirmation"
            id="password"
            placeholder="Re-Enter New Password"
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Re-Enter New Password'"
            required
            class="single-input"
        >
    </div>

    <br><br>

    <input type="submit" class="btn btn-danger btn-block" value="Change Password">

    <br>

    @if (Route::has('password.request'))
        <a class="btn btn-link text-danger" href="{{ route('password.request') }}">
            <i class="fa fa-question-circle mr-2"></i>
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
</form>
