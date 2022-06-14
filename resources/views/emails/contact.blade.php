@component('mail::message')
# New contact query received.

Please review the message and reply ASAP.<br />
---------------------------------<br />
Name:<br />{{ $name }}<br /><br />
Email:<br />{{ $email }}<br /><br />
Message:<br /><pre>{{ $message }}</pre>
---------------------------------<br />
Note: Use the official CryptFence email address while contacting customers.

@component('mail::button', ['url' =>  url('')])
Reply
@endcomponent
<br />
Thanks,<br>
{{ config('app.name') }}
@endcomponent
