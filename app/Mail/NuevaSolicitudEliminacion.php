<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevaSolicitudEliminacion extends Mailable
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
         //return $this->from('soporte@phonett.com', 'Sistema Automatizado de Envio de Notificaciones de Fripagos')->subject('Nueva solicitud de Eliminacion de Cuenta')->view('email.nueva_solicitud_eliminacion', ['user' => $this->user]);

         return $this->markdown('email.nueva_solicitud_eliminacion')->subject('Solicitud de Eliminacion de Cuenta Fripagos');
    }
}
