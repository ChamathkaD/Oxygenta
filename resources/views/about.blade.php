@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>About Us</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> About</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.welcome_area')

@endsection
