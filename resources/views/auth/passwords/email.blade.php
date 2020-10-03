@extends('layouts.app')

@section('content')

    <div class="expert_doctors_area doctor_page">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="card border-primary">

                    <div class="card-body p-5">

                        <h3 class="card-title"><b>{{ __('Reset Password') }}</b></h3>
                        <br>
                        <h4 class="card-subtitle">Don't worry! Just fill in your email and we'll send you a link to rest your password.</h4>
                        <br>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('components.alert.error')
                        @include('components.alert.success')

                        @include('form.reset-password')

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
