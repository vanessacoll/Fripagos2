@extends('layout.plantilla_admin')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Solicitud de Retiro de Fondos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/solicitudes_r">Solicitudes</a></li>
              <li class="breadcrumb-item active">Solicitud de Retiros de Fondos</li>
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
              <h3 class="card-title">Solicitud de Retiro de Fondos</h3>
            </div>
            <!-- /.box-header -->

<form method="GET" action="{{route("solicitudes.actualizar",['solicitudes' => $solicitudes->id_solicitud])}}">
               @method("PUT")
                @csrf
            <div class="card-body">

@php 

$disabled = ''; 
 if($solicitudes->id_status == 2){
 $disabled = 'disabled';
}

@endphp

<div class="row">
  


<div class="col-6">
<p class="lead"><b>Datos Solicitud:</b></p>


<p class=" shadow-none">
<strong>Tienda:</strong>  {{ $tiendas->nombre_tienda }}</p>
<p class=" shadow-none">
<strong>Gerente:</strong> {{$solicitudes->user->name_user}} {{$solicitudes->user->ape_user}}
<p class=" shadow-none">
<strong>Fecha Solicitud:</strong> {{ $solicitudes->fecha }}
<p class=" shadow-none">
<strong>monto solicitud:</strong> ${{ $solicitudes->monto }}

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Estatus</label>
<div class="col-sm-6">
<select required name="id_status" class="form-control" style="width: 100%;" {{ $disabled }}>
 <option value="">Seleccione</option>
               @foreach($statuses as $status)
                  <option value="{{$status->id_status}}" @if( $solicitudes->id_status == $status->id_status) selected='selected' @endif>  {{$status->des_status}}</option>
              @endforeach
</select>
</div>
</div>


</div>



<div class="col-6">
<p class="lead"><b>Datos Retiro:</b></p>

<p class=" shadow-none">
<strong>Tipo de Retiro:</strong> {{ $solicitudes->tipo_retiro->descripcion }}</p>

@if ($solicitudes->id_tipo_retiro == 1)
    
<p class=" shadow-none">
<strong>Beneficiario:</strong> {{ $bancos->cedula_usuario }}</p>

<p class=" shadow-none">
<strong>Nombre Titular:</strong> {{ $bancos-> nombre_usuario }}</p>

<p class=" shadow-none">
<strong>Banco:</strong> {{ $bancos->banco->descripcion }} <strong>Cuenta:</strong> {{ $bancos->cuenta_bancaria }}</p>
<p class=" shadow-none">
<strong>Telefono:</strong> {{ $bancos->telefono_usuario }}</p>

@elseif($solicitudes->id_tipo_retiro == 2)

<p class=" shadow-none">
<strong>Lugar de Retiro:</strong> {{ $solicitudes->lugar_retiro->descripcion }}</p>

<p class=" shadow-none">
<strong>Fecha de Retiro:</strong> {{ $solicitudes->fecha_retiro }} <strong>Hora:</strong> {{ $solicitudes->hora_retiro }}</p>


@else
<p class=" shadow-none">
<strong>Tipo Cuenta Externa:</strong> {{ $solicitudes->tipo_cuenta->descripcion }}</p>

<p class=" shadow-none">
<strong>Nombre Beneficiario Cuenta Externa:</strong> {{ $solicitudes->nombres_cuenta_externa }}</p>

<p class=" shadow-none">
<strong>Correo Beneficiario Cuenta Externa:</strong> {{ $solicitudes->correo_cuenta_externa }}</p>

@endif
 


</div>
</div>

            </div>

<div class="card-footer">
<button class="btn  btn-primary" {{ $disabled }}>Actualizar</button>
<a class="btn btn-default float-right" href="{{route("solicitudes.retiro")}}">Cerrar</a>
</div>
          </div>
          </form>
          <!-- /.box -->
        </div>
      </div>


</div>

@endsection