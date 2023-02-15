@if (count($pagos)>0)
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
<i class="fas fa-globe"></i> FRIPAGOS
</h2>
</div>

</div>

<div class="row invoice-info">
<div class="col-sm-4 invoice-col">
<address>
<strong>{{ $tiendas->nombre_tienda }}.</strong>
<br>Gerente: {{ $gerente->name_user}} {{ $gerente->ape_user}}
<br>Caja: {{$cajas->descripcion}} 
<br>
</address>
</div>


</div>

<h3 class="text-center"><b>Listado de Transacciones desde el {{ $start }} al {{ $end }}</b></h3>

<div class="border-top"></div>

<div class="row">
<div class="col-12 table-responsive">


<table class="table">
				<thead>
                <tr>
                    
                    <th>Caja</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Forma de Pago</th>
                    <th>Descripcion</th>
                    <th>Monto</th>

                </tr>
                </thead>
                <tbody>
                @foreach($pagos as $pago)
       
                    <tr>
                       
                      <td>{{$pago->caja->descripcion}}</td>             
                      <td>{{$pago->nom_cliente}}</td>
                      <td>{{$pago->fecha}}</td>
                      <td>{{$pago->forma->descripcion}}</td>
                      <td>{{$pago->descripcion}}</td>
                      <td>{{$pago->monto_transaccion}}</td>
                         
                                          
                    </tr>
                    
                @endforeach
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
<td>{{ $pagos->count('monto_transaccion')}}</td>
</tr>
<tr>
<th>Total Ventas</th>
<td>${{ $pagos->sum('monto_transaccion')}}</td>
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

@else

<script type="text/javascript">alert("No existen registros para los datos suministrados");</script>

<script>window.close();</script>

@endif 