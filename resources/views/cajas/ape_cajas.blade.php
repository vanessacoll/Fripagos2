@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Apertura de Cajas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Aperturar Cajas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-10">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Apertura de Caja</h3>
</div>

 
<form method="GET" action="{{route("apertura.register")}}">
                @csrf
<div class="card-body">


<div class="col-sm-12">

<div class="form-group">
<label>Caja</label>
<select required name="id_caja" class="form-control select2bs4" style="width: 100%;">
 <option value="">Seleccione</option>
               @foreach($cajas as $caja)
                  <option value="{{$caja->id_caja}}">  {{$caja->descripcion}}</option>
              @endforeach
</select>
</div>
</div>

<div class="col-sm-12">

<div class="form-group">
<label>Usuario</label>
<input autocomplete="off" name="usuario"
value="{{Auth::user()->name_user}} {{Auth::user()->ape_user}}" class="form-control" type="text" disabled>

                  @error('cedula')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>


</div>
<div class="col-sm-12">
<div class="form-group">
<label>Clave del dia</label>
<input required autocomplete="off" name="clave" class="form-control" type="text" placeholder="Clave">

                  @error('clave')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>


</div>




<div class="card-footer">
<button class="btn btn-primary">Registrar</button>
<a href="{{route("home")}}" class="btn btn-default float-right">Cancelar</a>
</div>

</form>
</div>



</div>
</div>
</div>
@endsection


