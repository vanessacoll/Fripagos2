@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Solicitud de Retiro</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('fondos') }}">Fondo</a></li>
              <li class="breadcrumb-item active">Solicitud de Retiro</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title">Solicitud de retiro de Fondos</h3>
</div>


<form class="form-horizontal" method="GET" action="{{route("solicitudes.store")}}">
<div class="card-body">

<p class="lead"><b>Datos Tienda:</b></p>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Gerente:</label>
<input name="gerente" value="{{Auth::user()->name_user}} {{Auth::user()->ape_user}}" class="form-control" type="text" readonly>
</div>

</div>

<div class="col-md-6">
<div class="form-group">
<label>Tienda:</label>
<input name="tienda" value="{{ $datos_tienda->nombre_tienda }}" class="form-control" type="text" readonly>
</div>



</div>

</div>


<p class="lead"><b>Datos Bancarios:</b></p>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Cedula:</label>
<input name="cedula" value="{{ $datos_banco->cedula_usuario }}" class="form-control" type="text" readonly>
</div>

<div class="form-group">
<label>Nombre y Apellido:</label>
<input name="name" value="{{ $datos_banco-> nombre_usuario }}" class="form-control" type="text" readonly>
</div>

</div>

<div class="col-md-6">
<div class="form-group">
<label>Banco:</label>
<input name="banco" value="{{ $datos_banco->banco->descripcion }}" class="form-control" type="text" readonly>
</div>

<div class="form-group">
<label>Cuenta Bancaria:</label>
<input name="cuenta" value="{{ $datos_banco->cuenta_bancaria }}" class="form-control" type="text" readonly>
</div>

</div>

<div class="col-md-6">
<div class="form-group">
<label>Telefono:</label>
<input name="telefono" value="{{ $datos_banco->telefono_usuario }}" class="form-control" type="text" readonly>
</div>

</div>

</div>

 <p class="lead"><b>Tipo de Retiro</b></p>

 <div class="col-sm-12">

<div class="form-group clearfix">
<div class="icheck-primary d-inline">
<input type="radio" id="radioPrimary3" value="1" name="r2" checked>
<label for="radioPrimary3">
  Bs. (Transferencia Bancaria)
</label>
</div>

<div class="icheck-primary d-inline ml-2">
<input type="radio" id="radioPrimary4" value="2" name="r2">
<label for="radioPrimary4">
  $ (Efectivo)
</label>
</div>

<div class="icheck-primary d-inline ml-2">
<input type="radio" id="radioPrimary5" value="3" name="r2">
<label for="radioPrimary5">
  $ (Digital)
</label>
</div>

</div>
</div>

<div id="div_efectivo" style="display:none;">

<div class="form-group row">
<label class="col-sm-4 col-form-label">Lugar de Retiro:</label>
<div class="col-sm-12">

    <input type="text" class="form-control" name="lugar_retiro" value="{{ $lugar->descripcion }}" readonly>

</div>
</div>

<div class="form-group row mb-0">
<div class="col-sm-6">

    <input type="hidden" class="form-control" name="id_lugar_retiro" value="{{ $lugar->id_lugar_retiro }}" readonly>

</div>
</div>



<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Fecha de Retiro:</label>
<div class="input-group date" id="reservationdate2" data-target-input="nearest">
  
<input type="text" name="fecha_retiro" class="form-control datetimepicker-input" data-target="#reservationdate2" />

<div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
<div class="input-group-text"><i class="fa fa-calendar"></i></div>
</div>
</div>
</div>

</div>

<div class="col-md-6">
<div class="form-group">
<label>Hora de Retiro:</label>

<div class="input-group date" id="datetimepicker3" data-target-input="nearest">

 <input type="text" name="hora_retiro" class="form-control datetimepicker-input" data-target="#datetimepicker3"/>
 
<div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">

<div class="input-group-text"><i class="fa fa-clock"></i></div>
</div>
</div>

</div>



</div>

</div>


<div>

  <p class="text-red"><strong>Nota:</strong> Los retiro en Efectivo deben realizarse de Lunes a Viernes en horario de oficina.</p>
  
</div>

  
</div>


<div id="div_digital" style="display:none;">

<div class="col-sm-6">

<div class="form-group clearfix">
<div class="icheck-primary d-inline">
<input type="radio" id="radioPrimary6" value="1" name="r3" checked>
<label for="radioPrimary6">
  Zelle
</label>
</div>

<div class="icheck-primary d-inline ml-2">
<input type="radio" id="radioPrimary7" value="2" name="r3">
<label for="radioPrimary7">
  Paypal
</label>
</div>

</div>
</div>


<div class="row">

<div class="col-md-6">
<div class="form-group">
<label>Nombres titular cuenta externa:</label>
<input name="nombres_cuenta_externa" class="form-control" type="text">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Correo titular cuenta externa:</label>
<input name="correo_cuenta_externa" class="form-control" type="text">
</div>
</div>

</div>

  
</div>



 <p class="lead"><b>¿Retirar Total Fondos?</b></p>

 <div class="col-sm-6">

<div class="form-group clearfix">
<div class="icheck-primary d-inline">
<input type="radio" id="radioPrimary1" name="r1" checked>
<label for="radioPrimary1">
	SI
</label>
</div>
<div class="icheck-primary d-inline ml-2">
<input type="radio" id="radioPrimary2" name="r1">
<label for="radioPrimary2">
	NO
</label>
</div>

</div>
</div>

<div class="form-group row">
<label class="col-sm-1 col-form-label">Monto:</label>
<div class="col-sm-4">

    <input type="text" class="form-control" name="monto" value="{{ $fondos->fondos }}" id="emailInput" readonly>

</div>
</div>



</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Enviar</button>
<a class="btn btn-default  float-sm-right" href="{{ route('fondos') }}">Cerrar</a>
</div>

</form>
</div>

</div>

<script type="text/javascript">
var emailInput = document.getElementById('emailInput');

// evento para el input radio del "si"
document.getElementById('radioPrimary1').addEventListener('click', function(e) {
  emailInput.setAttribute("readonly", "readonly");
});

// evento para el input radio del "no"
document.getElementById('radioPrimary2').addEventListener('click', function(e) {
  emailInput.removeAttribute("readonly");
});
</script>

<script type="text/javascript">
var div_digital = document.getElementById('div_digital');

// evento para el input radio del "si"
document.getElementById('radioPrimary3').addEventListener('click', function(e) {
  div_digital.style.display='none';
});

// evento para el input radio del "si"
document.getElementById('radioPrimary4').addEventListener('click', function(e) {
  div_digital.style.display='none';
});

// evento para el input radio del "no"
document.getElementById('radioPrimary5').addEventListener('click', function(e) {
  div_digital.style.display='block';
});



</script>


<script type="text/javascript">
var div_efectivo = document.getElementById('div_efectivo');

// evento para el input radio del "si"
document.getElementById('radioPrimary3').addEventListener('click', function(e) {
  div_efectivo.style.display='none';
});

// evento para el input radio del "si"
document.getElementById('radioPrimary5').addEventListener('click', function(e) {
  div_efectivo.style.display='none';
});

// evento para el input radio del "no"
document.getElementById('radioPrimary4').addEventListener('click', function(e) {
  div_efectivo.style.display='block';
});
</script>

<script type="text/javascript">
  jQuery(document).ready(function(){

document.getElementById('radioPrimary5').addEventListener('checked', function(e) {
  div_digital.style.display='block';
});
          
            });
</script>

@endsection