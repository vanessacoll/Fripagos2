@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Preguntas Frecuentes</h1>
            <div class="mt-1">
            <a href="{{ route('contacto') }}">Contactanos</a>, si no encontró la respuesta correcta o si tiene otra pregunta.
            </div>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">F.A.Q.</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-12">




<div class="col-12" id="accordion">
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
<div class="card-header">
<h4 class="card-title w-100">
1. ¿Qué es Fripagos?
</h4>
</div>
</a>
<div id="collapseOne" class="collapse show" data-parent="#accordion">
<div class="card-body">
Fripagos es un software de comercio electrónico que respalda las tareas diarias y los procesos que las empresas llevan a cabo para posicionar y vender sus bienes y servicios. El software maneja los datos de los clientes, las transacciones de venta y otro tipo de trabajos relacionados con el comercio electrónico. Esto incluye la capacidad de automatizar una amplia gama de trabajos manuales.    
</div>
</div>
</div>
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
<div class="card-header">
<h4 class="card-title w-100">
2. ¿Qué quiere decir que Fripagos está en la Nube?
</h4>
</div>
</a>
<div id="collapseTwo" class="collapse" data-parent="#accordion">
<div class="card-body">
La aplicación funciona desde Internet, no tienes que preocuparte por instalaciones, servidores, versiones o por copias de seguridad, todo está guardado y protegido por Fripagos, para acceder sólo necesitas Internet. La Nube es la forma más segura de guardar la información, es mucho más seguro que hacerlo en tu computador o en otros medios locales.
</div>
</div>
</div>
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
<div class="card-header">
<h4 class="card-title w-100">
3.  ¿Está segura mi información con Fripagos?
</h4>
</div>
</a>
<div id="collapseThree" class="collapse" data-parent="#accordion">
<div class="card-body">
Claro que sí, la información que registres solo será visible para ti y los usuarios autorizados con los correspondientes permisos. La información almacenada en Fripagos se aloja en servidores virtuales privados VPS. Tu información está en las mejores manos, Puedes estar tranquilo y ocuparte de hacer crecer tu empresa.
</div>
</div>
</div>
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
<div class="card-header">
<h4 class="card-title w-100">
4. ¿Quién me explica cómo empezar a utilizar Fripagos?
</h4>
</div>
</a>
<div id="collapseFour" class="collapse" data-parent="#accordion">
<div class="card-body">
Fripagos es una herramienta sencilla y práctica, no se requiere de conocimientos previos. Facilitamos un asistente de configuracion con todas las ayudas y explicaciones necesarias para empezar a usarla. Además, el centro de soporte está disponible para ti las 24 horas del día.

Si tienes dudas o inconvenientes <a href="{{ route('contacto') }}">contactanos</a> por soporte y te responderemos lo más pronto posible.
</div>
</div>
</div>
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
<div class="card-header">
<h4 class="card-title w-100">
5. Si tengo dudas con Fripagos, ¿quién me ayuda?
</h4>
</div>
</a>
<div id="collapseFive" class="collapse" data-parent="#accordion">
<div class="card-body">
Nuestro Equipo de Soporte siempre está dispuesto para ayudarte hasta con el mínimo problema, los usuarios son siempre nuestra prioridad, pruébalo tu mismo acá. Conoce cómo contactarnos Call Center: (+591) 67267432 o en la seccion de <a href="{{ route('contacto') }}">contactanos</a>
</div>
</div>
</div>
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
<div class="card-header">
<h4 class="card-title w-100">
6.  ¿Qué operaciones puedo llevar a cabo con Fripagos?
</h4>
</div>
</a>
<div id="collapseSix" class="collapse" data-parent="#accordion">
<div class="card-body">
Algunas de las acciones que podrás realizar son:

Operaciones de Ventas con Stripe, Paypal y Mercado Pagos.
Emisión de reportes para la toma de decisiones.
Registro de Usuarios.
Solicitudes de Retiro de Fondos.

</div>
</div>
</div>
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
<div class="card-header">
<h4 class="card-title w-100">
7. Capacitaciones
</h4>
</div>
</a>
<div id="collapseSeven" class="collapse" data-parent="#accordion">
<div class="card-body">
No sabes cómo hacer algo en Fripagos? No tienes que preocuparte. Tanto al inicio como en cualquier momento de tu suscripción, puedes solicitar el recibir toda la capacitación que necesites para implementar con éxito Fripagos.
</div>
</div>
</div>
<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
<div class="card-header">
<h4 class="card-title w-100">
8. Actualizaciones
</h4>
</div>
</a>
<div id="collapseEight" class="collapse" data-parent="#accordion">
<div class="card-body">
En todo momento, vas a recibir todas las mejoras de Fripagos, sin costo adicional. Desde mejoras pequeñas, hasta cambios importantes, siempre vas a tener a tu disposición lo último de Fripagos.
</div>
</div>
</div>

<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
<div class="card-header">
<h4 class="card-title w-100">
9. ¿Cuanto tiempo tarda en procesarse una solicitud de Retiro de Fondos Fripagos?
</h4>
</div>
</a>
<div id="collapseNine" class="collapse" data-parent="#accordion">
<div class="card-body">
Las solicitudes de Retiro de Fondos son procesada en un periodo de 10 a 15 Dias dependiendo del cliente y del tipo de Retiro.
</div>
</div>
</div>

<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
<div class="card-header">
<h4 class="card-title w-100">
10. ¿Pueden otras personas registrar pagos por medio de mi Tienda en Fripagos?
</h4>
</div>
</a>
<div id="collapseNine" class="collapse" data-parent="#accordion">
<div class="card-body">
Si, puedes resgistrar usuarios a los que se les asignara el rol de Cajeros,los cuales podran realizar transacciones asociadas a tu Tienda de forma segura y supervisada.
</div>
</div>
</div>

<div class="card card-primary card-outline">
<a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
<div class="card-header">
<h4 class="card-title w-100">
11. ¿Si deseo dejar de utilizar la aplicacion que sucede con mis datos registrados en la plataforma?
</h4>
</div>
</a>
<div id="collapseNine" class="collapse" data-parent="#accordion">
<div class="card-body">
Al procesarce la solicitud de Eliminacion de Cuenta, todos los datos asociados a su cuenta seran eliminados de nuestra plataforma sin posibilidades de recuperacion.
</div>
</div>
</div>
</div>

</div>
</div>
</div>
@endsection


