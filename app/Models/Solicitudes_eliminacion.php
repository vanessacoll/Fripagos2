<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes_eliminacion extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_eliminacion';

    public $timestamps = false;

    protected $fillable = [
        'id_solicitud',
        'id_usuario',
        'fecha',
        'id_motivo',
        'id_tienda',
        'id_status',
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

    public function motivo()
    {
        return $this->belongsTo('App\Models\Motivos_eliminacion', 'id_motivo', 'id_motivo');
    }
}
