@component('mail::message')

<h1><strong>Nueva Solicitud de Retiro de Fondos</strong></h1>

<br>

El usuario {{$user->gerente}} de la Tienda {{$user->tienda}}, acaba de generar un solicitud de Retiro de Fondos por ${{$user->monto}}.

Tipo de Solicitud de Retiro: {{$user->tipo}}


{{ config('app.name') }}
@endcomponent
