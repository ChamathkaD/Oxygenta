<form action="{{ route('account.information.store', [ Auth::user()->id ]) }}" method="POST" class="form-contact contact_form">

    @csrf

    <div class="form-group row">
        <label for="first_name" class="col-sm-3 col-form-label text-right">Social Title</label>

        <div class="col-sm-9">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="mr" name="title" class="custom-control-input" value="Mr." @php if(Auth::user()->title == "Mr.") echo 'checked' @endphp>
                <label class="custom-control-label" for="mr">Mr.</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="mrs" name="title" class="custom-control-input" value="Mrs." @php if(Auth::user()->title == "Mrs.") echo 'checked' @endphp>
                <label class="custom-control-label" for="mrs">Mrs.</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="ms" name="title" class="custom-control-input" value="Ms." @php if(Auth::user()->title == "Ms.") echo 'checked'  @endphp>
                <label class="custom-control-label" for="ms">Ms.</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="dr" name="title" class="custom-control-input" value="Dr." @php if(Auth::user()->title == "Dr.") echo 'checked'  @endphp>
                <label class="custom-control-label" for="dr">Dr.</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="rev" name="title" class="custom-control-input" value="Rev." @php if(Auth::user()->title == "Rev.") echo 'checked' @endphp>
                <label class="custom-control-label" for="rev">Rev.</label>
            </div>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror

        </div>

    </div>

    <div class="form-group row">
        <label for="first_name" class="col-sm-3 col-form-label text-right">First Name</label>
        <div class="col-sm-9">
            <input
                name="first_name"
                class="form-control"
                id="first_name"
                type="text"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your first name'"
                placeholder="Enter your first name"
                value="{{ Auth::user()->first_name }}"
            >
            @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name" class="col-sm-3 col-form-label text-right">Last Name</label>
        <div class="col-sm-9">
            <input
                class="form-control"
                name="last_name"
                id="last_name"
                type="text"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your last name'"
                placeholder="Enter your last name"
                value="{{ Auth::user()->last_name }}"
            >
            @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label text-right">Email</label>
        <div class="col-sm-9">
            <input
                class="form-control"
                name="email"
                id="email"
                type="email"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your email'"
                placeholder="Enter your email"
                value="{{ Auth::user()->email }}"
            >
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
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
                onblur="this.placeholder = 'Enter your phone (0771234567)'"
                placeholder="Enter your phone (0771234567)"
                value="{{ Auth::user()->phone }}"
            >
            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="datepicker" class="col-sm-3 col-form-label text-right">Date of Birth</label>
        <div class="col-sm-9">
            <input
                class="form-control"
                name="dob"
                id="datepicker"
                type="text"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter Birthday'"
                placeholder="Enter Birthday"
                value="{{ Auth::user()->dob }}"
            >
            @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="gender" class="col-sm-3 col-form-label text-right">Gender</label>
        <div class="col-sm-9">
            <select class="form-control" id="gender" name="gender">
                <option selected disabled>Gender</option>
                <option value="Male" @php if(Auth::user()->gender == "Male") echo 'selected'  @endphp>Male</option>
                <option value="Female" @php if(Auth::user()->gender == "Female") echo 'selected'  @endphp>Female</option>
                <option value="Rather not Say" @php if(Auth::user()->gender == "Rather not Say") echo 'selected'  @endphp>Rather not Say</option>
            </select>
            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="nic" class="col-sm-3 col-form-label text-right">NIC or Passport</label>
        <div class="col-sm-9">
            <input
                class="form-control"
                name="nic"
                id="nic"
                type="text"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter your NIC'"
                placeholder="Enter your NIC"
                value="{{ Auth::user()->nic }}"
            >
            @error('nic') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="text-right mt-10">

        <a href="{{ route('password.change') }}" class="btn btn-link">
            <i class="fa fa-lock"></i>
            Change Password
        </a>

        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>

</form>
