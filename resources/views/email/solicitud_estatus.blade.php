@component('mail::message')

<h1>Hola <strong>{{$user->nombre}}!</strong></h1>

<br>

Te Notificamos que tu solicitud de retiro de Fondos por ${{ $user->monto }}, ha sido procesada exitosamente.


{{ config('app.name') }}
@endcomponent
