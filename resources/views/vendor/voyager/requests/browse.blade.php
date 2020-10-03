@extends('voyager::master')

@section('page_title', 'Orders')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-basket"></i> Order Requests
        </h1>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css"/>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col" style="margin: 20px">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="user" class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">NIC</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">State</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Street</th>
                                    <th scope="col">Zip</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Order Created</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->first_name }}</td>
                                        <td>{{ $order->last_name }}</td>
                                        <td>{{ $order->nic }}</td>
                                        <td>{{ $order->gender }}</td>
                                        <td>{{ $order->dob }}</td>
                                        <td>{{ $order->state }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>{{ $order->street }}</td>
                                        <td>{{ $order->zip }}</td>
                                        <td>{{ $order->country }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->created_at->toDayDateTimeString() }}</td>
                                        <td width="10">
                                            <a href="{{ route('voyager.requests.show', [ $order->id]) }}" class="btn btn-sm btn-dark">Check Prescriptions</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('javascript')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#user').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
@endpush
