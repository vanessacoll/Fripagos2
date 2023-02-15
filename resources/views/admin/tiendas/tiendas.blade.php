@extends('layout.plantilla_admin')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tiendas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/home">Home</a></li>
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
              <h3 class="card-title">Tiendas</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    
                    <th>Tienda</th>
                    <th>Gerente</th>
                    <th>Tipo de Tienda</th>
                    <th>Ver</th>

                </tr>
                </thead>
                <tbody>
                @foreach($tiendas as $tienda)
       
                    <tr>
                       
                      <td>{{$tienda->nombre_tienda}}</td>
                      <td>{{$tienda->user->name_user}} {{$tienda->user->ape_user}}</td>
                      <td>{{$tienda->tipo_tienda->descripcion}}</td>
                   
                      <td>  
                            <a class="btn btn-info" href="{{route("admin.tiendas.ver",['tiendas' => $tienda->id_tienda])}}">
                                <i class="fas fa-eye"></i>
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