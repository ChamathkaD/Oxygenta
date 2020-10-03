@extends('layouts.app')

@section('content')

    <div class="expert_doctors_area doctor_page">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="card border-primary">

                    <div class="card-body p-5">

                        <h3 class="card-title"><b>{{ __('Sign In') }}</b></h3>
                        <br>
                        <h4 class="card-subtitle">Order your monthly medicines and get delivered doorstep</h4>
                        <p class="card-text">We won't spam your account. Set your permissions during sign up or any time afterward.</p>

                        <br>

                        @include('components.alert.error')
                        @include('components.alert.success')

                        @include('form.login')

                    </div>

                    <div class="card-footer">
                        <a class="btn btn-link" href="{{ route('register') }}">No account? Create one here</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
