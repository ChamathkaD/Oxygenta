<form action="{{ route('checkout') }}" method="POST" class="needs-validation" novalidate>

    @csrf
    @if(!empty($order))
        <input type="hidden" name="order_id" value="{{ $order->id }}">
    @endif
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input
                type="text"
                class="form-control @error('first_name') is-invalid @enderror"
                id="firstName"
                name="first_name"
                placeholder="First Name"
                value="@if(!empty($order)) {{ $order->first_name }} @endif"
                required
            >
            @error('first_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input
                type="text"
                class="form-control @error('last_name') is-invalid @enderror"
                id="lastName"
                name="last_name"
                placeholder="Last Name"
                value="@if(!empty($order)){{ $order->last_name }} @endif"
                required
            >
            @error('last_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="email">Email <span class="text-muted">(Optional)</span></label>
        <input
            type="email"
            class="form-control @error('email') is-invalid @enderror"
            name="email"
            id="email"
            placeholder="you@example.com"
            value="@if(!empty($order->email)){{ $order->email }} @endif"
        >
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <input
                type="text"
                class="form-control @error('state') is-invalid @enderror"
                name="state"
                id="state"
                placeholder="State or Region"
                value="@if(!empty($order->state)) {{ $order->state }} @endif"
            >
            @error('state')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label for="city">City</label>
            <input
                type="text"
                class="form-control @error('city') is-invalid @enderror"
                id="city"
                name="city"
                placeholder="City"
                value="@if(!empty($order->city)) {{ $order->city }} @endif"
            >
            @error('city')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label for="street">Street</label>
            <input
                type="text"
                class="form-control @error('street') is-invalid @enderror"
                id="street"
                name="street"
                placeholder="Street"
                value="@if(!empty($order->street)) {{ $order->street }} @endif"
                required
            >
            @error('street')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="zip">Zip</label>
            <input
                type="text"
                class="form-control @error('zip') is-invalid @enderror"
                id="zip"
                name="zip"
                placeholder="Zip"
                value="@if(!empty($order->zip)) {{ $order->zip }} @endif"
                required
            >
            @error('zip')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100 @error('country') is-invalid @enderror" id="country" name="country" required>
                @if(empty($order->country))
                    <option disabled selected>Select Country</option>
                @endif
                @foreach(\Illuminate\Support\Facades\DB::table('countries')->get() as $country)
                    <option value="{{ $country->nicename }}" @php if(!empty($order->country)) if($order->country == $country->nicename) echo 'selected' @endphp>{{ $country->nicename }}</option>
                @endforeach
            </select>
            @error('country')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <label for="phone">Phone</label>
            <input
                type="text"
                class="form-control @error('phone') is-invalid @enderror"
                id="phone"
                name="phone"
                placeholder="Phone"
                value="@if(!empty($order->phone)) {{ $order->phone }} @endif"
                required
            >
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <hr class="mb-4">
    <div class="custom-control custom-checkbox">
        <input
            type="checkbox"
            class="custom-control-input"
            id="save-info"
            name="saveAddress"
            value="1"
        >
        <label class="custom-control-label" for="save-info">Save this address information for next time</label>
    </div>

    <button class="btn btn-primary btn-lg btn-block mt-3" type="submit">Continue to checkout</button>
</form>
