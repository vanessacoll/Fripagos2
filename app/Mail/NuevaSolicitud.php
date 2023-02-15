<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevaSolicitud extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->from('soporte@phonett.com', 'Sistema Automatizado de Envio de Notificaciones de Fripagos')->subject('Nueva solicitud de Retiro de Fondos')->view('email.nueva-solicitud', ['usuario' => $this->user]);
       return $this->markdown('email.nueva-solicitud')->subject('Solicitud de Retiro de Fondos Fripagos');
       
       //return $this->view('email.nueva-solicitud');
    }
}
