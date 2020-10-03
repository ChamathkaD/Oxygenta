@extends('layouts.app')

@section('content')

    <div class="expert_doctors_area doctor_page">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="card border-primary">

                    <div class="card-body p-5">

                        <h3 class="card-title"><b>{{ __('Reset Password') }}</b></h3>
                        <br>
                        <p class="card-text">It's good idea to use a strong password that you're not using elsewhere.</p>

                        @include('components.alert.error')
                        @include('components.alert.success')
                        @include('form.confirm-password')

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
