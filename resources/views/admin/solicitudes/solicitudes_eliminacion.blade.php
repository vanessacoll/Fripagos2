@extends('layout.plantilla_admin')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Solicitudes de Eliminacion de Cuenta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/home">Home</a></li>
              <li class="breadcrumb-item active">Solicitudes de Eliminacion de Cuenta</li>
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
              <h3 class="card-title">Solicitudes de Eliminacion de Cuenta</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    
                    <th>Usuario</th>
                    <th>Tienda</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                    <th>Procesar</th>

                </tr>
                </thead>
                <tbody>
                @foreach($solicitudes as $solicitud)
       
                    <tr>
                       
                      
                      <td>{{$solicitud->user->name_user}} {{$solicitud->user->ape_user}}</td>
                      <td>{{$solicitud->tienda->nombre_tienda}}</td>
                      <td>{{$solicitud->motivo->motivo_eliminacion}}</td>
                      <td>{{$solicitud->fecha}}</td>
                      <td>{{$solicitud->status->des_status}}</td>
                      <td>  
                            <a class="btn btn-info" href="{{route("clientes.inactivar.solicitud",['solicitudes' => $solicitud->id_solicitud])}}">
                                <i class=" far fa-check-circle"></i>
                            </a>
                      </td>
                                             
                    </tr>
                    
                @endforeach
                </tbody>
              </table>
            </div>

            <div class="card-footer">
<a class="btn btn-default float-right" href="{{route("admin.home")}}">Cerrar</a>
</div>
          </div>
          <!-- /.box -->
        </div>
      </div>


</div>

@endsection