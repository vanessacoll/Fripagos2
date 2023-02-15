<?php

namespace App\Http\Controllers;

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
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contacto;


class OtrosController extends Controller
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


    public function contacto()
    {
        return view('otros.contacto');

    }

    public function contacto_nuevo(Request $request)
    {

    	$objDemo = new \stdClass($request->input());
        $objDemo->name    = $request->nombre;
        $objDemo->email   = $request->email;
        $objDemo->subject = $request->motivo;
        $objDemo->message = $request->message;


        Mail::to('rmendoza9@gmail.com')->send(new Contacto($objDemo));

        $date = Carbon::now()->locale('es'); 
       
        $mail = new Contact($request->input());
        $mail->name    = $request->nombre;
        $mail->email   = $request->email;
        $mail->subject = $request->motivo;
        $mail->message = $request->message;
        $mail->fecha   = $date;
        $mail->saveOrFail();


    
    $status = 'success';
    $content = 'Mensaje Enviado Exitosamente';

    return redirect()->route("contacto")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);

    }

     public function fqa()
    {
        return view('otros.fqa');

    }
}
