<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_tiendas extends Model
{
    use HasFactory;

    protected $table = 'tipo_tiendas';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_tipo_tienda',
        'descripcion',
        
    ];

    protected $primaryKey = 'id_tipo_tienda';

    public function tienda()
    {
       return $this->hasMany('App\Models\Tiendas', 'id_tipo_tienda', 'id_tipo_tienda');
    }
}
