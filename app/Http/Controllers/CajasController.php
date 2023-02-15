<?php

namespace App\Http\Controllers;

use App\Models\Cajas;
use App\Models\Apecajas;
use App\Models\Ciecajas;
use App\Models\Pagos;
use App\Models\Status;
use App\Models\Formas_pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Tiendas;

class CajasController extends Controller
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
        
        $cajas = DB::table('cajas')
        ->join('tiendas','cajas.id_tienda','tiendas.id_tienda')
        ->join('status','cajas.id_status','status.id_status')
        ->select(DB::raw('cajas.*'), 'status.des_status')
        ->where('tiendas.id_tienda', Auth::user()->id_tienda)      
        ->get();

        return view('cajas.cajas',compact('cajas'));

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pagos()
    {
        
        $pagos = Pagos::where('id_tienda', Auth::user()->id_tienda)->get();

        return view('cajas.pagos',compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $tiendas = Tiendas::where('id_gerente', Auth::user()->id)->first();

        $cajas_c = Cajas::where('id_tienda',  Auth::user()->id_tienda)
        ->where('descripcion', $request->descripcion)->first();

        if($cajas_c){

        $status = 'error';
        $content = 'Ya existe una Caja registrada con esa descripcion';

        }else{

        $cajas = new Cajas($request->input());
        $cajas->descripcion = $request->descripcion;
        $cajas->id_tienda = $tiendas->id_tienda;
        $cajas->id_status = 3; 
        $cajas->saveOrFail();  

        $status = 'success';
        $content = 'Caja Registrada Exitosamente';

        }
        
    return redirect()->route("cajas")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    }



     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apertura()
    {
       $tienda =  Auth::user()->id_tienda;

        if($tienda){

        $apertura = Apecajas::where('id_usuario', Auth::user()->id)
        ->where('cierre', 0)
        ->first();

        if ($apertura === null) {
        
        $cajas = DB::table('cajas')
        ->join('tiendas','cajas.id_tienda','tiendas.id_tienda')
        ->select(DB::raw('cajas.*'))
        ->where('tiendas.id_tienda', Auth::user()->id_tienda)
        ->where('cajas.id_status', 3)      
        ->get();

        return view('cajas.ape_cajas',compact('cajas'));

        }else{

    $status = 'error';
    $content = 'Usuario ya posee Caja Aperturada';

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register_apertura(Request $request)
    {
       // $this->validator($request->all())->validate();

        $apertura = Apecajas::where('id_caja', $request->id_caja)
        ->where('cierre', 0)
        ->first();

if(!$apertura){

        $date = Carbon::now()->locale('ve'); 

        $apecajas = new Apecajas($request->input());
        $apecajas->id_caja = $request->id_caja;
        $apecajas->clave = $request->clave;
        $apecajas->id_usuario = Auth::user()->id;
        $apecajas->fecha = $date;
        $apecajas->saveOrFail();

       // session(['id_caja' => $request->id_caja ]);

    $status = 'success';
    $content = 'Apertura de Caja Realizado Exitosamente';

    return redirect()->route("home")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

}else{

    $status = 'error';
    $content = 'La caja Seleccionada ya posee un apertura en proceso';

    return redirect()->route("apertura")->with('process_result',[
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
    public function cierre()
    {
        $apertura = Apecajas::where('id_usuario', Auth::user()->id)
        ->where('cierre', 0)
        ->first();

        if ($apertura === null) {

        $status = 'error';
        $content = 'Usuario NO posee Caja Aperturada';

    return redirect()->route("home")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

        }else{

        $cajas = Cajas::where('id_caja', $apertura->id_caja)->first();

        $pagosdays = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->where('id_apertura', $apertura->id_apertura)
        ->where('id_forma_pago', 1)
        ->get();

        $pagosdayp = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->where('id_apertura', $apertura->id_apertura)
        ->where('id_forma_pago', 2)
        ->get();

        $pagosdaym = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->where('id_apertura', $apertura->id_apertura)
        ->where('id_forma_pago', 3)
        ->get();

        //falta el id-caja
        $pagos = Pagos::where('id_usuario', Auth::user()->id)
        ->where('id_apertura', $apertura->id_apertura)
        ->get();

        return view('cajas.cie_cajas',compact('pagos','pagosdays', 'pagosdayp','pagosdaym', 'cajas'));

        }
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register_cierre(Request $request)
    {
        
        $apertura = Apecajas::where('id_usuario', Auth::user()->id)
        ->where('id_caja',$request->id_caja)
        ->where('cierre',0)
        ->first();

        $pagosdays = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->where('id_apertura', $apertura->id_apertura)
        ->where('id_forma_pago', 1)
        ->get();

        $pagosdayp = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->where('id_apertura', $apertura->id_apertura)
        ->where('id_forma_pago', 2)
        ->get();

        $pagosdaym = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->where('id_apertura', $apertura->id_apertura)
        ->where('id_forma_pago', 3)
        ->get();

        $tiendas = Tiendas::where('id_gerente', Auth::user()->id)->first();

        $date = Carbon::now()->locale('ve'); 

        $ciecajas = new Ciecajas($request->input());
        $ciecajas->monto_total = $request->monto_total;
        $ciecajas->id_usuario = Auth::user()->id;
        $ciecajas->fecha = $date;
        $ciecajas->id_caja = $request->id_caja;
        $ciecajas->id_apertura = $apertura->id_apertura;
        $ciecajas->total_transacciones = $request->total_transacciones;
        $ciecajas->saveOrFail();

         $Update = Apecajas::where('id_usuario', Auth::user()->id)
         ->where('id_caja',$request->id_caja)
         ->where('cierre',0)
         ->update(['cierre' =>  1,
         ]);

         
    return view('cajas.ticket',compact('request','tiendas','pagosdayp','pagosdaym','pagosdays','date'));


     
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function show(Cajas $cajas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cajas = Cajas::find($id);

        return response()->json([
          'data' => $cajas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Update = Cajas::where('id_caja', $id)
        ->update(['descripcion' => $request->name,
         ]);

        return response()->json([ 'success' => true ]);
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Remota  $remota
     * @return \Illuminate\Http\Response
     */
    public function inactivar(Cajas $cajas)
    {

        $cajas->id_status = 4; 
        $cajas->saveOrFail();

    $status = 'success';
    $content = 'Caja Inactivada Exitosamente';

    return redirect()->route("cajas")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cajas $cajas)
    {
        
    $pagos = Pagos::where('id_caja',$cajas->id_caja)->first();
     
        
    if (!$pagos) {
  
    $cajas->delete();

    $status = 'success';
    $content = 'Caja Eliminada Exitosamente';
    
        }else{

    $status = 'error';
    $content = 'Existen Pagos Asociados a esta Caja';

        }

    return redirect()->route("cajas")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    }


    public function clave2(Request $request)
    {


    $valor_almacenado = Apecajas::where('id_usuario', Auth::user()->id)
        ->where('cierre', 0)
        ->first();
  

    if ($request->clave === $valor_almacenado->clave) {
       

    return response()->json(['success'=>'SI']);

        
        }else{
       

          
    return response()->json(['errors'=>['clave' => 'Clave Incorrecta']]);  
          
         }
    }



    public function clave(Request $request)
    {


    $valor_almacenado = Apecajas::where('id_usuario', Auth::user()->id)
        ->where('cierre', 0)
        ->first();
  

    if ($request->clave === $valor_almacenado->clave) {
       

    return response()->json(['success'=>'SI']);

        
        }else{
       

          
    return response()->json(['errors'=>['clave' => 'Clave Incorrecta']]);  
          
         }
    }

    public function prueba()
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

 
    public function listado_transacciones()
    {
        $cajas = DB::table('cajas')
        ->join('tiendas','cajas.id_tienda','tiendas.id_tienda')
        ->select(DB::raw('cajas.*'))
        ->where('tiendas.id_tienda', Auth::user()->id_tienda)   
        ->get();

        $forma_pagos=Formas_pagos::select()->get(); 

        return view('reportes.listado_transacciones',compact('cajas','forma_pagos'));
    }


    public function imprimir_listado_transacciones(Request $request)
    {
    
    $cajas = Cajas::where('id_tienda', Auth::user()->id_tienda)->first();

    $tiendas = Tiendas::where('id_tienda', Auth::user()->id_tienda)->first();

    $gerente = User::where('id', $tiendas->id_gerente)->first();

    $start = $request->fecha_inicio;

    $end = $request->fecha_final;

    $pagos = Pagos::where('id_tienda', Auth::user()->id_tienda)
    ->where('id_caja', $request->id_caja)
    ->where('id_forma_pago', $request->id_forma_pago)
    ->whereBetween('fecha', [$start, $end])
    ->get();


  return view('reportes.listado_transacciones_pdf',compact('cajas','pagos','tiendas','gerente','start','end'));
    }

    public function listado_cierre()
    {
        
        $cajas = DB::table('cajas')
        ->join('tiendas','cajas.id_tienda','tiendas.id_tienda')
        ->select(DB::raw('cajas.*'))
        ->where('tiendas.id_tienda', Auth::user()->id_tienda)   
        ->get();

        $cajeros = User::where('id_tienda', Auth::user()->id_tienda)
        ->get();

        return view('reportes.listado_cierres_caja',compact('cajas','cajeros'));
    }


     public function imprimir_listado_cierre(Request $request)
    {
    
    $cajas = Cajas::where('id_tienda', Auth::user()->id_tienda)->first();

    $tiendas = Tiendas::where('id_tienda', Auth::user()->id_tienda)->first();

    $gerente = User::where('id', $tiendas->id_gerente)->first();

    $start = $request->fecha_inicio;

    $end = $request->fecha_final;

    $cierres = DB::table('ciecaja')
        ->join('apecaja','ciecaja.id_apertura','apecaja.id_apertura')
        ->join('cajas','ciecaja.id_caja','cajas.id_caja')
        ->join('users','ciecaja.id_usuario','users.id')
        ->select(DB::raw('ciecaja.*'), 'apecaja.fecha as fecha_ape', 'cajas.descripcion', 'users.ape_user', 'users.name_user')
        //->where('cajas.id_tienda', Auth::user()->id_tienda)
        ->where('ciecaja.id_caja', $request->id_caja)
        ->where('ciecaja.id_usuario', $request->id)
        ->whereBetween('ciecaja.fecha', [$start, $end])  
        ->get();

        return view('reportes.listado_cierre_cajas_pdf',compact('cajas','cierres','tiendas','gerente','start','end'));
    }
}
