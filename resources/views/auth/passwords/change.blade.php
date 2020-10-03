@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Change Password</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> <a href="{{ route('account') }}">My Account</a> / <a href="{{ route('account.information') }}">Information</a> / Change Password</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">

        <div class="container">

            <div class="row d-flex justify-content-center">

                <div class="col-md-5">

                    <h3 class="card-title"><b class="text-danger">{{ __('Change Your Password') }}</b></h3>
                    <br>
                    <h4 class="card-subtitle">Change your password or recover your current one.</h4>
                    <p class="card-text">It's good idea to use a strong password that you don't use elsewhere.</p>

                    @include('components.alert.error')
                    @include('components.alert.success')

                    @include('form.change-password')
                </div>

            </div>

        </div>

    </section>

@endsection
