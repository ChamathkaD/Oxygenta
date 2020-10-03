<form method="POST" action="{{ route('register') }}">

    @csrf

    <div class="input-group-icon mt-10">
        <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
        <label for="first_name" class="d-none">{{ __('First Name') }}</label>
        <input
            type="text"
            name="first_name"
            id="first_name"
            placeholder="Enter First Name"
            onblur="this.placeholder = 'Enter First Name'"
            required
            class="single-input"
            value="{{ old('first_name') }}"
            autocomplete="first_name"
            autofocus
        >
    </div>

    <div class="input-group-icon mt-10">
        <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
        <label for="last_name" class="d-none">{{ __('Last Name') }}</label>
        <input
            type="text"
            name="last_name"
            id="last_name"
            placeholder="Enter Last Name"
            onblur="this.placeholder = 'Enter Last Name'"
            required
            class="single-input"
            value="{{ old('last_name') }}"
            autocomplete="last_name"
            autofocus
        >
    </div>

    <div class="input-group-icon mt-10">
        <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
        <label for="phone" class="d-none">{{ __('Phone') }}</label>
        <input
            type="text"
            name="phone"
            id="phone"
            placeholder="Enter Phone"
            onblur="this.placeholder = 'Enter Phone'"
            required
            class="single-input"
            value="{{ old('phone') }}"
            autocomplete="phone"
        >
    </div>

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
        >
    </div>

    <br><br>

    <input type="submit" class="btn btn-primary btn-block" value="Register">

</form>
