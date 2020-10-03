<form class="form-contact contact_form" action="{{ route('contact.store') }}" method="post" id="contactForm" novalidate="novalidate">

    @csrf

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <textarea
                    class="form-control w-100"
                    name="message"
                    id="message"
                    cols="30"
                    rows="9"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Message'"
                    placeholder=" Name"></textarea>
                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input
                    class="form-control valid"
                    name="name"
                    id="name" type="text"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'"
                    placeholder="Enter your name"
                >
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <input
                    class="form-control valid"
                    name="email"
                    id="email"
                    type="email"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'"
                    placeholder="Email"
                >
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <input
                    class="form-control"
                    name="subject"
                    id="subject"
                    type="text"
                    onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Subject'"
                    placeholder="Enter Subject"
                >
                @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>
    <div class="form-group mt-3">
        <button type="submit" class="button button-contactForm boxed-btn">Send</button>
    </div>
</form>
