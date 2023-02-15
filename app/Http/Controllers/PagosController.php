<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\Apecajas;
use App\Models\Fondos;
use App\Models\Pagos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Omnipay\Omnipay;
use App\PayPal;

class PagosController extends Controller
{
   
    public $gateway;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

       // $this->gateway = Omnipay::create('PayPal_Rest');
        //$this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
       // $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
       // $this->gateway->setTestMode(true); // here 'true' is for sandbox. Pass 'false' when go live
        $this->gateway = Omnipay::create('PayPal_Pro');
        $this->gateway->setUsername(env('PAYPAL_API_USERNAME'));
        $this->gateway->setPassword(env('PAYPAL_API_PASSWORD'));
        $this->gateway->setSignature(env('PAYPAL_API_SIGNATURE'));
        $this->gateway->setTestMode(true); // here 'true' is for sandbox. Pass 'false' when go live
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = auth()->user();
        $intent = $user->createSetupIntent();

        return view('ventas.vender',compact('intent'));
    }


    
    public function clave(Request $request)
    {


    $valor_almacenado = Apecajas::where('id_usuario', Auth::user()->id)
        ->where('cierre', 0)
        ->first();
  

    if ($request->clave1 === $valor_almacenado->clave) {
       

    return response()->json(['success'=>'Contraseña Cambiada Exitosamente']);

        
        }else{
       

          
    return response()->json(['errors'=>['clave' => 'Clave Incorrecta']]);  
          
         }
    }


    public function singleCharge(Request $request){

        //return $request->all();
    
    $amount = str_replace([',', '.'], ['', ''], $request->amount);
    $paymentMethod = $request->payment_method;

    $user = auth()->user();
    $user->createOrGetStripeCustomer();

    $paymentMethod = $user->addPaymentMethod($paymentMethod);

    $user->charge($amount, $paymentMethod->id);

    try {

    $valor_almacenado = Apecajas::where('id_usuario', Auth::user()->id)
        ->where('cierre', 0)
        ->first();


    $date = Carbon::now()->locale('es'); 

    $pagos = new Pagos($request->input());
    $pagos->id_forma_pago = 1;
    $pagos->monto_transaccion = $request->amount;
    $pagos->fecha = $date;
    $pagos->id_caja = $valor_almacenado->id_caja;
    $pagos->id_tienda = Auth::user()->id_tienda;
    $pagos->id_usuario = Auth::user()->id;
    $pagos->descripcion = $request->description;
    $pagos->nom_cliente = $request->name;
    $pagos->id_apertura = $valor_almacenado->id_apertura;
    $pagos->saveOrFail();

    $fondos = Fondos::where('id_tienda', Auth::user()->id_tienda)->first();

   if ($fondos === null) {

    $fondosnew = new Fondos($request->input());
    $fondosnew->id_tienda = Auth::user()->id_tienda;
    $fondosnew->fondos = $request->amount;
    $fondosnew->saveOrFail();

   }else{

    $newfondos = $fondos->fondos + $request->amount;

    $Update = Fondos::where('id_tienda', Auth::user()->id_tienda)
        ->update(['fondos' =>  $newfondos,
         ]);
   }

 //   $intent = $user->createSetupIntent();

   // return view('ventas.vender',compact('intent'));
   // 
    $status = 'success';
    $content = 'Pago Procesado Exitosamente';

    

    } catch (\Throwable $th) {

    $status = 'error';
    $content = 'Se produjo un error al momento de procesar el pago';


    }

    return redirect()->route("vender")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show(Pagos $pagos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagos $pagos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagos $pagos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagos $pagos)
    {
        //
    }

   //PAGAR CON PAYPAL

    public function charge(Request $request)
        {
            $arr_expiry = explode("/", $request->input('expiry'));
      
            $formData = array(
                'firstName' => $request->input('first-name'),
                'lastName' => $request->input('last-name'),
                'number' => trim($request->input('number')),
                'expiryMonth' => trim($arr_expiry[0]),
                'expiryYear' => trim($arr_expiry[1]),
                'cvv' => $request->input('cvc')
            );
     
            try {
                // Send purchase request
                $response = $this->gateway->purchase([
                    'amount' => $request->input('amount'),
                    'currency' => 'USD',
                    'card' => $formData
                ])->send();
     
                // Process response
                if ($response->isSuccessful()) {


    $valor_almacenado = Apecajas::where('id_usuario', Auth::user()->id)
        ->where('cierre', 0)
        ->first();

    $nombre = $request->input('first-name')." ".$request->input('last-name');
    $date = Carbon::now()->locale('es'); 

    $pagos = new Pagos($request->input());
    $pagos->id_forma_pago = 2;
    $pagos->monto_transaccion = $request->input('amount');
    $pagos->fecha = $date;
    $pagos->id_caja = $valor_almacenado->id_caja;
    $pagos->id_tienda = Auth::user()->id_tienda;
    $pagos->id_usuario = Auth::user()->id;
    $pagos->descripcion = $request->input('description');
    $pagos->nom_cliente = $nombre;
    $pagos->id_apertura = $valor_almacenado->id_apertura;
    $pagos->saveOrFail();

    $fondos = Fondos::where('id_tienda', Auth::user()->id_tienda)->first();

   if ($fondos === null) {

    $fondosnew = new Fondos($request->input());
    $fondosnew->id_tienda = Auth::user()->id_tienda;
    $fondosnew->fondos = $request->input('amount');
    $fondosnew->saveOrFail();

   }else{

    $newfondos = $fondos->fondos + $request->input('amount');

    $Update = Fondos::where('id_tienda', Auth::user()->id_tienda)
        ->update(['fondos' =>  $newfondos,
         ]);
   }

    // Payment was successful
    $arr_body = $response->getData();
    $amount = $arr_body['AMT'];
    $currency = $arr_body['CURRENCYCODE'];
    $transaction_id = $arr_body['TRANSACTIONID'];
     
  // echo "Payment of $amount $currency is successful. Your Transaction ID is: $transaction_id";
   
    $status = 'success';
    $content = 'Payment of '.$amount.' '.$currency.' is successful. Your Transaction ID is: '.$transaction_id.'';

    return redirect()->route("vender")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
  } else {

    $status = 'error';
    $content = 'Payment failed. '. $response->getMessage();

    return redirect()->route("vender")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    
    // Payment failed
   // echo "Payment failed. ". $response->getMessage();
  
  }
            } catch(Exception $e) {
                echo $e->getMessage();
            }
}


//PAGAR CON MERCADO PAGO
//

public function chargeMP(Request $request)
{

   require base_path('vendor/autoload.php');
 
   MercadoPago\SDK::setAccessToken(env('MP_ACCESS_TOKEN'));
 
   $payment = new MercadoPago\Payment();
   $payment->transaction_amount = (float)$_POST['transactionAmount'];
   $payment->token = $_POST['token'];
   $payment->description = $_POST['description'];
   $payment->installments = (int)$_POST['installments'];
   $payment->payment_method_id = $_POST['paymentMethodId'];
   $payment->issuer_id = (int)$_POST['issuer'];
 
   $payer = new MercadoPago\Payer();
   $payer->email = $_POST['email'];
   $payer->identification = array(
       "type" => $_POST['identificationType'],
       "number" => $_POST['identificationNumber']
   );
   $payment->payer = $payer;
 
   $payment->save();
 
   $response = array(
       'status' => $payment->status,
       'status_detail' => $payment->status_detail,
       'id' => $payment->id
   );
   echo json_encode($response);
           
}


public function prueba2()
    {
        $apertura = Apecajas::where('id_usuario', Auth::user()->id)
        ->where('cierre', 0)
        ->first();

       if ($apertura === null) {

        return response()->json(['errors'=>['clave' => 'NO']]); 

        }else{

        return response()->json(['success'=>'SI']);

        }

    }

}
