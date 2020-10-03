@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Find A Doctor</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> Find A Doctor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="expert_doctors_area doctor_page">
        <div class="container">

            @if(\App\Doctor::count() != 0)
                <div class="d-flex justify-content-center">
                    @include('form.search')
                </div>

                <div class="row">

                    @foreach(\App\Doctor::all() as $doctor)
                        <div class="col-md-6 col-lg-3">
                            <div class="single_expert mb-40">
                                <div class="expert_thumb">
                                    <img src="{{ Voyager::image($doctor->avatar) }}" alt="{{$doctor->avatar}}">
                                </div>
                                <div class="experts_name text-center">
                                    <h3>{{$doctor->name}}</h3>
                                    <span>{{$doctor->specialization}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else

                <div class="col text-center">
                    <h1><i class="ti ti-face-sad"></i></h1>
                    <h4>There are no doctors at that moment. Please check again later!</h4>
                </div>

            @endif

        </div>
    </div>

@endsection
