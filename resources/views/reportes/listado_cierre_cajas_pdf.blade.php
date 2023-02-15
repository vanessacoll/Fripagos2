  @if (count($cierres)>0)
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

<h3 class="text-center"><b>Listado de Cierres de Caja desde el {{ $start }} al {{ $end }}</b></h3>

<div class="border-top"></div>

<div class="row">
<div class="col-12 table-responsive">


<table class="table">
				<thead>
                <tr>
                    
                    <th>Caja</th>
                    <th>Monto Total</th>
                    <th>Cant. Transacciones</th>
                    <th>Cajero</th>
                    <th>Fecha Apertura</th>
                    <th>Fecha Cierre</th>

                </tr>
                </thead>
                <tbody>
                @foreach($cierres as $cierre)
       
                    <tr>
                       
                      <td>{{$cierre->descripcion}}</td>             
                      <td>${{$cierre->monto_total}}</td>
                      <td>{{$cierre->total_transacciones}}</td>
                      <td>{{$cierre->name_user}} {{$cierre->ape_user}}</td>
                      <td>{{$cierre->fecha_ape}}</td>
                      <td>{{$cierre->fecha}}</td>
                         
                                          
                    </tr>
                    
                @endforeach
                </tbody>
</table>

</div>

</div>

<div class="border-top"></div>

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