@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Datos Cajeros</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('usuarios') }}">Cajeros</a></li>
              <li class="breadcrumb-item active">Editar Registro de Cajeros</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-12">

<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title">Editar Registro de Cajeros</h3>
</div>

 
<form method="GET" action="{{route("usuario.update",['user' => $user->id])}}">
               @method("PUT")
                @csrf
<div class="card-body">



  <div class="row">
<div class="col-md-6">

<div class="form-group">
<label>Nombre:</label>
<input required autocomplete="off" value="{{ $user->name_user }}" name="name_user" class="form-control" type="text" placeholder="Nombres">

                  @error('name_user')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Apellido:</label>
<input required autocomplete="off" value="{{ $user->ape_user }}" name="ape_user" class="form-control" type="text" placeholder="Apellidos">

                  @error('ape_user')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>

</div>

<div class="row">
  


<div class="col-md-6">
<div class="form-group">
<label>Email</label>
<input required autocomplete="off" value="{{ $user->email }}" name="email" class="form-control" type="email" placeholder="email">

                  @error('email')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Contraseña:</label>
<input required autocomplete="off" name="password" class="form-control" type="password" placeholder="Contraseña">

                  @error('password')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>
</div>


</div>

<div class="card-footer">
  <a href="{{route("usuarios")}}" class="btn btn-default float-right">Cancelar</a>
<button class="btn btn-primary">Actualizar</button>

</div>
</form>
</div>

</div>

</div>



</div>

@endsection