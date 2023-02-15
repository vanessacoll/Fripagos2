<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;

    protected $table = 'regpagos';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_pagos',
        'id_forma_pago',
        'monto_transaccion',
        'fecha',
        'id_caja',
        'id_usuario',
        'id_tienda',
        'descripcion',
        'nom_cliente',
        'id_apertura',
        
    ];

    protected $primaryKey = 'id_pagos';

    public function caja()
    {
        return $this->belongsTo('App\Models\Cajas', 'id_caja', 'id_caja');
    }

    public function tienda()
    {
        return $this->belongsTo('App\Models\Tiendas', 'id_tienda', 'id_tienda');
    }

    public function forma()
    {
        return $this->belongsTo('App\Models\Formas_pagos', 'id_forma_pago', 'id_forma_pago');
    }

    public function user()
    {
       return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }
}
