<h2>Contact Information</h2>

<div class="row">

    <div class="col-lg-6 col-md-6">

        <div class="mt-10">
            <label for="state" class="d-none">State</label>
            <input
                type="text"
                name="state"
                id="state"
                placeholder="Enter State"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter State'"
                class="single-input-primary"
                @if(!empty(Auth::user()->address->state))
                value="{{ Auth::user()->address->state }}"
                @endif
                aria-describedby="stateHelpBlock"
            >
            <small class="form-text text-muted" id="stateHelpBlock">State or region.</small>
        </div>

        <div class="mt-10">
            <label for="city" class="d-none">City</label>
            <input
                type="text"
                name="city"
                id="city"
                placeholder="Enter City"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter City'"
                class="single-input-primary"
                @if(!empty(Auth::user()->address->city))
                value="{{ Auth::user()->address->city }}"
                @endif
                aria-describedby="cityHelpBlock"
            >
            <small class="form-text text-muted" id="cityHelpBlock">City for your address.</small>
        </div>

        <div class="mt-10">
            <label for="street" class="d-none">Street</label>
            <input
                type="text"
                name="street"
                id="street"
                placeholder="Enter Street"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter Street'"
                class="single-input-primary"
                @if(!empty(Auth::user()->address->street))
                value="{{ Auth::user()->address->street }}"
                @endif
                aria-describedby="streetHelpBlock"
            >
            <small class="form-text text-muted" id="streetHelpBlock">Street address, Including apartment/site no and floor etc.</small>
        </div>

        <div class="mt-10">
            <label for="zip" class="d-none">Zip Code</label>
            <input
                type="text"
                name="zip"
                id="zip"
                placeholder="Enter Zip Code"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter Zip Code'"
                class="single-input-primary"
                @if(!empty(Auth::user()->address->zip))
                value="{{ Auth::user()->address->zip }}"
                @endif
                aria-describedby="zipHelpBlock"
            >
            <small class="form-text text-muted" id="zipHelpBlock">Postal Code.</small>
        </div>

    </div>

    <div class="col-lg-6 col-md-6">

        <div class="mt-10">
            <label for="phone" class="d-none">Contact Number</label>
            <input
                type="text"
                name="phone"
                id="phone"
                placeholder="Enter Contact Number"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter Contact Number'"
                class="single-input-primary"
                @if(!empty(Auth::user()->address->phone))
                value="{{ Auth::user()->address->phone }}"
                @endif
                aria-describedby="phoneHelpBlock"
            >
            <small class="form-text text-muted" id="telephone1HelpBlock">Should include area and country code.</small>
        </div>

        <div class="mt-10">
            <label for="email" class="d-none">Email Address</label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="Enter Email Address"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter Email Address'"
                class="single-input-primary"
                @if(!empty(Auth::user()->email))
                value="{{ Auth::user()->email }}"
                @endif
            >
        </div>

        <div class="mt-30 input-group-icon">
            <div class="form-select default-select" id="default-select">
                <label for="country" class="d-none">Country</label>
                <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                <select id="country" name="country">
                    <option selected disabled>Country</option>
                    @foreach(\Illuminate\Support\Facades\DB::table('countries')->get() as $country)
                        <option value="{{ $country->nicename }}" @php if(!empty(Auth::user()->address->country)) if(Auth::user()->address->country == $country->nicename) echo 'selected' @endphp >{{ $country->name . " (" . $country->iso . ")" }}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted text-right">This is for postal purposes only.</small>
            </div>
        </div>

    </div>

</div>
