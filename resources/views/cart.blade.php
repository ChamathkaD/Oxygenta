@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My Cart</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> Cart</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">

        <div class="container">

            <div class="row">

                <div class="col-md-4 order-md-2 mb-4">

                    @include('components.alert.success')

                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your cart</span>
                        @if(!empty($cart))
                            <a class="btn btn-danger btn-sm" href="{{ route('deleteCart', [$cart->id]) }}"><i class="fa fa-times-circle mr-2"></i>Remove Order</a>
                        @endif
                    </h4>

                    @if(!empty($cart))

                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Total</h6>
                                    <small class="text-muted">
                                        order # @if(!empty($order)) {{ $order->id }} @endif
                                    </small>
                                </div>
                                <span class="text-muted">@if(!empty($order)) Rs. {{ number_format($cart->total,2) }} @endif</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Shipping Charges</h6>
                                </div>
                                <span class="text-success">@if(!empty($order)) @if($order->shipping == 0) Free @else Rs. {{ number_format($order->shipping,2) }} @endif @endif</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total</span>
                                <strong>@if(!empty($order)) Rs. {{ number_format($cart->grand_total,2) }} @endif</strong>
                            </li>
                        </ul>

                    @else

                        <div class="bg-secondary p-5">
                            <h5 class="my-0 text-white">There are no any orders in your Cart. Please check your orders in <a href="{{ route('account.order') }}"><u class="text-white">Order Details</u></a>.</h5>
                        </div>

                    @endif

                </div>

                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3">Shipping Address</h4>
                    @include('form.checkout')
                </div>

            </div>

        </div>

    </section>

@endsection
