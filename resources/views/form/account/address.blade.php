<form action="{{ route('account.address.store', [ Auth::user()->id ]) }}" method="POST" class="form-contact contact_form">

    @csrf

    <div class="form-group row">
        <label for="country" class="col-sm-3 col-form-label text-right">Country</label>
        <div class="col-sm-9">
            <select class="form-control" id="country" name="country">
                <option selected disabled> Country </option>
                @foreach(\Illuminate\Support\Facades\DB::table('countries')->get() as $country)
                    <option value="{{ $country->nicename }}" @if(!empty(Auth::user()->address->country)) @php if(Auth::user()->address->country == $country->nicename) echo 'selected' @endphp @endif>{{ $country->name . " (" . $country->iso . ")" }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted text-right">This is for postal purposes only.</small>
            @error('country') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="state" class="col-sm-3 col-form-label text-right">State or Region</label>
        <div class="col-sm-9">
            <input
                class="form-control"
                name="state"
                id="state"
                type="text"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your State'"
                placeholder="Enter your State"
                @if(!empty(Auth::user()->address->state))
                value="{{ Auth::user()->address->state }}"
                @endif
            >
            <small class="form-text text-muted text-right">State or Region</small>
            @error('state') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="city" class="col-sm-3 col-form-label text-right">City</label>
        <div class="col-sm-9">
            <input
                class="form-control"
                name="city"
                id="city"
                type="text"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your City'"
                placeholder="Enter your City"
                @if(!empty(Auth::user()->address->city))
                value="{{ Auth::user()->address->city }}"
                @endif
            >
            <small class="form-text text-muted text-right">City for your address.</small>
            @error('city') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="street" class="col-sm-3 col-form-label text-right">Street</label>
        <div class="col-sm-9">
            <input
                class="form-control"
                name="street"
                id="street"
                type="text"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your Street'"
                placeholder="Enter your Street"
                @if(!empty(Auth::user()->address->street))
                value="{{ Auth::user()->address->street }}"
                @endif
            >
            <small class="form-text text-muted text-right">Street address, Including apartment/site no and floor etc.</small>
            @error('street') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="zip" class="col-sm-3 col-form-label text-right">Zip Code</label>
        <div class="col-sm-9">
            <input
                class="form-control"
                name="zip"
                id="zip"
                type="text"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter Zip Code'"
                placeholder="Enter your Zip Code"
                @if(!empty(Auth::user()->address->zip))
                value="{{ Auth::user()->address->zip }}"
                @endif
            >
            <small class="form-text text-muted text-right">Zip or Postal Code</small>
            @error('zip') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-sm-3 col-form-label text-right">Phone</label>
        <div class="col-sm-9">
            <input
                class="form-control"
                name="phone"
                id="phone"
                type="text"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your phone'"
                placeholder="Enter your phone"
                @if(empty(Auth::user()->address->phone))
                value="{{ Auth::user()->phone }}"
                @else
                value="{{ Auth::user()->address->phone }}"
                @endif
            >
            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="text-right mt-10">

        <button type="submit" class="btn btn-primary">
            {{ __('Save My Address') }}
        </button>
    </div>

</form>
