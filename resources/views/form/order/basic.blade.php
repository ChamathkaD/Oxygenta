<h2>Basic Information</h2>

<div class="row">

    <div class="col-lg-6 col-md-6">

        <div class="mt-10">
            <label for="first_name" class="d-none">First Name</label>
            <input
                type="text"
                name="first_name"
                id="first_name"
                placeholder="Enter First Name"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'First Name'"
                class="single-input-primary"
                value="{{ Auth::user()->first_name }}"
            >
        </div>

        <div class="mt-10">
            <label for="nic" class="d-none">NIC / Passport Number</label>
            <input
                type="text"
                name="nic"
                id="nic"
                placeholder="Enter NIC / Passport Number"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Enter NIC / Passport Number'"
                class="single-input-primary"
                value="{{ Auth::user()->nic }}"
            >
        </div>

        <div class="mt-10">
            <label for="datepicker" class="d-none">Birthday</label>
            <input
                type="text"
                name="dob"
                id="datepicker"
                placeholder="Birthday"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Birthday'"
                class="single-input-primary"
                value="{{ Auth::user()->dob }}"
            >
        </div>

    </div>

    <div class="col-lg-6 col-md-6">

        <div class="mt-10">
            <label for="last_name" class="d-none">Last Name</label>
            <input
                type="text"
                name="last_name"
                id="last_name"
                placeholder="Enter Last Name"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Last Name'"
                class="single-input-primary"
                value="{{ Auth::user()->last_name }}"
            >
        </div>

        <div class="mt-10 input-group-icon">
            <div class="form-select default-select" id="default-select">
                <label for="gender" class="d-none">Gender</label>
                <div class="icon"><i class="fa fa-male" aria-hidden="true"></i></div>
                <select id="gender" name="gender">
                    <option selected disabled>Gender</option>
                    <option value="Male" @php if(Auth::user()->gender == "Male") echo 'selected'  @endphp>Male</option>
                    <option value="Female" @php if(Auth::user()->gender == "Female") echo 'selected'  @endphp>Female</option>
                    <option value="Rather not Say" @php if(Auth::user()->gender == "Rather not Say") echo 'selected'  @endphp>Rather not Say</option>
                </select>
            </div>
        </div>

    </div>

</div>
