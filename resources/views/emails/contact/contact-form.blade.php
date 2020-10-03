@component('mail::message')

<h1 class="text-primary">Hello Admin,</h1>
You received an email from : {{ $data['name'] }}

Here are the details: <br>
<strong>Email</strong> {{ $data['email'] }} <br>
<strong>Subject</strong> {{ $data['subject'] }}

<strong>Message</strong> <br>
{{ $data['message'] }}

Thank You!
@endcomponent
