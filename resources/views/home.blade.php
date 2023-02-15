@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="container-fluid">

	

<!-- end page title -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card callout callout-primary">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4 p-0">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
            <img src="{{ asset('storage/image_profile/'.Auth::user()->image_path ) }}" alt="" class="avatar-md rounded-circle img-thumbnail">
                  </div>
                <div class="flex-grow-1 align-self-center ml-3">
              <div class="text-muted">
            
            <p class="mb-2">Bienvenido de Regreso!</p>
            <h5 class="mb-1">{{ Auth::user()->name_user }} {{ Auth::user()->ape_user }}</h5>
            <p class="mb-0">{{ auth()->user()->roles->pluck('name')[0] ?? ''}}</p>
            </div>
          </div>
        </div>
      </div>
                
  	<div class="col-lg-4 align-self-center p-0">
      <div class="text-lg-center mt-4 mt-lg-0">
        <div class="row">
          <div class="col-4 p-0">
            <div>
            <p class="text-muted text-truncate mb-2">Total </p>
            <p class="text-muted text-truncate mb-2">Ventas ($)</p>
            <h5 class="mb-0">${{$pagos->sum('monto_transaccion')}}</h5>
            </div>
          </div>
        <div class="col-4 p-0">
          <div>
            <p class="text-muted text-truncate mb-2">Total</p>
            <p class="text-muted text-truncate mb-2">Transacciones</p>
            <h5 class="mb-0">{{$pagos->count()}}</h5>
          </div>
        </div>
        <div class="col-4 p-0">
          <div>
            <p class="text-muted text-truncate mb-2">Total</p>
            <p class="text-muted text-truncate mb-2">Fondos ($)</p>
            <h5 class="mb-0">${{ $fondos }}</h5>
          </div>
        </div>
        </div>
      </div>
    </div>
                
    <div class="col-lg-4">
       <div class="float-end">
         <div class="align-self-end">
           <img src="{{asset("adminlte/dist/img/s4.png")}}" alt="" class="img-fluid">
         </div>
      </div>
    </div>
  </div>
  <!-- end row -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card bg-primary bg-soft">
                                    <div>
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-white">Ventas (Hoy)</h5>
                                                    
                            <ul class=" p-0 text-white">Total Transacciones: {{$pagosday->count()}}</ul>
                            <ul class="p-0 text-white">Total Ventas ($): ${{$pagosday->sum('monto_transaccion')}}</ul>
                                                  
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="{{asset("adminlte/dist/img/s2.png")}}" alt="" class="img-fluid3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
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
                                                        <span class="ms-1 text-truncate">{{$pagosdays->count()}} Transacciones</span>
                                                    </div>

                                                <div class="text-muted">
                                                	
                                                    <h4>${{$pagosdays->sum('monto_transaccion')}}</h4>
                                                    
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
                                                        <span class="ms-1 text-truncate">{{$pagosdayp->count()}} Transacciones</span>
                                                    </div>

                                                <div class="text-muted">
                                                	
                                                    <h4>${{$pagosdayp->sum('monto_transaccion')}}</h4>
                                                    
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
                                                        <span class="ms-1 text-truncate">{{$pagosdaym->count()}} Transacciones</span>
                                                    </div>

                                                <div class="text-muted">
                                                	
                                                    <h4>${{$pagosdaym->sum('monto_transaccion')}}</h4>
                                                    
                                                </div>
                                            </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-end">
                                                <div class="input-group input-group-sm">
                                       <select class="form-select form-select-sm" id="select-mes">
                        
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

                                            <div class="col-lg-4">
                                            	<div class="border-top mt-1 mb-3 "></div>
                          <div class="text-muted">
                           <div class="mb-2">
                            <p class="mb-2">Total Ventas (Mes)</p>
                             <h4 class="badge-outline badge-success"  id="text4"></h4>
                           </div>
                                                    
                           <div class="mt-2">
                            <p class="mb-2">Total Transacciones</p>
                             <h4 class="badge-outline badge-success" id="text5"></h4>
                           </div>
                                                    
                          </div>


<div class="text-center ">
       
<div class="border-top mt-3 mb-2 "></div>
       <div class="row ">
         <div class="col-4">
        
            <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary me-1"></i>Stripe</p>
              <p id="text1"></p>
      
         </div>
         
         <div class="col-4">
        
            <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary me-1"></i>Paypal</p>
              <p id="text2"></p>
      
         </div>
        
         <div class="col-4">
        
            <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary me-1"></i>MP</p>
              <p id="text3"></p>
      
         </div>
                                            </div>
                                        </div>


                                            </div>

                                            <div class="col-lg-8">
<div class="chart" id="contenedor">
<canvas id="pie-chart" style="min-height: 275px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

<div class="col-xl-4">
  <div class="card">
    <div class="card-body">
       <h4 class="card-title mb-4">Ventas por Forma de Pago (Mes)</h4>

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
                <p class="mb-0">${{$pagosmonths->sum('monto_transaccion')}}</p>
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
                <p class="mb-0">${{$pagosmonthp->sum('monto_transaccion')}}</p>
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
                <p class="mb-0">${{$pagosmonthm->sum('monto_transaccion')}}</p>
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
                        <!-- end row -->

                        
                          
                                 
   </div>
 </div>

@if ($first_time_login)

    <form id="basic-form" >
        @csrf
  <!-- Modal -->

  <div class="modal" tabindex="-1" role="dialog" id="myModal4" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      
      
 

      
      <div class="modal-body" style="overflow: hidden;">


<div class="bs-stepper">
<div class="bs-stepper-header" role="tablist">

<div class="step" data-target="#part1">
<button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
<span class="bs-stepper-circle">1</span>
<span class="bs-stepper-label">Bienvenido a FriPagos</span>
</button>
</div>

<div class="line"></div>

<div class="step" data-target="#part2">
<button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
<span class="bs-stepper-circle">2</span>
<span class="bs-stepper-label">Tienda</span>
</button>
</div>

<div class="line"></div>

<div class="step" data-target="#part3">
<button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
<span class="bs-stepper-circle">3</span>
<span class="bs-stepper-label">Datos Bancarios</span>
</button>
</div>


<div class="line"></div>

<div class="step" data-target="#part4">
<button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
<span class="bs-stepper-circle">4</span>
<span class="bs-stepper-label">Cajas</span>
</button>
</div>





</div>
<div class="bs-stepper-content">

<div id="part1" class="content justify-content-center" role="tabpanel" aria-labelledby="logins-part-trigger">

  <div class="text-center mb-4">
                                  <!--  <div class="avatar-md mx-auto mb-4">
                                        <div class="avatar-title bg-light rounded-circle text-primary h1">
                                            <i class="mdi mdi-email-open"></i>
                                        </div>
                                    </div>-->

            <div class="flex-shrink-0 me-3 mb-4">
            <img src="{{ asset('storage/image_profile/default_profile.png' ) }}" alt="" class="avatar-md rounded-circle img-thumbnail">
            </div>

  <div class="row justify-content-center">
                                        <div class="col-xl-7">
                                            <h4 class="text-primary mb-3">Bienvenido a FriPagos!</h4>

                                            <p class="text-muted font-size-14 mb-3">Gracias por elegirnos como su plataforma de gestion para ventas!</p>

                                            <p class="text-muted font-size-14 mb-4">Antes de comenzar, este asistente de configuracion te permitira establecer los ajustes basicos requeridos por nuestra plataforma.</p>

                                           
                                            
                                        </div>
                                    </div>



<!--<button type="button" class="btn btn-default" data-dismiss="modal">Ahora no</button>-->
<a class="btn btn-primary " onclick="stepper.next()">Vamos a ello!</a>

</div>

</div>

<div id="part2" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">


<p class="text-muted font-size-14 mb-4"><strong>Ingresa los datos de tu Tienda.</strong></p>


  <div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Tienda</label>
<input required autocomplete="off" id="nombre_tienda" name="nombre_tienda" class="form-control" type="text" placeholder="Nombre de la Tienda">

</div>


</div>
<div class="col-sm-6">
<div class="form-group">
<label>Rif</label>
<input required autocomplete="off" id="rif" name="rif" class="form-control" type="text" placeholder="Cedula o Rif">

</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Nombre Gerente</label>
<input required autocomplete="off" id="name_user" name="name_user" class="form-control" type="text" placeholder="Nombres Gerente ">

</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Apellidos Gerente</label>
<input required autocomplete="off" id="ape_user" name="ape_user" class="form-control" type="text" placeholder="Apellidos Gerente">

</div>
</div>
</div>


<div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Telefono</label>
<input required autocomplete="off" id="telefono" name="telefono" class="form-control" type="text" data-inputmask='"mask": "(9999) 999-9999"' data-mask placeholder="Telefono ">

</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Direccion</label>
<input required autocomplete="off" id="direccion" name="direccion" class="form-control" type="text" placeholder="Direccion">

</div>
</div>
</div>

<div class="row">
  <div class="col-sm-12">
<div class="form-group">
<label>Tipo de Tienda</label>
<select required id="id_tipo_tienda" name="id_tipo_tienda" class="form-control select2" style="width: 100%;">
 <option value="">Seleccione</option>
               @foreach($tip_tiendas as $tip_tienda)
                  <option value="{{$tip_tienda->id_tipo_tienda}}">  {{$tip_tienda->descripcion}}</option>
              @endforeach
</select>
</div>
</div>
</div>

<div class="row mt-2 ml-0">

<a class="btn btn-primary" onclick="stepper.next()">Siguiente</a>
  
</div>


</div>

<div id="part3" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

<p class="text-muted font-size-14 mb-0"><strong>Ingresa tus Datos Bancarios.</strong></p>
<p class="text-muted font-size-14 mb-4">Esto te permitira realizar las solicitudes de retiro de Fondos correctamente.</p>

  <div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Cedula del Beneficiario</label>
<input required autocomplete="off" id="cedula" name="cedula" class="form-control" type="text" placeholder="cedula">

                
</div>


</div>
<div class="col-sm-6">
<div class="form-group">
<label>Telefono</label>
<input required autocomplete="off" id="telefono2" name="telefono2" class="form-control" type="text" data-inputmask='"mask": "(9999) 999-9999"' data-mask placeholder="Telefono">

</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Banco</label>
<select required id="id_banco" name="id_banco" class="form-control select2" style="width: 100%; max-height: 110px;">
 <option value="">Seleccione</option>
               @foreach($bancos as $banco)
                  <option value="{{$banco->id_banco}}">  {{$banco->descripcion}}</option>
              @endforeach
</select>
</div>
</div>

<div class="col-sm-6">

<div class="form-group">
<label>Cuenta Bancaria</label>
<input required autocomplete="off" id="cuenta" name="cuenta" class="form-control" type="text" placeholder="cuenta Bancaria">

              
</div>
</div>
</div>

<div class="mt-2 ml-0">

<a class="btn btn-primary" onclick="stepper.previous()">Anterior</a>
<a class="btn btn-primary" onclick="stepper.next()">Siguiente</a>

</div>
</div>

<div id="part4" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">

<p class="text-muted font-size-14 mb-0"><strong>Registra un Caja.</strong></p>
<p class="text-muted font-size-14 mb-3">Este Proceso te permitira llevar un control de tus ventas desde cuelquier sitio donde inicies session (Antes de empezar a vender debes realizar el proceso de Apertura de Caja).</p>

<div class="row">
<div class="col-sm-12">
<div class="form-group">
<label>Descripcion</label>
<input required autocomplete="off" id="descripcion" name="descripcion" class="form-control" type="text" placeholder="ej.: Caja 001">

                  
</div>
</div>
</div>

<div class="mt-2 ml-0">

<a class="btn btn-primary" onclick="stepper.previous()">Anterior</a>
<button id="ajaxSubmit3" class="btn btn-primary">Finalizar</button>

</div>

</div>


</div>
</div>


  </div>


    </div>
  </div>
</div>
  </form>




@endif 

<script type="text/javascript">

 // $( document ).ready(function() {
   // $('#myModal4').modal('show')
//});

  $(function(){

    $("#myModal4").modal();

  });
 
 // $(window).load(function(){ $('#myModal').modal('show'); }); 
</script>


@endsection