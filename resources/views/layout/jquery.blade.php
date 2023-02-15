<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="/adminlte/dist/js/demo.js"></script>


<!--desde aca nuevos-->


<script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="/adminlte/plugins/inputmask/jquery.inputmask.min.js"></script>


<script src="/adminlte/plugins/chart.js/Chart.min.js"></script>

<script src="/adminlte/plugins/sparklines/sparkline.js"></script>

<script src="/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

<script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="/adminlte/plugins/bs-stepper/js/bs-stepper.min.js"></script>



<script src="/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="https://js.stripe.com/v3/"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
       // format: 'L'
      format: 'YYYY-MM-DD'
    });

    //HORA

    $('#datetimepicker3').datetimepicker({
                    format: 'LT'
    });

 $('#reservationdate2').datetimepicker({
       // format: 'L'
      format: 'YYYY-MM-DD'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };   
    var card = elements.create('card', {hidePostalCode: true, style: style}); 
        card.mount('#card-element'); 
        card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });    
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;    
    cardButton.addEventListener('click', async (e) => {
        e.preventDefault();
        console.log("attempting");
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: cardHolderName.value }
                }
            });  
   
    if (error) {
        var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
    } else {            
        paymentMethodHandler(setupIntent.payment_method);
    }
});    

    function paymentMethodHandler(payment_method) {
        var form = document.getElementById('subscribe-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);        
        form.submit();
    }
</script>

<script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>


<script>
$(document).ready(function(){

  function onSelectMes(){

    var id_mes = $('#select-mes').val();
 
      $.get('/mes/'+id_mes, function(data){
//esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
      //  alert(data);

document.getElementById("pie-chart").remove();

var canvas = document.createElement("canvas");
canvas.id = "pie-chart"; 
canvas.height = 68;
canvas.width = 100;
document.getElementById("contenedor").appendChild(canvas);

 //get the pie chart canvas
var cData = eval(data);
     
     //alert(cData.data1[0]);
     
var ctx = $("#pie-chart");

var sum = 0;
var con = 0;

for (var i = 0; i < cData.data1.length; i++) {
    sum += cData.data1[i];
    con += cData.data2[i];
}

 $('#text5').text(con+' Transacciones');
 $('#text4').text('$'+sum);

 var c1 = 0;

 if(cData.data1[0]){
    c1 = cData.data1[0];
 }

 var c2 = 0;

 if(cData.data1[1]){
    c2 = cData.data1[1];
 }

 var c3 = 0;

 if(cData.data1[2]){
    c3 = cData.data1[2];
 }

 $('#text1').text('$'+c1);
 $('#text2').text('$'+c2);
 $('#text3').text('$'+c3);

      //pie chart data
      var data1 = {
        labels: cData.label,
      datasets: [
        {
          data: cData.data1,
         backgroundColor: [
                'rgba(0, 0, 139, 1)',
                'rgba(0,0,205,1)',
                'rgba(25, 25, 112, 1)',
                
            ]
        }
      ]
    
      };
 
      //options
      var options = {
        responsive: true,
      
        legend: {
          display: true,
          position: "right",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "doughnut",
        data: data1,
        options: options
      });


      });

      return false;
    
}

  onSelectMes();

  $('#select-mes').on('destroy');
  $('#select-mes').on('change', onSelectMes);



});

</script>


<script>
$(document).ready(function(){

  function onSelectMes2(){

    var id_mes = $('#select-mes2').val();
 
      $.get('/mes_a/'+id_mes, function(data){
//esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
      //  alert(data);

document.getElementById("polar-chart").remove();

var canvas = document.createElement("canvas");
canvas.id = "polar-chart"; 
canvas.height = 86;
canvas.width = 100;
document.getElementById("contenedor2").appendChild(canvas);

 //get the pie chart canvas
var cData1 = eval(data);
     
     //alert(cData.data1[0]);
     
var ctx2 = $("#polar-chart");


var c1 = 0;
var ct1 = 0;

 if(cData1.data1[0]){
    c1 = cData1.data1[0];
    ct1 = cData1.data2[0];
 }

 $('#text12').text('$'+c1);
 $('#text13').text(ct1+' Trans.');

var c2 = 0;
var ct2 = 0;

 if(cData1.data1[1]){
    c2 = cData1.data1[1];
    ct2 = cData1.data2[1];
 }

 $('#text14').text('$'+c2);
 $('#text15').text(ct2+' Trans.');

var c3 = 0;
var ct3 = 0;

 if(cData1.data1[2]){
    c3 = cData1.data1[2];
    ct3 = cData1.data2[2];
 }

 $('#text16').text('$'+c3);
 $('#text17').text(ct3+' Trans.');



var sum = 0;
var con = 0;

//sum = c1 + c2 + c3;
//
for (var i = 0; i < cData1.data1.length; i++) {
    sum += cData1.data1[i];
    con += cData1.data2[i];
}

 $('#text19').text(con+' Trans.');
 $('#text18').text('$'+sum);

      //pie chart data
      var data2 = {
        labels: cData1.label,
      datasets: [
        {
          data: cData1.data2,
         backgroundColor: [
                'rgba(0, 0, 139, 0.5)',
                'rgba(0,0,205,0.5)',
                'rgba(25, 25, 112, 0.5)',
                
            ]
        }
      ]
    
      };
 
      //options
      var options2 = {
        responsive: true,
      
        legend: {
          display: false,
          position: "right",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart2 = new Chart(ctx2, {
        type: "polarArea",
        data: data2,
        options: options2
      });


      });

      return false;
    
}

  onSelectMes2();

  $('#select-mes2').on('destroy');
  $('#select-mes2').on('change', onSelectMes2);



});

</script>




@if(session()->has('process_result'))
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 7000
    });
  
     Toast.fire({
        icon: '{{ session('process_result')['status']}}',
        title: '{{ session('process_result')['content']}}'
      })
    
  });
</script>
@endif

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script>

function myFunction(){

 window.location.replace('/home'); 
  } 

</script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script>
function showModal() {

  jQuery.ajax({

 url: "{{ url('/prueba2') }}",
      method: 'get',
      success: function(result){

      if(result.errors)
      {
          alerta();
      }
      else
      {
                      
  $('#myModal2').modal('show');
  jQuery('.alert-danger').html('');
  jQuery('.alert-danger').hide();


      }
    }
  });
}
</script>

<script type="text/javascript">

function openModal(){

 jQuery.ajax({

 url: "{{ url('/prueba') }}",
      method: 'get',
      success: function(result){

      if(result.errors)
      {
          alerta();
      }
      else
      {
                      
      $('#myModal').modal();
      jQuery('.alert-danger').html('');
      jQuery('.alert-danger').hide();

      }
    }
  });
}       
</script>

<script type="text/javascript">
function alerta(){

    var Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 7000
                    });
                  
                     Toast.fire({
                        icon: 'error',
                        title: 'Usuario NO posee Caja Aperturada'
                      })
 
  } 
</script>


  
  <form  id="form">
        @csrf
  <!-- Modal -->

  <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" style="display:none"></div>
      

<div class="modal-header ">

  <h4 class="modal-title">
    Cierre de Cajas
  </h4>
  
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
      
      <div class="modal-body" style="overflow: hidden;">

          

 <div class="col-sm-12">
<div class="form-group">
<h5>Ingrese clave del dia</h5>
<input ID="clave" required autocomplete="off" name="clave" class="mt-3 form-control" type="text" placeholder="Clave del dia">
</div>
</div>


      </div>



  <div class="modal-footer justify-content-between">

<button class="btn btn-primary" id="ajaxSubmit">Ingresar</button>

  </div>


    </div>
  </div>
</div>
  </form>


  <form  id="form">
        @csrf
  <!-- Modal -->

  <div class="modal" tabindex="-1" role="dialog" id="myModal2">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" style="display:none"></div>
      

<div class="modal-header ">

  <h4 class="modal-title">
    Registro de Pagos
  </h4>
  
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
      
      <div class="modal-body" style="overflow: hidden;">

          

 <div class="col-sm-12">
<div class="form-group">
<h5>Ingrese clave del dia</h5>
<input ID="clave1" required autocomplete="off" name="clave" class="mt-3 form-control" type="text" placeholder="Clave del dia">
</div>
</div>


      </div>



  <div class="modal-footer justify-content-between">

<button class="btn btn-primary" id="ajaxSubmit2">Ingresar</button>

  </div>


    </div>
  </div>
</div>
  </form>





<script>
         jQuery(document).ready(function(){

            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
                

               jQuery.ajax({


                  url: "{{ url('/clave2') }}",
                  method: 'get',
                  data: {
                     clave: jQuery('#clave').val(),
                  },
                  success: function(result){

                    if(result.errors)
                    {

                      jQuery('.alert-danger').html('');

                      jQuery.each(result.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<li>'+value+'</li>');
                      });


                    }
                    else
                    {
                      jQuery('.alert-danger').hide();
                   
                      $('#modal-change').modal('hide');

                      //window.open('/cierre');
                      location.href = '/cierre';
                      //return false;

                    }
                  }});
               });
            });
</script>


<script>
         jQuery(document).ready(function(){

            jQuery('#ajaxSubmit2').click(function(e){
               e.preventDefault();
                

               jQuery.ajax({


                  url: "{{ url('/clave') }}",
                  method: 'get',
                  data: {
                     clave1: jQuery('#clave1').val(),
                  },
                  success: function(result){

                    if(result.errors)
                    {

                      jQuery('.alert-danger').html('');

                      jQuery.each(result.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<li>'+value+'</li>');
                      });


                    }
                    else
                    {
                      jQuery('.alert-danger').hide();
                   
                      $('#modal-change').modal('hide');

                      //window.open('/cierre');
                      location.href = '/vender';
                      //return false;

                    }
                  }});
               });
            });
  </script>

  <script type="text/javascript">
function mostrarPassword(id, icon){
    var cambio = document.getElementById(id);
    if(cambio.type == "password"){
      cambio.type = "text";
      $(icon).removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $(icon).removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
</script>



<script>
         jQuery(document).ready(function(){

            jQuery('#ajaxSubmit3').click(function(e){
               e.preventDefault();
                
if(validaForm()){ 

               jQuery.ajax({


                  url: "{{ url('/datos') }}",
                  method: 'get',
                  data: {
                     nombre_tienda: jQuery('#nombre_tienda').val(),
                     rif: jQuery('#rif').val(),
                     name_user: jQuery('#name_user').val(),
                     ape_user: jQuery('#ape_user').val(),
                     telefono: jQuery('#telefono').val(),
                     direccion: jQuery('#direccion').val(),
                     id_tipo_tienda: jQuery('#id_tipo_tienda').val(),
                     cedula: jQuery('#cedula').val(),
                     telefono2: jQuery('#telefono2').val(),
                     id_banco: jQuery('#id_banco').val(),
                     cuenta: jQuery('#cuenta').val(),
                     descripcion: jQuery('#descripcion').val(),
                     
                  },
                  success: function(result){

                    if(result.errors)
                    {

                      alerta_validador("error","Hubo un Error durante el registro de los datos");

                    }
                    else
                    {
                      alerta_validador("success","Datos registrados Exitosamente");
                   
                      $('#myModal4').modal('hide');

                    }
                  }});
}

               });
            });
</script>



<script>
  function validaForm(){
    // Campos de texto
    if($("#nombre_tienda").val() == ""){
        alerta_validador("error","El campo Nombre Tienda no puede estar vacío.");
        $("#nombre_tienda").focus();       // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#rif").val() == ""){
        alerta_validador("error","El campo Rif no puede estar vacío.");
        $("#rif").focus();
        return false;
    }
    if($("#name_user").val() == ""){
        alerta_validador("error","El campo Nombre Gerente no puede estar vacío.");
        $("#name_user").focus();
        return false;
    }
    if($("#ape_user").val() == ""){
        alerta_validador("error","El campo Apellido Gerente no puede estar vacío.");
        $("#ape_user").focus();
        return false;
    }
    if($("#telefono").val() == ""){
        alerta_validador("error","El campo Telefono no puede estar vacío.");
        $("#telefono").focus();
        return false;
    }
    if($("#direccion").val() == ""){
        alerta_validador("error","El campo Direccion no puede estar vacío.");
        $("#direccion").focus();
        return false;
    }
    if($("#id_tipo_tienda").val() == "" || $("#id_tipo_tienda").val() == "Seleccione"){
        alerta_validador("error","Debe seleccionar un tipo de Tienda.");
        //$("#name_user").focus();
        return false;
    }
    if($("#cedula").val() == ""){
        alerta_validador("error","El campo Cedula no puede estar vacío.");
        $("#cedula").focus();
        return false;
    }
    if($("#telefono2").val() == ""){
        alerta_validador("error","El campo Telefono no puede estar vacío.");
        $("#telefono2").focus();
        return false;
    }
    if($("#id_banco").val() == "" || $("#id_banco").val() == "Seleccione"){
        alerta_validador("error","Debe seleccionar un tipo de Banco.");
        //$("#name_user").focus();
        return false;
    }
    if($("#cuenta").val() == ""){
        alerta_validador("error","El campo Cuenta no puede estar vacío.");
        $("#cuenta").focus();
        return false;
    }
    if($("#descripcion").val() == ""){
        alerta_validador("error","El campo Descripcion de caja no puede estar vacío.");
        $("#descripcion").focus();
        return false;
    }
    


    return true; // Si todo está correcto
}
</script>

<script type="text/javascript">
function alerta_validador(icon,message){

    var Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 7000
                    });
                  
                     Toast.fire({
                        icon: icon,
                        title: message
                      })
 
  } 
</script>

<script type="text/javascript">
$(document).ready(function () {

   jQuery('#accionAll').click(function(e){
               e.preventDefault();
    
       //alert("hola");

        var idsArray = []; //Variable tipo array
    
        jQuery('#delete_checkbox:checked').each(function () {
            idsArray.push($(this).attr('data-id'));
        });
       // console.log(idsArray);
    
        var unir_arrays_seleccionados = idsArray.join(",");
        //console.log(unir_arrays_seleccionados);

       // alert(unir_arrays_seleccionados);

        jQuery.ajax({


                  url: "{{ url('/accion') }}",
                  method: 'get',
                  data: {
                     ids: unir_arrays_seleccionados,
                     accion: jQuery('#accion').val(),
                     
                  },
                  success: function(result){

                    if(result.errors)
                    {

                      alerta_validador("error","Hubo un Error durante la actualizacion de los datos");

                    }
                    else
                    {
                      location. reload()
                      $('#delete_checkbox:checked').prop('checked', false);
                      alerta_validador("success","Datos actualizados Exitosamente");
                   
                      //$('#myModal4').modal('hide');

                    }
      }});





   });
    
});
</script>



