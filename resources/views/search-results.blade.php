@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Search Results</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> Search</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="expert_doctors_area doctor_page">
        <div class="container">

            <div class="d-flex justify-content-center">
                @include('form.search')
            </div>

            <h2>Search Results</h2>
            <small class="text-danger">{{ $doctors->count() }} result(s) for '{{ request()->input('query') }}</small>
            <br><br>
            <a href="{{ URL('/') }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-home mr-2"></i>Back to Home</a>

            <div class="row">

                @foreach($doctors as $doctor)
                    <div class="col-md-6 col-lg-3 mt-30">
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
        </div>
    </div>

@endsection
