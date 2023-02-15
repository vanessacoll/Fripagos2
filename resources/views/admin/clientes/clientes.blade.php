@extends('layout.plantilla_admin')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/home">Home</a></li>
              <li class="breadcrumb-item active">Clientes</li>
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
              <h3 class="card-title">Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

<div class="col-sm-2 pl-0">

<div class=" form-group">

<select id="accion" class="float-left  form-control">
<option value="1" >Activar</option>
<option value="2" >Inactivar</option>
</select>
</div>
</div>

              <button class="float-left btn btn-primary ml-2"  id="accionAll" >Procesar</button>

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Tienda</th>
                    <th>Estatus</th>
                    <th>Fecha Registro</th>
                    

                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
       
                    <tr>
                       
                      <td>
                  <div class="form-check d-inline">
                  <input class="form-check-input" id="delete_checkbox" type="checkbox" data-id="{{$cliente->id}}">
                  </div>
                      </td>
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

            <div class="card-footer">

<a class="btn btn-default float-right" href="{{route("admin.home")}}">Cerrar</a>
</div>
          </div>
          <!-- /.box -->
        </div>
      </div>


</div>



@endsection