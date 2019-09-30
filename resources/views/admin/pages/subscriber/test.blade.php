@component('mail::message')
# Maikros Mail Services

{!! $message !!}

@component('mail::button', ['url' => 'http://maikros.crazyideaco.com/'])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}.
@endcomponent
