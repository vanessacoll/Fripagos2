@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cierre de Cajas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Cierre de Cajas</li>
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
<h3 class="card-title">Cierre de Caja</h3>
</div>

 
<form method="GET" action="{{route("cierre.register")}}" target="_blank">
                @csrf
<div class="card-body">


<p class="lead"><b>Datos Caja:</b></p>

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label>Caja:</label>
<input name="name_caja" value="{{ $cajas->descripcion }}" class="form-control" type="text" readonly>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Cajero:</label>
<input name="gerente" value="{{Auth::user()->name_user}} {{Auth::user()->ape_user}}" class="form-control" type="text" readonly>
</div>

</div>

<div class="col-md-6">
<div class="form-group">
<input name="id_caja" value="{{ $cajas->id_caja }}" class="form-control" type="hidden" >
</div>
</div>


</div>

<p class="lead"><b>Datos Totales Transacciones:</b></p>

<table class="table">
<thead>
<tr>
<th>Forma de Pago</th>
<th>Total Transacciones</th>
<th>Total Ventas</th>

</tr>
</thead>
<tbody>
<tr>
<td>STRIPE</td>
<td>{{$pagosdays->count()}}</td>
<td>${{$pagosdays->sum('monto_transaccion')}}</td>
</tr>


<tr>
<td>PAYPAL</td>
<td>{{$pagosdayp->count()}}</td>
<td>${{$pagosdayp->sum('monto_transaccion')}}</td>
</tr>


<tr>
<td>MERCADO PAGO</td>
<td>{{$pagosdaym->count()}}</td>
<td>${{$pagosdaym->sum('monto_transaccion')}}</td>
</tr>

</tbody>
</table>

<p class="lead"><b>Totales:</b></p>

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label>Total Transacciones:</label>
<input name="total_transacciones" value="{{$pagos->count()}}" class="form-control" type="text" readonly>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Total Ventas:</label>
<input name="monto_total" value="{{$pagos->sum('monto_transaccion')}}" class="form-control" type="text" readonly>
</div>

</div>

</div>

</div>


<div class="card-footer">
<button class="btn btn-primary" id="botonEnvia" onclick="myFunction()">Registrar Cierre</button>

<a href="{{route("home")}}" class="btn btn-default float-right">Cancel</a>
</div>
</form>



</div>







</div>
</div>

  <!--EL MODAL SE ESTA EJECUTANDO DESDE EL JQUERY-->
</div>


@endsection