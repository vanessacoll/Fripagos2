@extends('layout.plantilla')

@section('contenido')

<style>
  #form-checkout {
    display: flex;
    flex-direction: column;
    max-width: 600px;
  }

  .container2 {
    height: 18px;
    display: inline-block;
    border: 1px solid rgb(118, 118, 118);
    border-radius: 2px;
    padding: 1px 2px;
  }
</style>

     

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div class="card callout callout-primary">
  <div class="card-body">
         
<h5><i class="fas fa-info"></i> Detalle del pago</h5>
<p>Complete toda la información a continuación.</p>

</div>
</div>
          


<div class="card card-primary card-outline">
<div class="card-header">
<h3 class="card-title">
Registro de Transacciones
</h3>
</div>
<div class="card-body">
<h4 class="mb-2 pb-2">Pagos con Tarjeta de Credito / Debito</h4>
<ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">


<li class="nav-item">
<a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true"><i class="fab fa-cc-mastercard"></i> Stripe</a>
</li>


<li class="nav-item">
<a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false"><i class="fab fa-cc-paypal"></i> Paypal</a>
</li>


<!--<li class="nav-item">
<a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false"><i class="far fa-credit-card"></i> Mercado Pago</a>
</li>-->

</ul>



<div class="tab-content" id="custom-content-below-tabContent">


<div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">


<form class="form-horizontal" action="{{ route('single.charge2') }}" method="POST" id="subscribe-form">
   @csrf

    
    <h5 class="mt-4 mb-3  ml-4 font-size-15">Pagos con Tarjeta de Credito / Debito (Stripe)</h5>
      
      <div class="  m-4 p-4 border">
 

        

    <div class="row">
      <div class="col-lg-8">
       <div class="form-group mb-0">
        <label for="cardnameInput">Nombre del Cliente</label>
         <input type="text" name="name" class="form-control" id="card-holder-name"  placeholder="Nombre del Cliente">
        </div>
      </div>

      <div class="col-lg-4">
       <div class="form-group mb-0">
        <label for="expirydateInput">Monto</label>
         <input type="text" name="amount" value="0.00" class="form-control money text-right"  placeholder="0.00">


       </div>
      </div>
   

    </div>


    <div class="form-group mt-3 mb-0">
      <label for="cardnumberInput">Descripcion de la Transaccion</label>
      <input type="text" class="form-control" id="description" name="description" placeholder="Detalle del Pago">
    </div>

  

    <div class="form-group mt-3 mb-0">
        <label for="card-element">Tarjeta de Credito o Debito</label>
        <div id="card-element" class="form-control">        </div>        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <div class="stripe-errors"></div>    @if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif 

    
 <div class="row">
      <div class="form-group text-center mt-4 ml-1 mb-0">
        <button  id="card-button" data-secret="{{ $intent->client_secret }}" class="btn ml-1 btn-primary">Procesar Pago</button>
    </div>
    </div>

</div>
  </form>

</div>




<div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">


    <form method="POST" action="{{ url('charge') }}">
      {{ csrf_field() }}

    <h5 class="mt-4 mb-3  ml-4 font-size-15">Pagos con Tarjeta de Credito / Debito (Paypal)</h5>
      <div class="  m-4 p-4 border">

<div class="row">
      <div class="col-lg-6">
       <div class="form-group">
        <label for="cardnameInput">Nombre del Cliente</label>

         <input id="column-left" class="form-control" type="text" name="first-name" placeholder="Nombre del Cliente" required="required" />

        </div>
      </div>

      <div class="col-lg-6">
       <div class="form-group">
        <label>Apellido del Cliente</label>
      
         <input id="column-right" type="text" class="form-control" name="last-name" placeholder="Apellido del Cliente" required="required" />
   
       </div>
      </div>
              
    </div>

    <div class="row">
      <div class="col-lg-6">
       <div class="form-group">
        <label for="cardnameInput">Tarjeta de Credito/Debito</label>

        <input id="input-field" type="text" name="number" data-inputmask='"mask": "9999 9999 9999 9999"' class="form-control" data-mask  placeholder="Card Number" required="required" />


        </div>
      </div>

      <div class="col-lg-3">
       <div class="form-group">
        <label>Fecha Exp.</label>

        <input id="column-left" type="text" name="expiry" data-inputmask='"mask": "99/99"' data-mask  placeholder="MM / YY" class="form-control" required="required" />

       </div>
      </div>
              

     <div class="col-lg-3">
       <div class="form-group">
        <label>CCV</label>

        <input id="column-right" type="text" name="cvc" data-inputmask='"mask": "999"' data-mask  placeholder="CCV"  class="form-control" required="required" />
   
       </div>
      </div>
              
    </div>

    <div class="row">
      <div class="col-lg-3">
       <div class="form-group">
        <label for="cardnameInput">Monto</label>

        <input id="input-field" type="text" name="amount" required="required" autocomplete="on" maxlength="40" class="form-control money" placeholder="0.00"/>

        </div>
      </div>

  <div class="col-lg-9">
      <div class="form-group">
      <label for="cardnumberInput">Descripcion de la Transaccion</label>
      <input type="text" class="form-control" id="description" name="description" placeholder="Detalle del Pago">
    </div>
  </div>
              
    </div>

    

<div class="row">
  <div class="form-group text-center mt-2 ml-1 mb-0">
          <input class="btn ml-1 btn-primary" id="input-button" name="submit" type="submit" value="Procesar Pago"/>
  </div>
</div>

  


</div>

  </form>
</div>




<div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">


   <form id="form-checkout">

  <h5 class="mt-4 mb-0  ml-4 font-size-15">Pagos con Tarjeta de Credito / Debito (Mercado Pago)</h5>

<div class="  m-4 p-4 border">

   <div id="form-checkout__cardNumber-container" class="container2"></div>

   <div id="form-checkout__expirationDate-container" class="container2"></div>

   <input type="text" name="cardholderName" id="form-checkout__cardholderName"/>

   <input type="email" name="cardholderEmail" id="form-checkout__cardholderEmail"/>

   <div id="form-checkout__securityCode-container" class="container2"></div>

   <select name="issuer" id="form-checkout__issuer"></select>

   <select name="identificationType" id="form-checkout__identificationType"></select>

   <input type="text" name="identificationNumber" id="form-checkout__identificationNumber"/>

   <select name="installments" id="form-checkout__installments"></select>

   <button type="submit" id="form-checkout__submit">Pagar</button>

  

</div>
 </form>


</div>







</div>


</div>

</div>
</div>

        </div>

       <!-- Add step #2 -->
  <script src="https://sdk.mercadopago.com/js/v2"></script>
  <script>
      const mp = new MercadoPago( "{{ env('MP_PUBLIC_KEY') }}");


      // Step #3
const cardForm = mp.cardForm({
   amount: '100.5',
   iframe: true,
   form: {
     id: 'form-checkout',
     cardholderName: {
       id: 'form-checkout__cardholderName',
       placeholder: "Titular de la tarjeta",
     },
     cardholderEmail: {
       id: 'form-checkout__cardholderEmail',
       placeholder: 'E-mail'
     },
     cardNumber: {
       id: 'form-checkout__cardNumber-container',
       placeholder: 'Número de la tarjeta',
     },
     securityCode: {
       id: 'form-checkout__securityCode-container',
       placeholder: 'Código de seguridad'
     },
     installments: {
       id: 'form-checkout__installments',
       placeholder: 'Cuotas'
     },
     expirationDate: {
       id: 'form-checkout__expirationDate-container',
       placeholder: 'Data de vencimiento (MM/YYYY)',
     },
     identificationType: {
       id: 'form-checkout__identificationType',
       placeholder: 'Tipo de documento'
     },
     identificationNumber: {
       id: 'form-checkout__identificationNumber',
       placeholder: 'Número de documento'
     },
     issuer: {
       id: 'form-checkout__issuer',
       placeholder: 'Banco emisor'
     }
   },
   callbacks: {
     onFormMounted: function (error) {
       if (error) return console.log('Callback para tratar o erro: montando o cardForm ', error)
     },
     onSubmit: function (event) {
       event.preventDefault();
 
       const {
         paymentMethodId: payment_method_id,
         issuerId: issuer_id,
         cardholderEmail: email,
         amount,
         token,
         installments,
         identificationNumber,
         identificationType
       } = cardForm.getCardFormData();
 
        fetch('/process_payment', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            token,
            issuer_id,
            payment_method_id,
            transaction_amount: Number(amount),
            installments: Number(installments),
            description: 'product description',
            payer: {
              email,
              identification: {
                type: identificationType,
                number: identificationNumber
             }
           }
         })
       })
     },
     onFetching: function (resource) {
       console.log('fetching... ', resource)
       const progressBar = document.querySelector('.progress-bar')
       progressBar.removeAttribute('value')
 
       return () => {
         progressBar.setAttribute('value', '0')
       }
     }
   }
 });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>


<script>
  $('.money').mask("###0.00", {reverse: true});
</script>

@endsection

