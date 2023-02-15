@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fondos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Fondos</li>
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
                <h3 class="card-title">Fondos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <div class="row">

<div class="col-6">
<p class="lead"><b>Tienda:</b></p>

<p class=" shadow-none">
<strong>Nombre Empresa:</strong> {{ $datos_tienda->nombre_tienda }} </p>
<p class=" shadow-none">
<strong>Descripcion:</strong> {{ $datos_tienda->tipo_tienda->descripcion }}</p>

<p class="lead"><b>Datos Bancarios:</b></p>

<p class=" shadow-none">
<strong>C.I.:</strong> {{ $datos_banco->cedula_usuario }} <strong>Nombre Titular:</strong> {{ $datos_banco-> nombre_usuario }}</p>
<p class=" shadow-none">
<strong>Banco:</strong> {{ $datos_banco->banco->descripcion }} <strong>Cuenta:</strong> {{ $datos_banco->cuenta_bancaria }}</p>

 <a href="{{route("solicitudes")}}" class="btn btn-primary  mt-2">Generar nueva Solicitud de Retiro</a>
</div>

<div class="col-6">
<p class="lead"><b>Datos al {{ $date }}</b></p>
<div class="table-responsive">
<table class="table">
<tr>
<th style="width:50%">Fondos:</th>
<td>${{ $fondos->fondos }}</td>
</tr>
<tr>
<th>Retiros en Proceso:</th>
<td>${{ $solicitudes_proceso->sum('monto') }}</td>
</tr>
<tr>
<th>Retiros Aprobados:</th>
<td>${{ $solicitudes_aprobadas->sum('monto') }}</td>
</tr>
<tr>
<th>Total Transacciones a la Fecha:</th>
<td>${{ $pagos->sum('monto_transaccion') }}</td>
</tr>
</table>
</div>
</div>

</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- /.card -->
</div>
<div class="col-md-12">
      <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Solicitudes de Retiro</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                   <tr>

                    <th>Id Solicitud</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Status</th>
                     <th>Ver</th>
                  
                </thead>
                <tbody>

                  @foreach($solicitudes as $solicitud)
                     
                    <tr>
                    
                        <td>{{$solicitud->id_solicitud}}</td>
                        <td>{{$solicitud->monto}}</td>
                        <td>{{$solicitud->fecha}}</td>
                        <td>{{$solicitud->status->des_status}}</td>
                        <td>  
                            <a class="btn btn-info" href="{{route("solicitudes.retiro.ver.user",['solicitudes' => $solicitud->id_solicitud])}}">
                                <i class="fas fa-eye"></i>
                            </a>
                      </td>
                      
                    </tr>
                      
                @endforeach
               
                </tbody>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- /.card -->
      </div>
</div>
</div>

@endsection