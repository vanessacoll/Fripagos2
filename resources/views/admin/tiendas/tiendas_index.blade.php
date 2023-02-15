@extends('layout.plantilla_admin')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tienda {{ $tiendas->nombre_tienda }} <a class="fas fa-reply" style='font-size:18px' href="{{route("admin.tiendas")}}"></a></h1> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/home">Tiendas</a></li>
              <li class="breadcrumb-item active">Tiendas</li>
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
              <h3 class="card-title">Datos Generales</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

<div class="row">
  


<div class="col-6">
<p class="lead"><b>Tienda:</b></p>


<p class=" shadow-none">
<strong>Descripcion:</strong> {{ $tiendas->tipo_tienda->descripcion }}</p>
<p class=" shadow-none">
<strong>Direccion:</strong> {{ $tiendas->direccion }} 
<p class=" shadow-none">
<strong>Telefono:</strong> {{ $tiendas->telefono }}

</div>

<div class="col-6">
<p class="lead"><b>Datos Bancarios:</b></p>

<p class=" shadow-none">
<strong>Beneficiario:</strong> {{ $bancos->cedula_usuario }} <strong>Nombre Titular:</strong> {{ $bancos-> nombre_usuario }}</p>
<p class=" shadow-none">
<strong>Banco:</strong> {{ $bancos->banco->descripcion }} <strong>Cuenta:</strong> {{ $bancos->cuenta_bancaria }}</p>
<p class=" shadow-none">
<strong>Telefono:</strong> {{ $bancos->telefono_usuario }}</p>

</div>
</div>
            </div>


          </div>
          <!-- /.box -->

</div>

        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Datos Ventas</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

<div class="row">
  


<div class="col-6">
<p class="lead"><b>Totales Ventas</b></p>
<div class="table-responsive">
<table class="table">

<tr>
<th style="width:50%">Totales Ventas:</th>
<td>${{ $pagos->sum('monto_transaccion') }}</td>
</tr>
<tr>
<th>Total Transacciones:</th>
<td>${{ $pagos->count('monto_transaccion') }}</td>
</tr>
<tr>

<th> 
  <a href="{{route("admin.tiendas.ver.pagos",['tiendas' => $tiendas->id_tienda])}}" class="btn btn-primary ">Ver Transacciones</a>
</th>

<td></td>
</tr>

</table>
</div>
</div>


<div class="col-6">
<p class="lead"><b>Totales Fondos</b></p>
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

</table>
</div>
</div>

</div>
            </div>


          </div>
          <!-- /.box -->
        </div>


<div class="col-md-12">
      <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Usuarios Tienda</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                <tr>
                    
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Tienda</th>
                    <th>Fecha Registro</th>
                    <th>Estatus</th>

                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
       
                    <tr>
                       
                      <td>{{$cliente->name_user}} {{$cliente->ape_user}}</td>
                      <td>{{$cliente->email}}</td>
                      <td>{{$cliente->rol}}</td>
                      <td>{{$cliente->nombre_tienda}}</td>
                      <td>{{$cliente->des_status}}</td>
                      <td>{{$cliente->created_at}}</td>
                                          
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