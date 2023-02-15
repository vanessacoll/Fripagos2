<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bancos extends Model
{
    use HasFactory;

    protected $table = 'bancos';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_banco',
        'descripcion',
        
    ];

    protected $primaryKey = 'id_banco';

     public function usuarioxbanco()
    {
       return $this->hasMany('App\Models\UsuariosxBanco', 'id_banco', 'id_banco');
    }
}
