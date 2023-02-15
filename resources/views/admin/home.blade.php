@extends('layout.plantilla_admin')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin/home">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Admin Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="row">
                            <div class="col-xl-4">
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        
                                        <div>
                                           

                                            <div>
                                                <h5><i class="fas fa-user text-primary"></i> {{ Auth::user()->name_user }} {{ Auth::user()->ape_user }}</h5>
                                                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                                <p class="text-muted mb-0">Administrador</p>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body border-top">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div>
                                                    <p class="fw-medium mb-0">Total Ventas:</p>
                                                    <h5>${{$pagos->sum('monto_transaccion')}}</h5>
                                                    <h6>{{$pagos->count()}} Transacciones</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mt-4 mt-sm-0">
                                                    <p class="fw-medium mb-2">Metodos de Pago:</p>
                                                    <div class="d-inline-flex align-items-center mt-1">
                                                        
                                                        <a href="javascript: void(0);" class="m-1">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-warning bg-soft text-warning font-size-18">
                                                                    <i class="fab fa-stripe"></i>
                                                                </span>
                                                            </div>
                                                        </a>
                                                        <a href="javascript: void(0);" class="m-1">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                                    <i class="fab fa-paypal"></i>
                                                                </span>
                                                            </div>
                                                        </a>
                                                        <a href="javascript: void(0);" class="m-1">
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle bg-warning bg-soft text-warning font-size-18">
                                                                    <i class="far fa-handshake"></i>
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer bg-transparent border-top">
                                        <div class="text-center">
                                          
                                            <a href="{{ route('transacciones') }}" class="btn btn-primary btn-block me-2 w-md">Ver Transacciones</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8">
                                <div class="card">
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-7 col-sm-5">
                                                <div  class="p-4">
                                                    <h5 class="text-primary">Bienvenido de Regreso!</h5>
                                                    

                                                    <div>
                                                        <p class="mb-1"><i class="fas fa-circle align-middle text-primary" style='font-size:8px;'></i> Total clientes: {{$clientes->count()}}</p>
                                                        <p class="mb-1"><i class="fas fa-circle align-middle text-primary" style='font-size:8px;'></i> Solicitudes de Retiro: {{$solicitudes->count()}}</p>
                                                        <p class="mb-0"><i class="fas fa-circle align-middle text-primary" style='font-size:8px;'></i> Solicitudes de Eliminacion de Cuenta: {{$solicitudes_e->count()}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-4 align-self-center">
                                                <div>
                                                    <img src="{{asset("adminlte/dist/img/sa1.png")}}" alt="" class="img-fluid2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card">
                                          <div class="gradient">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                  <div class="avatar-xs me-3">
                         <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                         <i class="fab fa-stripe"></i>
                         </span>
                                                  </div>
                               <h5 class="ml-1 font-size-14 mb-0"> Stripe</h5>
                                                </div>
                                                <div class="d-flex">
                                                        <span class="ms-1 text-truncate">{{$pagoss->count()}} Transacciones</span>
                                                    </div>

                                                <div class="text-muted">
                                                  
                                                    <h4>${{$pagoss->sum('monto_transaccion')}}</h4>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card ">
                                          <div class="gradient">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                        
                                        <div class="avatar-xs me-3">
                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                         <i class="fab fa-paypal"></i>
                                         </span>
                                                    </div>
                                                    <h5 class="ml-1 font-size-14 mb-0"> Paypal</h5>
                                                </div>
                                                <div class="d-flex">
                                                        <span class="ms-1 text-truncate">{{$pagosp->count()}} Transacciones</span>
                                                    </div>

                                                <div class="text-muted">
                                                  
                                                    <h4>${{$pagosp->sum('monto_transaccion')}}</h4>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>


                                   <div class="col-sm-4">
                                        <div class="card">
                                          <div class="gradient">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-2">
                                                    <div class="avatar-xs me-3">
                                                        <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                            <i class="far fa-handshake"></i>
                                                        </span>
                                                    </div>
                                                    <h5 class="ml-1 font-size-14 mb-0"> Mercado Pago</h5>
                                                </div>
                                                <div class="d-flex">
                                                        <span class="ms-1 text-truncate">{{$pagosm->count()}} Transacciones</span>
                                                    </div>

                                                <div class="text-muted">
                                                  
                                                    <h4>${{$pagosm->sum('monto_transaccion')}}</h4>
                                                    
                                                </div>
                                            </div>
                                             </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-end">
                                                <div class="input-group input-group-sm">
                                       <select class="form-select form-select-sm" id="select-mes2">
                        
               @foreach($meses as $mes)
                  <option value="{{$mes->id_mes}}" @if( $mes->id_mes == $mes_c) selected='selected' @endif >{{$mes->mes}} </option>
              @endforeach
                                                    </select>
                                                    <label class="input-group-text">Mes</label>
                                                </div>
                                            </div>
                                            <h4 class="card-title mb-4">Ventas (Mes)</h4>

                                        </div>

                                        

                                        <div class="row">
                                            <div class="col-lg-3">

                                                   <div>
                                                    <p class="mb-2"><i class="fas fa-circle  font-size-10 text-primary"></i> Stripe</p>
                                                    
                                                    <p id="text12" class="m-0"></p> 
                                                    <p id="text13" class="m-0"></p> 
                                                </div>

                                                <div class="mt-2 pt-2">
                                                    <p class="mb-2"><i class="fas fa-circle font-size-10 text-primary"></i> Paypal</p>

                                                    <p id="text14" class="m-0"></p> 
                                                    <p id="text15" class="m-0"></p> 

                                                </div>

                                                <div class="mt-2 pt-2">
                                                    <p class="mb-2"><i class="fas fa-circle font-size-10 text-primary"></i> Mercado Pago</p>
                                                    
                                                    <p id="text16" class="m-0"></p> 
                                                    <p id="text17" class="m-0"></p> 

                                                </div>

                                            </div>



                                            <div class="col-lg-6 col-sm-8 p-0">
<div class="chart" id="contenedor2">
<canvas id="polar-chart" style="min-height: 275px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
                                            </div>



                                            <div class="col-lg-3 col-sm-5 align-self-center">
                                               
                                               <div class="mt-0">
                                                    <p>Total Ventas (Mes)</p>
                                                    <h4 id="text18"></h4>

                                                    <p id="text19" class="text-muted mb-4"></p>

                                                    
                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Ventas (Hoy)</h4>

                                        
                                        <div class="tab-content mt-4">
                                            <div class="text-left">
              <div class="table-responsive mt-4">
   <table class="table align-middle mb-0">
      <tbody>
          <tr>
            <td>
                <div class="flex-shrink-0 me-3">
                <img src="{{asset("adminlte/dist/img/stripe.png")}}" alt="" class="avatar-ms rounded-circle">
                </div>
             </td>
             <td>                                             
                <h5 class="font-size-14 mb-1">Stripe</h5>
                <p class="mb-0">${{$pagosdays->sum('monto_transaccion')}}</p>
            </td>
      <td>
                <p class="text-muted mb-1">Ventas</p>
                <h5 class="mb-0">{{$pors}}%</h5>
            </td>
                                                    </tr>
                                                    <tr>
            <td>
                <div class="flex-shrink-0 me-3">
                <img src="{{asset("adminlte/dist/img/paypal.png")}}" alt="" class="avatar-ms rounded-circle">
                </div>
             </td>
             <td>                                             
                <h5 class="font-size-14 mb-1">Paypal</h5>
                <p class="mb-0">${{$pagosdayp->sum('monto_transaccion')}}</p>
            </td>
      <td>
                <p class="text-muted mb-1">Ventas</p>
                <h5 class="mb-0">{{$porp}}%</h5>
            </td>
                                                    </tr>
                                                    <tr>

             <td>
                <div class="flex-shrink-0 me-3">
                <img src="{{asset("adminlte/dist/img/mercado-pago.png")}}" alt="" class="avatar-ms rounded-circle">
                </div>
             </td>
             <td>                                             
                <h5 class="font-size-14 mb-1">Mercado Pago</h5>
                <p class="mb-0">${{$pagosdaym->sum('monto_transaccion')}}</p>
            </td>
      <td>
                <p class="text-muted mb-1">Ventas</p>
                <h5 class="mb-0">{{$porm}}%</h5>
            </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>


                                          
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        <!-- end row -->


@endsection