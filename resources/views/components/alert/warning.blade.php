@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible mt-3" style="font-family: 'Open Sans', sans-serif;">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">
                    &times;
                </span>
        </button>
        <i class="fa fa-exclamation-circle mr-2"></i>
        {!! session()->get('warning') !!}
    </div>
@endif
