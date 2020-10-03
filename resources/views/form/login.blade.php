<form method="POST" action="{{ route('login') }}">

    @csrf

    <div class="input-group-icon mt-10">
        <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
        <label for="email" class="d-none">{{ __('E-Mail Address') }}</label>
        <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter Email Address"
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Enter Email Address'"
            required
            class="single-input"
            value="{{ old('email') }}"
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
            onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Enter Password'"
            required
            class="single-input"
            value="{{ old('password') }}"
            autocomplete="current-password"
        >
    </div>

    <br><br>

    <input type="submit" class="btn btn-primary btn-block" value="Login">

    <br>

    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            <i class="fa fa-question-circle mr-2"></i>
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
</form>
