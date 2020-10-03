@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My Account</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> My Account</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">

        <div class="container">

            <div class="row d-flex justify-content-center text-center">

                <a class="col-lg-4 col-md-6 col-sm-6 col-xs-12 p-5" id="account-item" href="{{ route('account.information') }}">

                    <i class="fa fa-user-circle fa-4x"></i> <br>
                    <span>Information</span>

                </a>

                <a class="col-lg-4 col-md-6 col-sm-6 col-xs-12 p-5" id="account-item" href="{{ route('account.address') }}">

                    <i class="fa fa-location-arrow fa-4x"></i> <br>
                    <span>Address</span>

                </a>

                <a class="col-lg-4 col-md-6 col-sm-6 col-xs-12 p-5" id="account-item" href="{{ route('account.order') }}">

                    <i class="fa fa-calendar-o fa-4x"></i> <br>
                    <span>Order History and Details</span>

                </a>

                @php
                    $count = DB::table('orders')
                            ->where('status', 1)
                            ->where('user_id', Auth::user()->id)
                            ->count();
                @endphp
                <a class="col-lg-4 col-md-6 col-sm-6 col-xs-12 p-5" id="account-item" href="{{ route('account.approved') }}">

                    <i class="fa fa-calendar-check-o fa-4x"></i> <br>
                    <span>Approved Orders</span>
                    <br>
                    @if($count > 0)
                        <span class="badge badge-danger ml-2">{{ $count }}</span>
                    @endif
                </a>

                <a class="col-lg-4 col-md-6 col-sm-6 col-xs-12 p-5" id="account-item" href="{{ route('account.prescription') }}">

                    <i class="fa fa-clipboard fa-4x"></i> <br>
                    <span>Uploaded Prescriptions</span>

                </a>

            </div>

        </div>

    </section>

@endsection

@push('css')

    <style>

        #account-item:hover {
            color: #61b3fc;
        }

        #account-item span {
            font-size: 24px;
        }

    </style>

@endpush
