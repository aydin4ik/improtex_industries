@component('mail::message')
# Contact request

<span>
    name: <strong>{{ $data['name'] }}</strong>
</span>

<p>
    {{ $data['body'] }}
</p>


Thanks,<br>
{{ config('app.name') }}
@endcomponent