@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro de Cajeros</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Cajeros</li>
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
              <h3 class="card-title">Listado de Cajeros</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Estatus</th>
                    <th>Editar</th>
                    <th>Inactivar</th>
                    <th>Eliminar</th></tr>
                </thead>
                <tbody>
                @foreach($users as $user)
       
                    <tr>
                                    
                        <td>{{$user->name_user}}</td>
                        <td>{{$user->ape_user}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->des_status}}</td>
                        <td>
                           
                         
                            <a class="btn btn-warning" href="{{route("editar.usuario",['user' => $user->id])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                          
                                           
                        </td>
                        <td>
                           
                         
                            <a class="btn btn-info" href="{{route("usuario.inactivar",['user' => $user->id])}}">
                                <i class="fa fa-power-off"></i>
                            </a>
                          
                                           
                        </td>
                        <td>
                          
                          
                           <form action="{{route("borrar.usuario", ['user' => $user->id])}}" method="get">
                              @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            
                            
                        </td>
                                          
                    </tr>
                    
                @endforeach
                </tbody>
              </table>
            </div>

            <div class="card-footer">
<a href="{{route("nuevo.usuario")}}" class="btn btn-primary mb-2">Registrar Cajero</a>
<a class="btn btn-default float-right" href="{{route("home")}}">Cerrar</a>
</div>
          </div>
          <!-- /.box -->
        </div>
      </div>


</div>

@endsection