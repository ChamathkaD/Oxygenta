@component('mail::message')
# Your order (Order ID) # {{ $id }} has been approved.

Now You can place your order.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
