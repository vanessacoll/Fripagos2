@component('mail::message')

<h1><strong>Nueva Solicitud de Eliminacion de Cuenta</strong></h1>

<br>

El usuario {{$user->ape_user}} {{$user->name_user}}, email: {{$user->email}}, acaba de generar una solicitud de eliminacion de cuenta.


{{ config('app.name') }}
@endcomponent
