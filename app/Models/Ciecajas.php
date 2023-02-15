<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciecajas extends Model
{
    use HasFactory;

    protected $table = 'ciecaja';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_cierre',
        'monto_total',
        'id_usuario',
        'fecha',
        'id_caja',
        'id_apertura',
        'total_transacciones',
    ];

    protected $primaryKey = 'id_cierre';


    public function apertura()
    {
       return $this->hasMany('App\Models\Apecajas', 'id_apertura', 'id_apertura');
    }
}
