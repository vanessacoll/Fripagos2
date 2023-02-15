<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fondos;
use App\Models\Pagos;
use App\Models\Mes;
use App\Models\User;
use App\Models\Formas_pagos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tipo_tiendas;
use App\Models\Bancos;
use App\Models\Model_has_roles;
use App\Models\UsuariosxBanco;
use App\Models\Tiendas;
use App\Models\Status;
use App\Models\Solicitud_retiro;
use App\Models\Solicitudes_eliminacion;
use App\Mail\Solicitud_estatus;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


    $fondos = Fondos::where('id_tienda' , Auth::user()->id_tienda)->first();


    $fondos_p = Fondos::where('id_tienda' , Auth::user()->id_tienda)->first();
    
    if($fondos_p){
        $fondos = $fondos_p->fondos;
    }else{
        $fondos = 0;
    } 

    $pagosday = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereDay('fecha', date('d'))
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->get();

    $pagosdays = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereDay('fecha', date('d'))
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 1)
        ->get();

   $pagosdayp = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereDay('fecha', date('d'))
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 2)
        ->get();

    $pagosdaym = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereDay('fecha', date('d'))
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 3)
        ->get();
    

    $pagosmonth = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->get();

    $pagosmonths = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 1)
        ->get();

   $pagosmonthp = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 2)
        ->get();

    $pagosmonthm = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 3)
        ->get();

    if($pagosday->sum('monto_transaccion') > 0.00){
              $pagos_totales = $pagosday->sum('monto_transaccion');
    }else{
              $pagos_totales = 1;
    }
        
    $pors = ROUND(($pagosdays->sum('monto_transaccion') * 100 / $pagos_totales),2);

    $porp = ROUND(($pagosdayp->sum('monto_transaccion') * 100 / $pagos_totales),2);

    $porm = ROUND(($pagosdaym->sum('monto_transaccion') * 100 / $pagos_totales),2);

    $pagos = Pagos::select()->get();

    $pagoss = Pagos::where('id_forma_pago', 1)->get();
    $pagosp = Pagos::where('id_forma_pago', 2)->get();
    $pagosm = Pagos::where('id_forma_pago', 3)->get();

    $solicitudes = Solicitud_retiro::select()->get();

    $solicitudes_e = Solicitudes_eliminacion::select()->get();

    $meses = Mes::select()->get(); 

    $clientes = DB::table('users')
        ->join('model_has_roles','users.id','model_has_roles.model_id')
        ->select(DB::raw('users.*'))
        ->where('model_has_roles.role_id', 1)      
        ->get();

    $mes_c = date('m');


        return view('admin.home',compact('pagos','fondos','pagosday','pagosmonth','pagosdays','pagosdayp','pagosdaym','pagosmonths', 'pagosmonthp', 'pagosmonthm','pors','porp','porm','meses', 'mes_c','pagosm','pagoss','pagosp','clientes','solicitudes','solicitudes_e'));
    }

    public function ObtenerResultado2($id_mes)
    {
        //$data = [];
    
      $data_meses = DB::table('regpagos')
        ->join('formas_pagos','regpagos.id_forma_pago','formas_pagos.id_forma_pago')
        ->select('formas_pagos.descripcion', 'formas_pagos.id_forma_pago', DB::raw('SUM(regpagos.monto_transaccion) as num') , DB::raw('COUNT(regpagos.monto_transaccion) as count'))
        ->whereMonth('fecha', $id_mes)
        ->whereYear('fecha', date('Y'))
        ->groupBy('formas_pagos.descripcion')
        ->groupBy('formas_pagos.id_forma_pago')
        ->orderBy('formas_pagos.id_forma_pago')
        ->get();

        foreach($data_meses as $row1) {
        $data['label'][] = $row1->descripcion;
        $data['data1'][] = (int)$row1->num;
        $data['data2'][] = (int)$row1->count;

      }

      $data['chart_data'] = json_encode($data);

        return $data;
    }

    public function clientes()
    {

        $clientes = DB::table('users')
        ->join('model_has_roles','users.id','model_has_roles.model_id')
        ->join('roles','roles.id','model_has_roles.role_id')
        ->join('tiendas','users.id_tienda','tiendas.id_tienda')
        ->join('status','status.id_status','users.id_status')
        ->select(DB::raw('users.*'),'tiendas.nombre_tienda',DB::raw('roles.name as rol'),'status.des_status')     
        ->get();

        return view('admin.clientes.clientes',compact('clientes'));


    }

    public function transacciones()
    {

        $pagos = Pagos::select()->get();

        return view('admin.transacciones.transacciones',compact('pagos'));


    }

    public function ver_tiendas(Tiendas $tiendas)
    {

        $tiendas = Tiendas::where('id_tienda',$tiendas->id_tienda)->first();
      //  $usuarios = User::where('id_tienda',$tiendas->id_tienda)->get();
        $bancos = UsuariosxBanco::where('id_tienda',$tiendas->id_tienda)->first();
        $pagos = Pagos::where('id_tienda',$tiendas->id_tienda)->get();
        $fondos = Fondos::where('id_tienda',$tiendas->id_tienda)->first();


        $solicitudes = Solicitud_retiro::where('id_tienda' , $tiendas->id_tienda)->get();
        
        $datos_tienda = Tiendas::where('id_tienda' , $tiendas->id_tienda)
        ->where('id_gerente', Auth::user()->id)
        ->first();

        $solicitudes_aprobadas = Solicitud_retiro::where('id_tienda' , $tiendas->id_tienda)
        ->where('id_status', 2)
        ->get();

        $solicitudes_proceso = Solicitud_retiro::where('id_tienda' , $tiendas->id_tienda)
        ->where('id_status', 0)
        ->get();

        $clientes = DB::table('users')
        ->join('model_has_roles','users.id','model_has_roles.model_id')
        ->join('roles','roles.id','model_has_roles.role_id')
        ->join('tiendas','users.id_tienda','tiendas.id_tienda')
        ->join('status','status.id_status','users.id_status')
        ->select(DB::raw('users.*'),'tiendas.nombre_tienda',DB::raw('roles.name as rol'),'status.des_status') 
        ->where('users.id_tienda', $tiendas->id_tienda)    
        ->get();

        return view('admin.tiendas.tiendas_index', ['tiendas' => $tiendas],compact('clientes','bancos','pagos','fondos','solicitudes','solicitudes_aprobadas', 'solicitudes_proceso'));


    }


    public function ver_tiendas_pagos(Tiendas $tiendas)
    {

     //   $tiendas = Tiendas::where('id_tienda',$tiendas->id_tienda)->first();
   
        $pagos = Pagos::where('id_tienda',$tiendas->id_tienda)->get();


        $pagoss = Pagos::where('id_forma_pago', 1)
        ->where('id_tienda',$tiendas->id_tienda)
        ->get();

        $pagosp = Pagos::where('id_forma_pago', 2)
        ->where('id_tienda',$tiendas->id_tienda)
        ->get();

        $pagosm = Pagos::where('id_forma_pago', 3)
        ->where('id_tienda',$tiendas->id_tienda)
        ->get();

        $pagosday = Pagos::where('id_tienda', $tiendas->id_tienda)
        ->whereDay('fecha', date('d'))
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->get();

    $pagosdays = Pagos::where('id_tienda', $tiendas->id_tienda)
        ->whereDay('fecha', date('d'))
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 1)
        ->get();

   $pagosdayp = Pagos::where('id_tienda', $tiendas->id_tienda)
        ->whereDay('fecha', date('d'))
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 2)
        ->get();

    $pagosdaym = Pagos::where('id_tienda', $tiendas->id_tienda)
        ->whereDay('fecha', date('d'))
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 3)
        ->get();
    

    $pagosmonth = Pagos::where('id_tienda', $tiendas->id_tienda)
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->get();

    $pagosmonths = Pagos::where('id_tienda', $tiendas->id_tienda)
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 1)
        ->get();

   $pagosmonthp = Pagos::where('id_tienda', $tiendas->id_tienda)
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 2)
        ->get();

    $pagosmonthm = Pagos::where('id_tienda', $tiendas->id_tienda)
        ->whereMonth('fecha', date('m'))
        ->whereYear('fecha', date('Y'))
        ->where('id_forma_pago', 3)
        ->get();

        return view('admin.tiendas.tiendas_pagos', ['tiendas' => $tiendas],compact('pagos','pagoss','pagosp','pagosm','pagosday','pagosmonth','pagosdays','pagosdayp','pagosdaym','pagosmonths', 'pagosmonthp', 'pagosmonthm',));


    }




    public function tiendas()
    {

        $tiendas = Tiendas::select()->get();

        return view('admin.tiendas.tiendas',compact('tiendas'));


    }

    public function solicitudes_retiro()
    {

        $solicitudes = Solicitud_retiro::select()->get();

        return view('admin.solicitudes.solicitudes',compact('solicitudes'));


    }

    public function solicitudes_retiro_ver(Solicitud_retiro $solicitudes)
    {

        $statuses = Status::where('id_status','<', 3)->get();
        $bancos = UsuariosxBanco::where('id_tienda',$solicitudes->id_tienda)->first();
        $tiendas = Tiendas::where('id_tienda',$solicitudes->id_tienda)->first();

        return view('admin.solicitudes.solicitudes_index', ['solicitudes' => $solicitudes],compact('statuses','tiendas','bancos'));


    }

    public function actualizar_solicitudes(Request $request, Solicitud_retiro $solicitudes)
    {

        //Esto tiene que enviar correo
        //
        
        if($request->id_status == 2){

        $fondos = Fondos::where('id_tienda',$solicitudes->id_tienda)->first();

        $total = $fondos->fondos - $solicitudes->monto;

        $Update = Fondos::where('id_tienda', $solicitudes->id_tienda)
        ->update(['fondos' => $total]);

        $user = User::where('id', $solicitudes->id_usuario)->first();

        $objDemo = new \stdClass();
        $objDemo->nombre     = $user->name_user;
        $objDemo->monto      = $solicitudes->monto; 

        Mail::to($user->email)->send(new Solicitud_estatus($objDemo));
       

        }

        $solicitudes->id_status   = $request->id_status;
        $solicitudes->saveOrFail();
   
    $status = 'success';
    $content = 'Estatus Actualizado exitosamente';

    return redirect()->route("solicitudes.retiro")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

    }

    public function solicitudes_eliminacion()
    {

        $solicitudes = Solicitudes_eliminacion::select()->get();

        return view('admin.solicitudes.solicitudes_eliminacion',compact('solicitudes'));


    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Remota  $remota
     * @return \Illuminate\Http\Response
     */
    public function inactivar_usuario(User $user)
    {

        //esto tiene que incluir el estatus de la solicitud de eliminacion
        //y debe incluir acciones en lote

        $user->id_status = 4; 
        $user->saveOrFail();

    $status = 'success';
    $content = 'Usuario Inactivado Exitosamente';

    return redirect()->route("clientes")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    }

    public function inactivar_usuario_solicitud(Solicitudes_eliminacion $solicitudes)
    {


     $solicitudes->id_status = 2; 
     $solicitudes->saveOrFail();

    $Update = User::where('id_tienda', $solicitudes->id_tienda)
        ->update(['id_status' => 4]);

    $status = 'success';
    $content = 'Solicitiud Procesada Exitosamente';

    return redirect()->route("solicitudes.eliminacion")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    }

    public function accion_lote(Request $request)
    {

        $ids = $request->ids;

        if($request->accion == 1){
          $status = 3; 
        }else{
          $status = 4;  
        }
        

       // $sql = DB::table("Alumnos")->whereIn('id',explode(",",$ids))->delete(); 
        
        $Update = User::whereIn('id',explode(",",$ids))
        ->update(['id_status' => $status,
         ]);

        return response()->json(['success'=>'SI']); 

        


    }



}
