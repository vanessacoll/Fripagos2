@extends('layout.plantilla_admin')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Historico de Transacciones {{ $tiendas->nombre_tienda }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/home">Tiendas</a></li>
              <li class="breadcrumb-item active">Pagos Tiendas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection


@section('contenido')

<div class="container-fluid">


  <div class="row">
                            <div class="col-xl-4">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                      <div class="row ">
                                        <h4 class="card-title mb-2">Total Ventas</h4>
                                      </div>
<div class="border-top mt-2 mb-3 "></div>
                                        <div>
                                                        <p class="mb-1"><i class="fas fa-circle align-middle text-primary" style='font-size:8px;'></i> Total Ventas: {{$pagos->sum('monto_transaccion')}}</p>
                                                        <p class="mb-1"><i class="fas fa-circle align-middle text-primary" style='font-size:8px;'></i> Total Transacciones: {{$pagos->count('monto_transaccion')}}</p>
                                                     
                                      </div>
                                      <div class="border-top mt-3 mb-2 "></div>

                                      <div class="row ">
         <div class="col-4">
        
            <p class="mb-1 text-center"><i class="mdi mdi-circle text-primary me-1"></i>Stripe</p>
              <p class="mb-1 text-center">{{$pagoss->sum('monto_transaccion')}}</p>
      
         </div>
         
         <div class="col-4">
        
            <p class="mb-1 text-center"><i class="mdi mdi-circle text-primary me-1"></i>Paypal</p>
              <p class="mb-1 text-center">{{$pagosp->sum('monto_transaccion')}}</p>
      
         </div>
        
         <div class="col-4">
        
            <p class="mb-1 text-center"><i class="mdi mdi-circle text-primary me-1"></i>MP</p>
              <p class="mb-1 text-center">{{$pagosm->sum('monto_transaccion')}}</p>
      
         </div>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                      <div class="row ">
                                        <h4 class="card-title mb-2">Total Ventas (Mes)</h4>
                                      </div>
<div class="border-top mt-2 mb-3 "></div>
                                        <div>
                                                        <p class="mb-1"><i class="fas fa-circle align-middle text-primary" style='font-size:8px;'></i> Total Ventas: {{$pagosmonth->sum('monto_transaccion')}}</p>
                                                        <p class="mb-1"><i class="fas fa-circle align-middle text-primary" style='font-size:8px;'></i> Total Transacciones: {{$pagosmonth->count('monto_transaccion')}}</p>
                                                     
                                      </div>
                                      <div class="border-top mt-3 mb-2 "></div>

                                      <div class="row ">
         <div class="col-4">
        
            <p class="mb-1 text-center"><i class="mdi mdi-circle text-primary me-1"></i>Stripe</p>
              <p class="mb-1 text-center">{{$pagosmonths->sum('monto_transaccion')}}</p>
      
         </div>
         
         <div class="col-4">
        
            <p class="mb-1 text-center"><i class="mdi mdi-circle text-primary me-1"></i>Paypal</p>
              <p class="mb-1 text-center">{{$pagosmonthp->sum('monto_transaccion')}}</p>
      
         </div>
        
         <div class="col-4">
        
            <p class="mb-1 text-center"><i class="mdi mdi-circle text-primary me-1"></i>MP</p>
              <p class="mb-1 text-center">{{$pagosmonthm->sum('monto_transaccion')}}</p>
      
         </div>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                      <div class="row ">
                                        <h4 class="card-title mb-2">Total Ventas (Hoy)</h4>
                                      </div>
<div class="border-top mt-2 mb-3 "></div>
                                        <div>
                                                        <p class="mb-1"><i class="fas fa-circle align-middle text-primary" style='font-size:8px;'></i> Total Ventas: {{$pagosday->sum('monto_transaccion')}}</p>
                                                        <p class="mb-1"><i class="fas fa-circle align-middle text-primary" style='font-size:8px;'></i> Total Transacciones: {{$pagosday->count('monto_transaccion')}}</p>
                                                     
                                      </div>
                                      <div class="border-top mt-3 mb-2 "></div>

                                      <div class="row ">
         <div class="col-4">
        
            <p class="mb-1 text-center"><i class="mdi mdi-circle text-primary me-1"></i>Stripe</p>
              <p class="mb-1 text-center">{{$pagosdays->sum('monto_transaccion')}}</p>
      
         </div>
         
         <div class="col-4">
        
            <p class="mb-1 text-center"><i class="mdi mdi-circle text-primary me-1"></i>Paypal</p>
              <p class="mb-1 text-center">{{$pagosdayp->sum('monto_transaccion')}}</p>
      
         </div>
        
         <div class="col-4">
        
            <p class="mb-1 text-center"><i class="mdi mdi-circle text-primary me-1"></i>MP</p>
              <p class="mb-1 text-center">{{$pagosdaym->sum('monto_transaccion')}}</p>
      
         </div>
                                            </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

 <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Historico de Transacciones {{ $tiendas->nombre_tienda }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    
                    <th>Tienda</th>
                    <th>Caja</th>
                    <th>Vendedor</th>
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
                      <td>{{$pago->user->name_user}} {{$pago->user->ape_user}}</td>  <td>{{$pago->nom_cliente}}</td>
                      <td>{{$pago->fecha}}</td>
                      <td>{{$pago->forma->descripcion}}</td>
                      <td>{{$pago->descripcion}}</td>
                      <td>${{$pago->monto_transaccion}}</td>
                         
                                          
                    </tr>
                    
                @endforeach
                </tbody>
              </table>
            </div>

            <div class="card-footer">

<a class="btn btn-default float-right" href="{{route("admin.tiendas.ver",['tiendas' => $tiendas->id_tienda])}}">Cerrar</a>
</div>
          </div>
          <!-- /.box -->
        </div>
      </div>


</div>

@endsection