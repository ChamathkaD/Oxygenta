@component('mail::message')
# Your Ordered Medicine Placed

Hello {{ $order['first_name'] . " " . $order['last_name'] }}, <br>
Thank you for shopping with us. Your order details are as below: <br>
Order ID - {{ $order['id'] }} <br>

@component('mail::table')
| Order ID      | Delivery Address | Total      | Shipping Charges  | Grand Total |
| ------------- | ------------- |:-------------:| --------:|:-------------:|
| {{ $order['id'] }} | {{ $order['street'] . "," . $order['city'] . "," }} <br> {{ $order['state'] . "," }} <br> {{ $order['zip'] }} <br> {{ $order['country'] }} <br> <span class="text-muted">{{ $order['phone'] }}</span> <br> <span class="text-muted">{{ $order['email'] }}</span> | LKR {{ $order['total'] }} | LKR {{ $order['shipping'] }}| LKR {{ $order['grand_total'] }} |
@endcomponent

<br>

For any enquiries, you can contact us at <a href="mailto:info@oxygenta.com ">info@oxygenta.com </a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
