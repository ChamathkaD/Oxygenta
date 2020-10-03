@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My Order History and Details</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> <a href="{{ route('account') }}">My Account</a> / Order History and Details</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">

        <div class="container-fluid">

            <div class="row d-flex justify-content-center">

                <div class="col">

                    <div class="row d-flex justify-content-center">

                        <div class="col-md-4">
                            @include('components.alert.warning')
                        </div>

                    </div>

                    <h3 class="text-center">Here are the orders you've placed since your account was created.</h3>

                    <div class="table-responsive">

                        <table class="table table-sm table-hover mt-10">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">State</th>
                                <th scope="col">City</th>
                                <th scope="col">Street</th>
                                <th scope="col">Zip</th>
                                <th scope="col">Country</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Order Created</th>
                                <th scope="col">Payment Method</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!$orders->isEmpty())
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->first_name }}</td>
                                        <td>{{ $order->last_name }}</td>
                                        <td>{{ $order->state }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>{{ $order->street }}</td>
                                        <td>{{ $order->zip }}</td>
                                        <td>{{ $order->country }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td class="@if($order->status == 1) bg-success text-white @endif">
                                            @if($order->status == 0)
                                                <i class="fa fa-play-circle text-primary"></i>
                                                <span class="text-primary">{{ "Processing" }}</span>
                                            @elseif($order->status == 1)
                                                <i class="fa fa-check"></i>
                                                <span>{{ "Approved" }}</span>
                                            @elseif($order->status == 2)
                                                <i class="fa fa-check-circle text-success"></i>
                                                <span class="text-success">{{ "Accepted" }}</span>
                                            @elseif($order->status == 3)
                                                <i class="fa fa-times-circle text-danger"></i>
                                                <span class="text-danger">{{ "Rejected" }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $order->created_at->toDayDateTimeString() }}</td>
                                        <td>
                                            @if($order->status == 0)
                                                <small>Your prescriptions are still processing.</small>
                                            @elseif($order->status == 1)
                                                <small>You can place your order.</small>
                                            @elseif($order->status == 2)
                                                @if($order->method == "cod")
                                                    Cash On Hand
                                                @endif
                                            @elseif($order->status == 3)
                                                <small>Your order was rejected.</small>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="text-center text-white">
                                    <td colspan="13" class="p-5" style="background: #5db2ff">
                                        <h2><i class="ti ti-face-sad text-white"></i> <br></h2>
                                        You have not placed any orders.
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
