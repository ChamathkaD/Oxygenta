@extends('layouts.app')

@section('content')

    <div class="expert_doctors_area doctor_page">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="card border-primary">

                    <div class="card-body p-5">

                        <h3 class="card-title"><b>{{ __('Register') }}</b></h3>
                        <p class="card-text">Already have an account? <a href="{{ route('login') }}" class="btn btn-link">Log in instead!</a></p>

                        @include('components.alert.error')

                        @include('form.register')

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
