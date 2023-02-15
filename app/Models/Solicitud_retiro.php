<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud_retiro extends Model
{
    use HasFactory;

    protected $table = 'solicitud_retiro';

    public $timestamps = false;

    protected $fillable = [
        'id_solicitud',
        'id_usuario',
        'monto',
        'fecha',
        'id_status',
        'id_tienda',
        'id_lugar_retiro',
        'fecha_retiro',
        'hora_retiro',
        'id_tipo_retiro',
        'id_tipo_cuenta_externa',
        'nombres_cuenta_externa',
        'correo_cuenta_externa',
       ];

    protected $primaryKey = 'id_solicitud';

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'id_status', 'id_status');
    }

    public function user()
    {
       return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }

    public function tienda()
    {
       return $this->belongsTo('App\Models\Tiendas', 'id_tienda', 'id_tienda');
    }

    public function lugar_retiro()
    {
       return $this->belongsTo('App\Models\Lugar_retiro', 'id_lugar_retiro', 'id_lugar_retiro');
    }

    public function tipo_retiro()
    {
       return $this->belongsTo('App\Models\Tipo_retiro', 'id_tipo_retiro', 'id_tipo_retiro');
    }

    public function tipo_cuenta()
    {
       return $this->belongsTo('App\Models\Tipo_cuenta_externa', 'id_tipo_cuenta_externa', 'id_tipo_cuenta_externa');
    }
}
