<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apecajas extends Model
{
    use HasFactory;

    protected $table = 'apecaja';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_apertura',
        'id_caja',
        'fecha',
        'clave',
        'id_usuario',
        'cierre'
    ];

    protected $primaryKey = 'id_apertura';


    public function cierre()
    {
       return $this->hasMany('App\Models\Ciecajas', 'id_apertura', 'id_apertura');
    }
}
