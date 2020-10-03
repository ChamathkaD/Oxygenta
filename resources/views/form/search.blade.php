<form action="{{ route('search') }}" method="GET">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control border border-primary" placeholder="Search Doctors..." name="query" value="{{ request()->input('query') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>

</form>
