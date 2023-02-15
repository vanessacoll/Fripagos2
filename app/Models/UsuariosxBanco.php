<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosxBanco extends Model
{
    use HasFactory;

    protected $table = 'usuarioxcuentabanco';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_cuenta',
        'id_banco',
        'id_usuario',
        'cedula_usuario',
        'nombre_usuario',
        'telefono_usuario',
        'cuenta_bancaria', 
        'id_tienda' 
    ];

    protected $primaryKey = 'id_cuenta';

     public function banco()
    {
        return $this->belongsTo('App\Models\Bancos', 'id_banco', 'id_banco');
    }

}
