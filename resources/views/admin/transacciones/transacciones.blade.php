@extends('layout.plantilla_admin')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Historico de Transacciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/home">Home</a></li>
              <li class="breadcrumb-item active">Pagos</li>
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
              <h3 class="card-title">Historico de Transacciones</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    
                    <th>Tienda</th>
                    <th>Caja</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Forma de Pago</th>
                    <th>Descripcion</th>
                    <th>Monto</th>

                </tr>
                </thead>
                <tbody>
                @foreach($pagos as $pago)
       
                    <tr>

                      <td>{{$pago->tienda->nombre_tienda}}</td>  
                      <td>{{$pago->caja->descripcion}}</td>             
                      <td>{{$pago->nom_cliente}}</td>
                      <td>{{$pago->fecha}}</td>
                      <td>{{$pago->forma->descripcion}}</td>
                      <td>{{$pago->descripcion}}</td>
                      <td>{{$pago->monto_transaccion}}</td>
                         
                                          
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