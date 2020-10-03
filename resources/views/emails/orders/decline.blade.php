@component('mail::message')
# Your order (Order ID) #{{ $order_id }} has been deleted.

Thank you for using our service. You can order again.

<br>
{{ config('app.name') }}
@endcomponent
