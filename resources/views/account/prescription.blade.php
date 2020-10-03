@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg_2 bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>My Prescription Order History</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> <a href="{{ route('account') }}">My Account</a> / Uploaded Prescription</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">

        <div class="container">

            <div class="row d-flex justify-content-center">

                <div class="col text-center">

                    <h3>Here are the prescription orders you've placed since your account was created.</h3>

                    <div class="table-responsive">

                        <table class="table table-sm table-hover mt-10">
                            <thead>
                            <tr>
                                <th scope="col"># Prescription ID</th>
                                <th scope="col">Prescriptions</th>
                                <th scope="col">Date Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!$prescriptions->isEmpty())
                                @foreach($prescriptions as $prescription)
                                <tr>
                                    <td>{{ $prescription->id }}</td>
                                    <td>
                                        <a href="{{ asset('uploads/prescriptions/'.$prescription->image) }}" target="_blank">
                                            <img src="{{ asset('uploads/prescriptions/'.$prescription->image) }}" alt="" width="80px" height="80px">
                                        </a>
                                    </td>
                                    <td>{{ $prescription->created_at->toDayDateTimeString() }}</td>
                                </tr>
                            @endforeach
                            @else
                                <tr class="text-center text-white">
                                    <td colspan="13" class="p-5" style="background: #5db2ff">
                                        <h2><i class="ti ti-face-sad text-white"></i> <br></h2>
                                        You have not uploaded prescriptions. <br>
                                        <a href="{{ route('orders') }}" class="mt-2 boxed-btn3-white text-white">Upload Prescriptions</a>
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
