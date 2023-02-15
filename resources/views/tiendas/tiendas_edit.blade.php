@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Tienda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('tiendas') }}">Mi tienda</a></li>
              <li class="breadcrumb-item active">Editar Tienda</li>
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
<h3 class="card-title">Editar Datos de la tienda</h3>
</div>

 
   <form method="GET" action="{{route("tiendas.update",['tiendas' => $tiendas->id_tienda])}}">
               @method("PUT")
                @csrf


<div class="card-body">

<div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Nombre</label>
<input required autocomplete="off" value="{{$tiendas->nombre_tienda}}" name="nombre_tienda" class="form-control" type="text" placeholder="Nombre de la Tienda">

                  @error('nombre_tienda')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>


</div>
<div class="col-sm-6">
<div class="form-group">
<label>Rif</label>
<input required autocomplete="off" name="rif" value="{{$tiendas->rif}}" class="form-control" type="text" placeholder="Cedula o Rif">

                  @error('rif')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Nombre Gerente</label>
<input required autocomplete="off" value="{{ Auth::user()->name_user }}" name="name_user" class="form-control" type="text" placeholder="Nombres Gerente ">

                  @error('name_user')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Apellidos Gerente</label>
<input required autocomplete="off" name="ape_user" value="{{ Auth::user()->ape_user }}" class="form-control" type="text" placeholder="Apellidos Gerente">

                  @error('ape_user')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>
</div>


<div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Telefono</label>
<input required autocomplete="off" value="{{ $tiendas->telefono }}" name="telefono" class="form-control" data-inputmask='"mask": "(9999) 999-9999"' data-mask placeholder="Telefono ">

                  @error('telefono')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Direccion</label>
<input required autocomplete="off" value="{{ $tiendas->direccion }}" name="direccion" class="form-control" type="text" placeholder="Direccion">

                  @error('direccion')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>
</div>


<div class="form-group">
<label>Tipo de Tienda</label>
<select required name="id_tipo_tienda" class="form-control select2" style="width: 100%;">
 <option value="">Seleccione</option>
               @foreach($tip_tiendas as $tip_tienda)
                  <option value="{{$tip_tienda->id_tipo_tienda}}" @if( $tiendas->id_tipo_tienda == $tip_tienda->id_tipo_tienda) selected='selected' @endif>  {{$tip_tienda->descripcion}}</option>
              @endforeach
</select>
</div>




</div>

<div class="card-footer">
<button class="btn  btn-primary">Guardar</button>
<a href="{{route("tiendas")}}" class=" btn btn-default float-right">Cancelar</a>
</div>
</form>
</div>

</div>

</div>



</div>

@endsection