@extends('voyager::master')

@section('page_title', $user->first_name . "'s Details")

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-people"></i> Details of {{ $user->first_name . ' ' . $user->last_name }}
        </h1>
    </div>
@stop

@section('content')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-2">

                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <h4 class="card-title">{{ $user->first_name . ' ' . $user->last_name }}</h4>
                        <p class="card-text">Registered at : {{ $user->created_at->toDayDateTimeString() }}</p>
                    </div>
                </div>

            </div>

            <div class="col-md-3">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h5 class="panel-title">General Information</h5>
                    </div>
                    <div class="panel-body" style="margin-top: 15px">

                        <table class="table table-bordered">
                            <tr>
                                <td>First Name</td>
                                <td>{{ $user->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <td>NIC</td>
                                <td>{{ $user->nic }}</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <td>Birthday</td>
                                <td>{{ $user->dob }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                        </table>

                    </div>
                </div>

            </div>

            <div class="col-md-3">

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h5 class="panel-title">Contact Information</h5>
                    </div>
                    <div class="panel-body" style="margin-top: 15px">

                        <table class="table table-bordered">
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td>
                                    @if(!empty($user->address))
                                        {{ $user->address->phone }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Country</td>
                                <td>
                                    @if(!empty($user->address))
                                        {{ $user->address->country }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>State</td>
                                <td>
                                    @if(!empty($user->address))
                                        {{ $user->address->state }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>
                                    @if(!empty($user->address))
                                        {{ $user->address->city }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Street</td>
                                <td>
                                    @if(!empty($user->address))
                                        {{ $user->address->street }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Zip</td>
                                <td>
                                    @if(!empty($user->address))
                                        {{ $user->address->zip }}
                                    @endif
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>


@stop
