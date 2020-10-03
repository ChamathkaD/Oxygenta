@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row text-center mt-5">

            <div class="col mb-5">

                <h1><i class="fa fa-check-circle fa-4x text-success"></i></h1>

                <h1>Thank you!</h1>

                <p>You Cash On Hand order was successfully completed.</p>

                <p class="text-success">Your order number is #{{ Session::get('order_id') }} and total payable amount is <span class="text-danger font-weight-bold">LKR {{ Session::get('grand_total') }}</span></p>

                <a href="{{ URL::to('/') }}" class="boxed-btn3">Back to Home</a>

            </div>

        </div>

    </div>

@endsection

@php

    Session::forget('order_id');
    Session::forget('grand_total');

@endphp
