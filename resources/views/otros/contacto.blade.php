@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contactanos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
              <li class="breadcrumb-item active">Contactanos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection


@section('contenido')

<div class="container-fluid">

 <div class="row">
        <div class="col-md-12">
        

<div class="card card-primary card-outline">

    <h3 class="ml-3 mt-2 mb-0">
¿En qué podemos ayudarte?</h3>
  <p class="ml-3 mt-2 mb-0">Rellena tus datos y envíanos tu consulta. Contactaremos contigo lo antes posible.</p>
  
  
<div class="card-body ">

  <form method="GET" action="{{route("contacto.nuevo")}}">
                @csrf

<div class="col-md-12">
<div class="form-group">
<label for="inputName">Nombre</label>
<input type="text" name="nombre" class="form-control" />
</div>
<div class="form-group">
<label for="inputEmail">E-Mail</label>
<input type="email" name="email" class="form-control" />
</div>
<div class="form-group">
<label for="inputSubject">Motivo</label>
<input type="text"name="motivo" class="form-control" />
</div>
<div class="form-group">
<label for="inputMessage">Mensaje</label>
<textarea name="message" class="form-control" rows="4"></textarea>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Enviar Mensaje">
</div>
</div>

</form>

</div>
</div>


        </div>
      </div>


</div>



@endsection