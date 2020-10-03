@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My address</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> <a href="{{ route('account') }}">My Account</a> / Address</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">

        <div class="container">

            <div class="row d-flex justify-content-center">

                <div class="col">
                    @include('components.alert.success')
                    @include('form.account.address')
                </div>

            </div>

        </div>

    </section>

@endsection
