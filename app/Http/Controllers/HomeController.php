<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fondos;
use App\Models\Pagos;
use App\Models\Mes;
use App\Models\Formas_pagos;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tipo_tiendas;
use App\Models\Tiendas;
use App\Models\Bancos;
use App\Models\UsuariosxBanco;
use App\Models\Cajas;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Model_has_roles;


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

    if($pagosmonth->sum('monto_transaccion') > 0.00){
              $pagos_totales = $pagosmonth->sum('monto_transaccion');
    }else{
              $pagos_totales = 1;
    }
        
    $pors = ROUND(($pagosmonths->sum('monto_transaccion') * 100 / $pagos_totales),2);

    $porp = ROUND(($pagosmonthp->sum('monto_transaccion') * 100 / $pagos_totales),2);

    $porm = ROUND(($pagosmonthm->sum('monto_transaccion') * 100 / $pagos_totales),2);

    $pagos = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->get();

    $meses = Mes::select()->get(); 

    $mes_c = date('m');


    $first_time_login = false;

    if (!Auth::user()->first_login) {
   
    $first_time_login = true;
    
    //Auth::user()->first_time_login = 1; // Flip the flag to true
    //Auth::user()->save(); 
    }

    //DATOS MODAL INICIAL

    $tip_tiendas = Tipo_tiendas::select()->get();
    $bancos = Bancos::select()->get();


        return view('home',compact('pagos','fondos','pagosday','pagosmonth','pagosdays','pagosdayp','pagosdaym','pagosmonths', 'pagosmonthp', 'pagosmonthm','pors','porp','porm','meses', 'mes_c','first_time_login','tip_tiendas','bancos'));
    }

    public function ObtenerResultado($id_mes)
    {
        //$data = [];
        
        $data_meses = DB::table('regpagos')
        ->join('formas_pagos','regpagos.id_forma_pago','formas_pagos.id_forma_pago')
        ->select('formas_pagos.descripcion', 'formas_pagos.id_forma_pago', DB::raw('SUM(regpagos.monto_transaccion) as num') , DB::raw('COUNT(regpagos.monto_transaccion) as count'))
        ->where('id_tienda', Auth::user()->id_tienda)
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


     public function datos(Request $request)
    {


        $tiendas = new Tiendas($request->input());
        $tiendas->nombre_tienda = $request->nombre_tienda;
        $tiendas->telefono = $request->telefono;
        $tiendas->direccion = $request->direccion;
        $tiendas->rif = $request->rif;
        $tiendas->id_tipo_tienda = $request->id_tipo_tienda;
        $tiendas->id_gerente = Auth::user()->id;
        $tiendas->saveOrFail();

        $tiendas2 = Tiendas::where('id_gerente', Auth::user()->id)->first();

        $Update = User::where('id', Auth::user()->id)
        ->update(['name_user' => $request->name_user,
                  'ape_user'  => $request->ape_user,
                  'id_tienda' => $tiendas2->id_tienda,
                  'first_login' => true,
         ]);

        $cuentas = new UsuariosxBanco($request->input());
        $cuentas->id_banco = $request->id_banco;
        $cuentas->cuenta_bancaria = $request->cuenta;
        $cuentas->telefono_usuario = $request->telefono;
        $cuentas->cedula_usuario = $request->cedula;
        $cuentas->id_usuario = Auth::user()->id;
        $cuentas->saveOrFail();
        
        $cajas = new Cajas($request->input());
        $cajas->descripcion = $request->descripcion;
        $cajas->id_tienda = $tiendas2->id_tienda;
        $cajas->id_status = 3; 
        $cajas->saveOrFail();



        $status = 'error';
        $content = 'SI';

    return redirect()->route("home")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);


       // return response()->json(['success'=>'SI']);

        
    }

}
