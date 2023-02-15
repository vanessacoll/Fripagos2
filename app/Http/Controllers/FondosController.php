<?php

namespace App\Http\Controllers;

use App\Models\Fondos;
use App\Models\Solicitud_retiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsuariosxBanco;
use App\Models\Tiendas;
use App\Models\Status;
use App\Models\Tipo_cuenta_externa;
use App\Models\Pagos;
use App\Models\Lugar_retiro;
use Illuminate\Support\Facades\Mail;
use App\Mail\NuevaSolicitud;
use Carbon\Carbon;

class FondosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $tienda =  Auth::user()->id_tienda;

        if($tienda){

        $datos_banco = UsuariosxBanco::where('id_usuario' , Auth::user()->id)->first();

        if($datos_banco){


        $date = Carbon::now()->locale('es'); 

        $fondos = Fondos::where('id_tienda' , Auth::user()->id_tienda)->first();

        $solicitudes = Solicitud_retiro::where('id_usuario' , Auth::user()->id)->get();
        
        $datos_tienda = Tiendas::where('id_tienda' , Auth::user()->id_tienda)
        ->where('id_gerente', Auth::user()->id)
        ->first();

        $solicitudes_aprobadas = Solicitud_retiro::where('id_usuario' , Auth::user()->id)
        ->where('id_status', 2)
        ->get();

        $solicitudes_proceso = Solicitud_retiro::where('id_usuario' , Auth::user()->id)
        ->where('id_status', 0)
        ->get();

        $pagos = Pagos::where('id_tienda' , Auth::user()->id_tienda)->get();
       
        return view('fondos.fondos',compact('solicitudes','datos_banco','datos_tienda', 'date', 'fondos', 'solicitudes_aprobadas', 'solicitudes_proceso','pagos'));


         }else{

        $status = 'error';
        $content = 'Usuario no Posee Cuenta Asociada';

    return redirect()->route("home")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]); 
        }


         }else{

        $status = 'error';
        $content = 'Usuario no Posee Tienda Registrada';

    return redirect()->route("home")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]); 
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $solicitudes = Solicitud_retiro::where('id_usuario' , Auth::user()->id)
        ->where('id_status', 0)
        ->first();

        if(!$solicitudes){
         
        $datos_banco = UsuariosxBanco::where('id_usuario' , Auth::user()->id)->first();
        
        $datos_tienda = Tiendas::where('id_tienda' , Auth::user()->id_tienda)
        ->where('id_gerente', Auth::user()->id)
        ->first();

        $fondos = Fondos::where('id_tienda' , Auth::user()->id_tienda)->first();

        $lugar = Lugar_retiro::select()->first();


        if($fondos->fondos > 20.00){

        return view('fondos.solicitud_retiro',compact('datos_banco','datos_tienda','fondos','lugar'));

        }else{
            
            $status = 'error';
            $content = 'No posee fondos Suficientes para realizar una solicitud de retiro de Fondos, el monto minimo para realizar retiros es de 20$';

         return redirect()->route("fondos")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

        }

        
     }else{

         $status = 'error';
         $content = 'Actualmente ya existe una solicitud de Retiro en Proceso';

         return redirect()->route("fondos")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
     }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
      
    
       $date = Carbon::now()->locale('es'); 

       $solicitud = new Solicitud_retiro($request->input());
       $solicitud->id_usuario = Auth::user()->id;
       $solicitud->monto      = $request->monto;
       $solicitud->fecha      = $date;
       $solicitud->id_tienda  = Auth::user()->id_tienda;
       $solicitud->id_tipo_retiro = $request->r2;

       if($request->r2==2){

       $tipo = "Dolares Efectivo";

       $solicitud->id_lugar_retiro = $request->id_lugar_retiro;
       $solicitud->fecha_retiro    = $request->fecha_retiro;
       $solicitud->hora_retiro     = $request->hora_retiro;

       }else if($request->r2==3){

       $tipo = "Dolares Transferencia";

       $solicitud->id_tipo_cuenta_externa = $request->r3;
       $solicitud->nombres_cuenta_externa = $request->nombres_cuenta_externa;
       $solicitud->correo_cuenta_externa  = $request->correo_cuenta_externa;
    
       }else{

        $tipo = "Bolivares Transferencia";
       }

       $solicitud->saveOrFail();

        $objDemo = new \stdClass($request->input());
        $objDemo->gerente    = $request->gerente;
        $objDemo->tienda     = $request->tienda;
        $objDemo->monto      = $request->monto;
        $objDemo->tipo       = $tipo;
        

        Mail::to('rmendoza9@gmail.com')->send(new NuevaSolicitud($objDemo));
       
         $status = 'success';
         $content = 'Solicitud Enviada Exitosamente';

         return redirect()->route("fondos")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    }


    public function solicitudes_retiro_ver_user(Solicitud_retiro $solicitudes)
    {
        $bancos = UsuariosxBanco::where('id_tienda',$solicitudes->id_tienda)->first();
        $tiendas = Tiendas::where('id_tienda',$solicitudes->id_tienda)->first();

        return view('fondos.solicitud_index', ['solicitudes' => $solicitudes],compact('tiendas','bancos'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fondos  $fondos
     * @return \Illuminate\Http\Response
     */
    public function show(Fondos $fondos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fondos  $fondos
     * @return \Illuminate\Http\Response
     */
    public function edit(Fondos $fondos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fondos  $fondos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fondos $fondos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fondos  $fondos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fondos $fondos)
    {
        //
    }
}
