<form action="{{ route('order.store') }}"
      enctype="multipart/form-data"
      method="POST"
>

    @csrf

    @include('form.order.basic')

    <br><br>

    @include('form.order.contact')

    <br><br>

    @include('form.order.attachment')

    <br><br>

    <input type="submit" class="boxed-btn btn-block" value="Upload Prescription">
</form>
