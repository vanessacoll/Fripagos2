@component('mail::message')
<h1>Hola!</h1>
<strong>Tienes un Nuevo mensaje de {{$user->name}}</strong>
<br>
Email: {{$user->email}}
<br>
<br>
Motivo: {{$user->subject}}

Mensaje: {{$user->message}}

{{ config('app.name') }}
@endcomponent
