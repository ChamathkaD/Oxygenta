<form action="{{ route('place-order') }}" method="post">

    @csrf

    <input type="hidden" name="order_id" value="@if(!empty($order->id)) {{ $order->id }} @endif">

    <input type="hidden" name="grand_total" value="@if(!empty($order->grand_total)) {{ number_format($order->grand_total,2) }} @endif">

    <div class="custom-control custom-radio">
        <input type="radio" id="cod" name="paymentMethod" class="custom-control-input" value="cod" required>
        <label class="custom-control-label" for="cod">Cash On Hand</label>
    </div>

    <button class="btn btn-primary btn-lg btn-block mt-3" type="submit">Place Order</button>

</form>
