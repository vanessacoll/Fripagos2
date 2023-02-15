<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiendas extends Model
{
    use HasFactory;

    protected $table = 'tiendas';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_tienda',
        'nombre_tienda',
        'id_tipo_tienda',
        'telefono',
        'direccion',
        'rif',
        'id_gerente',
    ];

    protected $primaryKey = 'id_tienda';

    public function tipo_tienda()
    {
        return $this->belongsTo('App\Models\Tipo_tiendas', 'id_tipo_tienda', 'id_tipo_tienda');
    }

    public function pagos()
    {
       return $this->hasMany('App\Models\Pagos', 'id_tienda', 'id_tienda');
    }

    public function user()
    {
       return $this->belongsTo('App\Models\User', 'id_gerente', 'id');
    }
}
