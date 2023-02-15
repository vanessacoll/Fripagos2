@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Cierres de Caja</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Reportes</li>
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
<h3 class="card-title">Listado de Cierres de Caja</h3>
</div>

 
<form method="GET" action="{{route("imprimir.cierres")}}" target="_blank">
                @csrf
<div class="card-body">



<div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Caja</label>
<select required name="id_caja" class="form-control select2" style="width: 100%;">
 <option value="">Seleccione</option>
               @foreach($cajas as $caja)
                  <option value="{{$caja->id_caja}}">  {{$caja->descripcion}}</option>
              @endforeach
</select>
</div>
</div>

<div class="col-sm-6">

<div class="form-group">
<label>Cajero</label>
<select required name="id" class="form-control select2" style="width: 100%;">
 <option value="">Seleccione</option>
               @foreach($cajeros as $cajero)
                  <option value="{{$cajero->id}}">{{$cajero->name_user}} {{$cajero->ape_user}}</option>
              @endforeach
</select>
</div>
</div>

</div>

<div class="row">
<div class="col-sm-6">

<div class="form-group">
<label>Fecha Inicial</label>
<div class="input-group date" id="reservationdate" data-target-input="nearest">
<input type="text" name="fecha_inicio" class="form-control datetimepicker-input" data-target="#reservationdate" />
<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
<div class="input-group-text"><i class="fa fa-calendar"></i></div>
</div>
</div>
</div>

</div>

<div class="col-sm-6">

<div class="form-group">
<label>Fecha Final</label>
<div class="input-group date" id="reservationdate2" data-target-input="nearest">
  
<input type="text" name="fecha_final" class="form-control datetimepicker-input" data-target="#reservationdate2" />

<div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
<div class="input-group-text"><i class="fa fa-calendar"></i></div>
</div>
</div>
</div>

</div>

</div>

</div>

<div class="card-footer">
<button class="btn btn-primary">Generar Listado</button>
<a href="{{route("home")}}" class="btn btn-default float-right">Cancelar</a>
</div>
</form>
</div>

</div>

</div>



</div>

@endsection