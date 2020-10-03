@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible mt-3" style="font-family: 'Open Sans', sans-serif;">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">
                    &times;
                </span>
        </button>
        <i class="fa fa-check-circle mr-2"></i>
        {!! session()->get('success') !!}
    </div>
@endif
