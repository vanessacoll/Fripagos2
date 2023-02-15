@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registro y Actualizacion de Cajas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Cajas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-12">

<!-- Default box -->
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cajas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
       
       <button type="button" class="btn btn-primary float-right mb-2 ml-2" data-toggle="modal" data-target="#modal-change" >Agregar</button>
                

                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                   <tr>

                    <th>Cajas</th>
                    <th>Estatus</th>
                    <th>Editar</th>
                    <th>Inactivar</th>
                    <th>Borrar</th>
                  
                </thead>
                <tbody>
                @foreach($cajas as $caja)
                     
                    <tr>
                    
                        <td>{{$caja->descripcion}}</td>
                        <td>{{$caja->des_status}}</td>
                        
                        <td>
                           <a class="btn btn-warning" id="editCompany" data-toggle="modal" data-target='#practice_modal' data-id="{{ $caja->id_caja }}" href="">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>

                         <td>  
                            <a class="btn btn-info" href="{{route("cajas.inactivar",['cajas' => $caja->id_caja])}}">
                                <i class="fa fa-power-off"></i>
                            </a>
                        </td>
                        
                        <td>
                        
                             <form action="{{route("cajas.destroy", ['cajas' => $caja->id_caja])}}" method="get">
                              @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            
                        </td>
                    
                      
                    </tr>
                      
                @endforeach
                  </tbody>
                </table>


 <div class="modal" tabindex="-1" role="dialog" id="practice_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" style="display:none"></div>

<div class="modal-header ">

  <h4 class="modal-title">
   Editar Cajas
  </h4>
  
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<form id="companydata">
             
<input type="hidden" id="id_caja" name="id_caja" value="">

<div class="modal-body" style="overflow: hidden;">

<div class="col-sm-12">
<div class="form-group">
<label>Descripcion</label>
<input required autocomplete="off" name="name" id="name" class="form-control" type="text" value="">

</div>
</div>

</div>

<div class="modal-footer justify-content-between">

<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<input type="submit" id="submit" value="Modificar" class="btn btn-primary">

</div>
</form>

    </div>
  </div>
</div>

               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- /.card -->

</div>

</div>



</div>



  <div class="modal" tabindex="-1" role="dialog" id="modal-change">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" style="display:none"></div>
      

<div class="modal-header ">

  <h4 class="modal-title">
   Registrar Cajas
  </h4>
  
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



<form method="GET" action="{{route("cajas.create")}}">
                @csrf
      
      <div class="modal-body" style="overflow: hidden;">

          <h5> </h5>

<div class="col-sm-12">
<div class="form-group">
<label>Descripcion</label>
<input required autocomplete="off" name="descripcion" class="form-control" type="text" placeholder="ej.: Caja 001">

                  @error('descripcion')
                <span  class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                </span>
                  @enderror
</div>
</div>


      </div>



  <div class="modal-footer justify-content-between">

<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button class="btn btn-primary">Guardar</button>

  </div>
</form>

    </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function(){

  var table = $('#datatable').DataTable();

  table.on('click', '.edit', function() {
    $tr = $(this).closest('tr');
    if($($tr).hasClass('child')){

        $tr = $tr.prev('.parent');
    }

    var data = table.row($tr).data();

    $('#descripcion').val(data[1]);

    $('#editForm').attr('action', '/cajasup/'+data[0]);
    $('#editModal').modal('show');
  }); 
});
</script>


<script>

$(document).ready(function () {

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

//este es el que guarda
$('body').on('click', '#submit', function (event) {
    event.preventDefault()
    var id = $("#id_caja").val();
    var name = $("#name").val();

    jQuery.ajax({


                  url: '/cajasup/'+ id,
                  method: 'get',
                  data: {
                     id: id,
                     name: name,
                  },
                  success: function(result){

                    
                    $('#companydata').trigger("reset");
                    $('#practice_modal').modal('hide');
                    window.location.reload(true);

                   // alerta();
                    
                  }
                });
});

//este muestra

$('body').on('click', '#editCompany', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    //alert(id);
    //console.log(id)
    $.get('cajas/' + id + '/editar', function (data) {
         $('#userCrudModal').html("Editar");
         $('#submit').val("Editar");
         $('#practice_modal').modal('show');
         $('#id_caja').val(data.data.id_caja);
         $('#name').val(data.data.descripcion);
     })
});

}); 
</script>

<!-- /.modal -->

@endsection