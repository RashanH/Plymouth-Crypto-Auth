@component('mail::message')
# {{ $product_name }}

Please save these information. You will need these details while setting up your application.

Product name: {{ $product_name }}<br />
Product ID: {{ $product_id }}<br />
Public key:<br />
<pre>{{ $public_key }}</pre>
<br /><br />
For configuration instructions, please read the docs.

@component('mail::button', ['url' => url('docs')])
Read the documentation
@endcomponent
<br />
Thanks,<br>
{{ config('app.name') }}
@endcomponent
