@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My Order Review</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> Order Review</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">

        <div class="container">

            <div class="row">

                <div class="col-md-4 order-md-2 mb-4">

                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Review and Payment</span>
                    </h4>

                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">Sub Total</h6>
                                <small class="text-muted">
                                    order # @if(!empty($order)) {{ $order->id }} @endif
                                </small>
                            </div>
                            <span class="text-muted">@if(!empty($order)) Rs. {{ number_format($order->total,2) }} @endif</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <div class="text-success">
                                <h6 class="my-0">Shipping Charges</h6>
                            </div>
                            <span class="text-success">@if($order->shipping == 0) Free @else Rs. {{ number_format($order->shipping,2) }} @endif</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong>@if(!empty($order)) Rs. {{ number_format($order->grand_total,2) }} @endif</strong>
                        </li>
                        <li class="list-group-item">
                            <span>Select Payment Method</span>
                            @include('form.payment')
                        </li>
                    </ul>

                </div>

                <div class="col-md-8 order-md-1">
                    <h3 class="mb-3">Almost there! Review and place your medicine.</h3>

                    <br>

                    <h4>
                        <i class="fa fa-map-marker"></i>
                        Shipping Information
                    </h4>

                    <br>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h4 class="text-primary"><i class="fa fa-user mr-2"></i>First name</h4>
                            <small>{{ $order->first_name }}</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h4 class="text-primary"><i class="fa fa-user mr-2"></i>Last name</h4>
                            <small>{{ $order->last_name }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5 class="text-primary"><i class="fa fa-envelope mr-2"></i>Email</h5>
                            <small>{{ $order->email }}</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5 class="text-primary"><i class="fa fa-phone-square mr-2"></i>Phone</h5>
                            <small>{{ $order->phone }}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <h5 class="text-primary"><i class="fa fa-location-arrow mr-2"></i>Address</h5>
                            <small>{{ $order->state }}</small>, <br>
                            <small>{{ $order->city }}</small>, <br>
                            <small>{{ $order->street }}</small>. <br>
                            <small>{{ $order->zip }}</small>
                            <small>{{ $order->country }}</small>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
