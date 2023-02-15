<!DOCTYPE html>
<html lang="en">
<head>
@include('layout.head')
</head>
<body>
<div class="wrapper">

<section class="invoice">

<div class="row">
<div class="col-12">
<h2 class="page-header">
<i class="fas fa-globe"></i> {{ $tiendas->nombre_tienda }}
</h2>
</div>

</div>

<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
<address>
<strong>INFORME DE CIERRE DE CAJA.</strong>
<br>Caja: {{ $request->name_caja}}
<br>Cajero: {{Auth::user()->name_user}} {{Auth::user()->ape_user}}
<br>Fecha: {{ $date }}
<br>
</address>
</div>


</div>

<div class="border-top"></div>

<div class="row">
<div class="col-12 table-responsive">
<p class="lead"><b>Totales Transacciones:</b></p>

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

</div>

</div>

<div class="border-top"></div>

<div class="row">

<div class="col-6">
<p class="lead"><b>Totales:</b></p>

<div class="table-responsive">
<table class="table">
<tr>
<th>Total Transacciones:</th>
<td>{{ $request->total_transacciones}}</td>
</tr>
<tr>
<th>Total Ventas</th>
<td>${{ $request->monto_total}}</td>
</tr>
</table>
</div>
</div>

</div>

</section>

</div>


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>