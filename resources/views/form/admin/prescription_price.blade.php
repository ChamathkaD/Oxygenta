<form role="form" class="form-edit-add" action="{{ route('notify', [$order_id]) }}" method="POST">

    @csrf

    <div class="table-responsive">
        <table id="user" class="table table-hover">
            <thead>
            <tr>
                <th scope="col" class="text-center">Total</th>
                <th scope="col" class="text-center">Shipping Charges</th>
                <th scope="col" class="text-center">Grand Total</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left">
                        <input
                            type="text"
                            class="form-control amount"
                            name="price"
                            placeholder="Enter the Total Price"
                            id="price"
                            value="@if(!empty($order->total)) {{ number_format($order->total,2) }} @endif"
                        >
                    </td>
                    <td class="text-left">
                        <input
                            type="text"
                            class="form-control amount"
                            name="shipping"
                            placeholder="Enter the Delivery Charge"
                            id="shipping"
                            value="@if(!empty($order->shipping)) {{ number_format($order->shipping,2) }} @endif"
                        >
                    </td>
                    <td>
                        <input
                            type="text"
                            class="form-control amount"
                            name="total"
                            placeholder="Total"
                            id="total"
                            value="@if(!empty($order->grand_total)) {{ number_format($order->grand_total,2) }} @endif"
                        >
                    </td>
                    <td class="text-center">
                        <button type="submit" class="btn btn-success save">Notify to the Customer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</form>

@push('javascript')

    <script type="text/javascript">

        $('.amount').on('input', function () {
            let x = document.getElementById('price').value;
            x = parseFloat(x);

            let y = document.getElementById('shipping').value;
            y = parseFloat(y);

            if (Number.isNaN(x)) {
                x = 0
            }
            if (Number.isNaN(y)) {
                y = 0
            }

            document.getElementById('total').value = (x + y).toFixed(2);
        });

    </script>

@endpush
