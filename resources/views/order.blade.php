@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Upload Prescription</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> Upload Prescription</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome_docmed_area">

        <div class="container">

            <div class="row">

                <div class="col-xl-4 col-lg-4 d-flex align-self-center">

                    <img src="{{ asset('img/order_bg.svg') }}" alt="" class="img-fluid">

                </div>

                <div class="col-xl-8 col-lg-8">

                    <div class="welcome_docmed_info">
                        <h3>Upload Prescription</h3>

                        @include('components.alert.success')

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle mr-2"></i>
                                    {{ $error }}
                                </small>
                                <br>
                            @endforeach
                        @endif

                        <br>
                        @include('form.order')
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
