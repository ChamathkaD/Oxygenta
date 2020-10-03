<form action="{{ route('addCart') }}" method="post">

    @csrf

    <input type="hidden" name="order_id" value="{{ $order->id }}">
    <input type="hidden" name="user_id" value="{{ $order->user_id }}">
    <input type="hidden" name="total" value="{{ $order->total }}">
    <input type="hidden" name="shipping" value="{{ $order->shipping }}">
    <input type="hidden" name="grand_total" value="{{ $order->grand_total }}">

    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle mr-2"></i>Accept</button>

</form>
