<x-mail::message>
# Hello {{ $user['name'] }}

Welcome to The Zignuts Family.

<x-mail::button :url="''">
Dashbord
</x-mail::button>
<h6>{{ $user['email'] }}</h6>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
