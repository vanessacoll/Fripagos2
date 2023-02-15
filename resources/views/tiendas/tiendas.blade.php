@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mi Tienda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Mi Tienda</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="container-fluid">
<div class="row">
<div class="col-md-3">

<div class="card card-primary card-outline">
<div class="card-body box-profile">
<div class="text-center">
<img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/image_profile/'.Auth::user()->image_path ) }}" alt="User profile picture">
</div>
<h3 class="profile-username text-center">{{ Auth::user()->name_user }} {{ Auth::user()->ape_user }}</h3>
<p class="text-muted text-center">{{ $tiendas->nombre_tienda ?? ''}}</p>
<ul class="list-group list-group-unbordered mb-3">
<li class="list-group-item">
<b>Total ventas</b> <a class="float-right">${{$pagos->sum('monto_transaccion')}}</a>
</li>
<li class="list-group-item">
<b>Total ventas (MES)</b> <a class="float-right">${{$pagosmonth->sum('monto_transaccion')}}</a>
</li>
<li class="list-group-item">
<b>Total ventas (HOY)</b> <a class="float-right">${{$pagosday->sum('monto_transaccion')}}</a>
</li>
</ul>

<div>
    <a href="#" data-toggle="modal" data-target="#modal-image" class="btn btn-primary btn-block nav-link ">Cambiar Logo Empresa</a>
</div>
</div>

</div>



</div>

<div class="col-md-9">
<div class="card card-primary card-outline">
    <div class="">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Mi tienda</a></li>

<li class="nav-item"><a class="nav-link" href="#cuentas" data-toggle="tab">Cuentas Bancarias</a></li>


<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuracion</a></li>
</ul>
</div>


<div class="card-body">
<div class="tab-content">

<div class="active tab-pane" id="activity">

@if ($tienda_register)
    

	<div class="col-sm-10">
    <p>No hay tiendas Registradas</p>
	<a href="{{route("tiendas.create")}}" class="btn btn-primary">Agregar</a>
	</div>

  @else
 

<div class="post">
<div class="user-block">
<img class="img-circle img-bordered-sm" src="{{ asset('storage/image_profile/'.Auth::user()->image_path ) }}" alt="user image">
<span class="username">
<a href="#">{{ Auth::user()->name_user }} {{ Auth::user()->ape_user }}</a>
</span>
<span class="description">{{ auth()->user()->roles->pluck('name')[0] ?? ''}}</span>
</div>

</div>

<strong><i class="fas fa-store mr-1"></i> {{ $tiendas->nombre_tienda}}</strong>
<p class="text-muted">
{{ $tiendas->tipo_tienda->descripcion}}
</p>
<hr>
<strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>
<p class="text-muted">{{ $tiendas->direccion}}</p>
<hr>

<strong><i class="fas fa-phone mr-1"></i> Telefono</strong>
<p class="text-muted">{{ $tiendas->telefono}}</p>

  <a href="{{route("tiendas.edit",['tiendas' => Auth::user()->id_tienda])}}" class="btn btn-primary float-right">Editar</a>

@endif 

</div>


<div class="tab-pane" id="cuentas">


    
  
@if ($cuenta_register)
    

  <div class="col-sm-10">
  <p>No hay cuentas Registradas</p>
  <a href="{{route("cuentas.create")}}" class="btn btn-primary">Agregar</a>
  </div>

  @else
  <div>
   <div class="post">
<div class="user-block">
<img class="img-circle img-bordered-sm" src="{{ asset('storage/image_profile/'.Auth::user()->image_path ) }}" alt="user image">
<span class="username">
<a href="#">{{ Auth::user()->name_user }} {{ Auth::user()->ape_user }}</a>
</span>
<span class="description">{{ auth()->user()->roles->pluck('name')[0] ?? ''}}</span>
</div>

</div>

<strong><i class="fas fa-landmark mr-1"></i> Banco {{ $usuariosxbanco->banco->descripcion}}</strong>
<p class="text-muted">
{{ $usuariosxbanco->cuenta_bancaria}}
</p>
<hr>
<strong><i class="fas fa-hand-holding-usd mr-1"></i> Beneficiario</strong>
<p class="text-muted">{{ $usuariosxbanco->cedula_usuario}} {{ $usuariosxbanco->nombre_usuario}}</p>
<hr>

<strong><i class="fas fa-phone mr-1"></i> Telefono</strong>
<p class="text-muted">{{ $usuariosxbanco->telefono_usuario}}</p>

  <a href="{{route("cuentas.edit",['cuentas' => $usuariosxbanco->id_cuenta ])}}" class="btn btn-primary float-right">Editar</a>

  </div>


@endif 






</div>



<div class="tab-pane" id="settings">

<div class="post clearfix">
<div class="row">
  <div class="pl-2">
  <h6 class="text-black-50"><b>Cambiar Contraseña</b></h6>

  <p class="text-black-50">Te recomendamos encarecidamente, que por tu seguridad, elijas una contraseña unica que no uses para conectarte a otras cuentas.</p>
</div>
 

<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#modal-pass" >Cambiar Contraseña</button>

  
</div>
</div>

<div class="post clearfix">
<div class="row">
  <div class="pl-2">
  <h6 class="text-black-50"><b>Solicitud eliminacion de Cuenta</b></h6>

  <p class="text-black-50">Haz clic en ENVIAR SOLICITUD para iniciar el proceso de eliminacion permanente de tu cuenta de FRIPAGOS, incluida toda toda tu informacion personal, datos bancarios y pagos registrados en nuestra aplicacion. </p>
</div>
 

<button type="button" class="btn btn-primary  ml-2" data-toggle="modal" data-target="#modal-eliminar" >Enviar Solicitud</button>


</div>
</div>

</div>




</div>

</div>
</div>

</div>

</div>

</div>

<div class="modal fade" id="modal-image">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Agregar Imagen</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>

{!! Form::open(['route' => ['cuentas.imagen.index', $user ], 'method' => 'patch', 'files' => true]) !!}
<div class="modal-body">
 <h5>Registra el logo de tu Empresa. </h5>

<!--{!! Form::file('image') !!}-->

<div class="input-group pt-3 pb-2">
<div class="custom-file">
<input type="file" class="custom-file-input" name="image">
<label class="custom-file-label" for="exampleInputFile">Ningun archivo seleccionado</label>
</div>
</div>

</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary ">Guardar Imagen</button>
</div>
{!! Form::close() !!}
</div>

</div>

</div>



 <form  id="form2">
        @csrf
  <!-- Modal -->

  <div class="modal" tabindex="-1" role="dialog" id="modal-pass">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    

<div class="modal-header ">

  <h4 class="modal-title">
    Cambiar Contraseña
  </h4>
  
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<div class="alert alert-danger" style="display:none"></div>

      
      <div class="modal-body" style="overflow: hidden;">

          <h5>Estás a un paso de tu nueva contraseña, cambia tu contraseña ahora. </h5>

  <div class="input-group mb-3 mt-3">     
    <div class="input-group">
      <input ID="txtPassword" type="Password" Class="form-control" placeholder="introduce tu contraseña actual" name="txtPassword">
      <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword('txtPassword','.icon1')"> <span class="fa fa-eye-slash icon1"></span> </button>
          </div>
    </div>
    
        <div id="name-error"> </div> 
    
  </div>


   <div class="input-group mb-3">
     
        <div class="input-group">
      <input ID="txtPassword2" type="Password" Class="form-control" placeholder="Introduce tu nueva Contraseña" name="txtPassword2">
      <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword('txtPassword2','.icon2')"> <span class="fa fa-eye-slash icon2"></span> </button>
          </div>

    </div>

</div>

<div class="input-group mb-3">
     
        <div class="input-group">
      <input ID="txtPassword3" type="Password" Class="form-control" placeholder="Confirma tu nueva Contraseña" name="txtPassword3">
      <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword('txtPassword3','.icon3')"> <span class="fa fa-eye-slash icon3"></span> </button>
          </div>
    </div>
</div>





      </div>



  <div class="modal-footer justify-content-between">

<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button class="btn btn-primary" id="ajaxSubmit3">Guardar Contraseña</button>

  </div>


    </div>
  </div>
</div>
  </form>


   <form  method="GET" action="{{route("cuentas.solicitud")}}">
        @csrf
  <!-- Modal -->

  <div class="modal" tabindex="-1" role="dialog" id="modal-eliminar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      

<div class="modal-header ">

  <h4 class="modal-title">
    Eliminar mi cuenta
  </h4>
  
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
      
      <div class="modal-body" style="overflow: hidden;">

          <h5 class="text-center"> Antes de irte, nos gustaria saber el porque</h5>


<p class="mt-3 text-center">¿Por que quieres eliminar tu cuenta?</p>

  <div class="row">
<div class="col-sm-12">

<div class="form-group">
<select required name="id_motivo" class="form-control select2bs4" style="width: 100%;">
 <option value="">Seleccione</option>
               @foreach($motivos as $motivo)
                  <option value="{{$motivo->id_motivo}}">  {{$motivo->motivo_eliminacion}}</option>
              @endforeach
</select>
</div>
</div>
</div>

<p class="text-danger"><strong>Aviso:</strong> Si solicitas la eliminacion de tu cuenta, esta se eliminara en un periodo de 14 dias. Ten en cuenta que no podras volver a activarla  ni recuperar ningun dato o contenido que hayas subido a tu cuenta</p>



      </div>



  <div class="modal-footer justify-content-between">

<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button class="btn btn-primary">Enviar solicitud</button>

  </div>


    </div>
  </div>
</div>
  </form>


</div>

<script>
         jQuery(document).ready(function(){

        

            jQuery('#ajaxSubmit3').click(function(e){
               e.preventDefault();
                

               jQuery.ajax({


                  url: "{{ url('/changepassword') }}",
                  method: 'get',
                  data: {
                     password_actual: jQuery('#txtPassword').val(),
                     nueva_password: jQuery('#txtPassword2').val(),
                     confirmar_password: jQuery('#txtPassword3').val(),
                  },
                  success: function(result){

                    if(result.errors)
                    {

                      jQuery('.alert-danger').html('');

                      jQuery.each(result.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<li>'+value+'</li>');
                      });


                    }
                    else
                    {
                      jQuery('.alert-danger').hide();
                   
                      $('#modal-change').modal('hide');

                      $('#txtPassword').val('');
                      $('#txtPassword2').val('');
                      $('#txtPassword3').val('');

                    alerta2();
                    }
                  }});
               });
            });
      </script>

<script type="text/javascript">

function alerta2(){

    var Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 7000
                    });
                  
                     Toast.fire({
                        icon: 'success',
                        title: 'Contraseña Cambiada Exitosamente'
                      })
 
  } 
</script>

@endsection