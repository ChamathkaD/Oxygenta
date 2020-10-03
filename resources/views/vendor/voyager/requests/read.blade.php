@extends('voyager::master')

@section('page_title', "Prescriptions")

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-logbook"></i> Prescriptions For Processing
        </h1>
    </div>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col" style="margin: 20px">
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <div class="row">
                            @foreach($prescriptions as $prescription)
                                <div class="col-xs-6 col-md-3 col-lg-4 text-center">
                                    <a target="_blank" href="{{ asset('uploads/prescriptions/'.$prescription->image) }}" class="thumbnail">
                                        <img src="{{ asset('uploads/prescriptions/'.$prescription->image) }}" alt="{{ $prescription->image }}" width="75%">
                                    </a>

                                    <a class="btn btn-primary" href="{{ asset('uploads/prescriptions/'.$prescription->image) }}" target="_blank">View Prescription</a>
                                </div>
                                @php $order_id = $prescription->order_id @endphp
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md" style="margin: 20px">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        @include('components.alert.success')
                        @include('components.alert.error')
                        @include('form.admin.prescription_price')
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
