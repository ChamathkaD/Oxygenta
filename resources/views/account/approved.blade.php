@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My Approved Orders</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> <a href="{{ route('account') }}">My Account</a> / Approved Orders</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">

        <div class="container-fluid">

            <div class="row d-flex justify-content-center">

                <div class="col">

                    <h3 class="text-center">
                        Here are the approved orders after your prescription processing. <br> Now you can place order one by one else decline order.
                    </h3>

                    @include('components.alert.warning')

                    <div class="row mt-3">

                        <div class="col">

                            <div class="table-responsive">

                                <table class="table table-sm text-center mt-10">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"># Order ID</th>
                                        <th scope="col">Prescriptions</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!$orders->isEmpty())
                                        @foreach($orders as $order)
                                            <tr>
                                                <th scope="row">{{ $order->id }}</th>
                                                <td>
                                                    @foreach($order->prescriptions as $prescription)
                                                        <a href="{{ asset('uploads/prescriptions/'.$prescription->image) }}" target="_blank">
                                                            <img
                                                                src="{{ asset('uploads/prescriptions/'.$prescription->image) }}"
                                                                alt="{{ $prescription->image }}"
                                                                width="100px"
                                                            >
                                                        </a>
                                                    @endforeach
                                                </td>
                                                <td>{{ $order->first_name }}</td>
                                                <td>{{ $order->last_name }}</td>
                                                <td class="text-left">
                                                    {{ $order->street . "," . $order->city . "," }} <br>
                                                    {{ $order->state . "," }} <br>
                                                    {{ $order->zip }} <br>
                                                    {{ $order->country }} <br>
                                                    <span class="text-muted">{{ $order->phone }}</span> <br>
                                                    <span class="text-muted">{{ $order->email }}</span>
                                                </td>
                                                <td>LKR {{ number_format($order->total,2) }}</td>
                                                <td class="d-flex justify-content-end">
                                                    @include('form.add-cart')
                                                    <a href="{{ route('decline', [$order->id]) }}" class="btn btn-danger ml-2"><i class="fa fa-times-circle mr-2"></i>Decline</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center text-white">
                                            <td colspan="13" class="p-5" style="background: #5db2ff">
                                                <h2><i class="ti ti-face-sad text-white"></i> <br></h2>
                                                You have not approved any orders.
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
