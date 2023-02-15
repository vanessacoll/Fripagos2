@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Cuentas </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('tiendas') }}">Mi Tienda</a></li>
              <li class="breadcrumb-item active">Editar Cuentas Bancarias</li>
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
<h3 class="card-title">Editar Datos de Cuentas Bancarias</h3>
</div>

 
 <form method="GET" action="{{route("cuentas.update",['cuentas' => $cuentas->id_cuenta])}}">
               @method("PUT")
                @csrf

<div class="card-body">


<div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Cedula del Beneficiario</label>
<input required autocomplete="off" value="{{$cuentas->cedula_usuario}}" name="cedula" class="form-control" type="text" placeholder="cedula">

                  @error('cedula')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>


</div>
<div class="col-sm-6">
<div class="form-group">
<label>Telefono</label>
<input required autocomplete="off" value="{{$cuentas->telefono_usuario}}"  name="telefono" class="form-control" type="text" data-inputmask='"mask": "(9999) 999-9999"' data-mask placeholder="Telefono">

                  @error('telefono')
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
<label>Banco</label>
<select required name="id_banco" class="form-control select2" style="width: 100%;">
 <option value="">Seleccione</option>
               @foreach($bancos as $banco)
                  <option value="{{$banco->id_banco}}" @if( $cuentas->id_banco == $banco->id_banco) selected='selected' @endif>  {{$banco->descripcion}}</option>
              @endforeach
</select>
</div>
</div>

<div class="col-sm-6">

<div class="form-group">
<label>Cuenta Bancaria</label>
<input required autocomplete="off" value="{{$cuentas->cuenta_bancaria}}"  name="cuenta" class="form-control" type="text" placeholder="cuenta Bancaria">

                  @error('cuenta')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>
</div>

</div>

<div class="card-footer">
<button class="btn btn-primary">Guardar</button>
<a href="{{route("tiendas")}}" class="btn btn-default float-right">Cancelar</a>
</div>
</form>
</div>

</div>

</div>



</div>

@endsection