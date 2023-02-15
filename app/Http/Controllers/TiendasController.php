<?php

namespace App\Http\Controllers;

use App\Models\Tiendas;
use App\Models\Tipo_tiendas;
use App\Models\Bancos;
use App\Models\User;
use App\Models\UsuariosxBanco;
use App\Models\Fondos;
use App\Models\Pagos;
use App\Models\Formas_pagos;
use App\Models\Motivos_eliminacion;
use App\Models\Solicitudes_eliminacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\NuevaSolicitudEliminacion;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class TiendasController extends Controller
{

    protected function validator(array $tiendas)
    {
        return Validator::make($tiendas, [

  'nombre_tienda'  => ['required', 'string', 'max:200',],
  'telefono'       => ['required', 'string', 'max:20', ],
  'direccion'      => ['required', 'string', 'max:200',],
  'rif'            => ['required', 'string', 'max:20', ],
  'id_tipo_tienda' => ['required'],
 
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $tiendas = Tiendas::where('id_gerente', Auth::user()->id)->first();

     $tienda_register = true;

     if($tiendas){

         $tienda_register = false;
     }

     $usuariosxbanco = UsuariosxBanco::where('id_usuario', Auth::user()->id)->first();

     $cuenta_register = true;

     if($usuariosxbanco){

         $cuenta_register = false;
     }

     $fondos = Fondos::where('id_tienda' , Auth::user()->id_tienda)->first();

     $pagos = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->get();

     $pagosmonth = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereMonth('fecha', date('m'))
        ->get();

     $pagosday = Pagos::where('id_tienda', Auth::user()->id_tienda)
        ->whereDay('fecha', date('d'))
        ->get();

    $user = Auth::user()->id;

    $motivos = Motivos_eliminacion::select()->get();

         return view('tiendas.tiendas',compact('tienda_register','tiendas','usuariosxbanco','cuenta_register','fondos', 'pagosmonth', 'pagosday', 'pagos','user','motivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tip_tiendas = Tipo_tiendas::select()->get();
        return view('tiendas.tiendas_create',compact('tip_tiendas'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $tiendas = new Tiendas($request->input());
        $tiendas->nombre_tienda = $request->nombre_tienda;
        $tiendas->telefono = $request->telefono;
        $tiendas->direccion = $request->direccion;
        $tiendas->rif = $request->rif;
        $tiendas->id_tipo_tienda = $request->id_tipo_tienda;
        $tiendas->id_gerente = Auth::user()->id;
        $tiendas->saveOrFail();

        //regitrar tambien  el id tienda
        //
        $tiendas = Tiendas::where('id_gerente', Auth::user()->id)->first();

        $Update = User::where('id', Auth::user()->id)
        ->update(['name_user' => $request->name_user,
                  'ape_user'  => $request->ape_user,
                  'id_tienda' => $tiendas->id_tienda,
         ]);
    
    $status = 'success';
    $content = 'Tienda Registrada Exitosamente';

    return redirect()->route("tiendas")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cuentas_create()
    {
        $bancos = Bancos::select()->get();
        return view('tiendas.cuentas_create',compact('bancos'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cuentas_register(Request $request)
    {
        //$this->validator($request->all())->validate();

        $cuentas = new UsuariosxBanco($request->input());
        $cuentas->id_banco = $request->id_banco;
        $cuentas->cuenta_bancaria = $request->cuenta;
        $cuentas->telefono_usuario = $request->telefono;
        $cuentas->cedula_usuario = $request->cedula;
        $cuentas->nombre_usuario = Auth::user()->name_user." ".Auth::user()->ape_user;
        $cuentas->id_usuario = Auth::user()->id;
        $cuentas->id_tienda = Auth::user()->id_tienda;
        $cuentas->saveOrFail();
    
    $status = 'success';
    $content = 'Cuenta Registrada Exitosamente';

    return redirect()->route("tiendas")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
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
     * @param  \App\Models\Tiendas  $tiendas
     * @return \Illuminate\Http\Response
     */
    public function show(Tiendas $tiendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiendas  $tiendas
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiendas $tiendas)
    {
        $tip_tiendas = Tipo_tiendas::select()->get(); 
        return view("tiendas.tiendas_edit", ['tiendas' => $tiendas],compact('tip_tiendas'));
    }


    public function cuentasedit(UsuariosxBanco $cuentas)
    {
        
        $bancos = Bancos::select()->get();
        return view('tiendas.cuentas_edit', ['cuentas' => $cuentas],compact('bancos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiendas  $tiendas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiendas $tiendas)
    {
        $this->validator($request->all())->validate();

        //$tiendas = new Tiendas($request->input());
        $tiendas->nombre_tienda = $request->nombre_tienda;
        $tiendas->telefono = $request->telefono;
        $tiendas->direccion = $request->direccion;
        $tiendas->rif = $request->rif;
        $tiendas->id_tipo_tienda = $request->id_tipo_tienda;
        $tiendas->id_gerente = Auth::user()->id;
        $tiendas->saveOrFail();

        //regitrar tambien  el id tienda
        //
        $tiendas_1 = Tiendas::where('id_gerente', Auth::user()->id)->first();

        $Update = User::where('id', Auth::user()->id)
        ->update(['name_user' => $request->name_user,
                  'ape_user'  => $request->ape_user,
                  'id_tienda' => $tiendas_1->id_tienda,
         ]);
    
    $status = 'success';
    $content = 'Datos Editados Exitosamente';

    return redirect()->route("tiendas")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    }


    public function cuentasupdate(Request $request, UsuariosxBanco $cuentas)
    {
        //$this->validator($request->all())->validate();

      // $cuentas = new UsuariosxBanco($request->input());
        $cuentas->id_banco = $request->id_banco;
        $cuentas->cuenta_bancaria = $request->cuenta;
        $cuentas->telefono_usuario = $request->telefono;
        $cuentas->cedula_usuario = $request->cedula;
        $cuentas->nombre_usuario = Auth::user()->name_user." ".Auth::user()->ape_user;
       // $cuentas->id_usuario = Auth::user()->id;
        $cuentas->saveOrFail();
    
    $status = 'success';
    $content = 'Datos de Cuentas Editados Exitosamente';

    return redirect()->route("tiendas")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiendas  $tiendas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiendas $tiendas)
    {
        //
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function solicitud(Request $request)
    {
    
    $solicitudes = Solicitudes_eliminacion::where('id_usuario' , Auth::user()->id)->first();

      if(!$solicitudes){

        $data  = User::find(Auth::user()->id);

        Mail::to('rmendoza9@gmail.com')->send(new NuevaSolicitudEliminacion($data));

    
       $date = Carbon::now()->locale('es'); 

       $solicitud = new Solicitudes_eliminacion($request->input());
       $solicitud->id_usuario = Auth::user()->id;
       $solicitud->id_motivo = $request->id_motivo;
       $solicitud->fecha = $date;
       $solicitud->id_tienda = Auth::user()->id_tienda;
       $solicitud->saveOrFail();
       
         $status = 'success';
         $content = 'Solicitud Enviada Exitosamente';

         return redirect()->route("tiendas")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
        
     }else{

         $status = 'error';
         $content = 'Actualmente ya existe una solicitud de Eliminacion en Proceso';

         return redirect()->route("tiendas")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
     }
    }
}
