<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cajas extends Model
{
    use HasFactory;

    protected $table = 'cajas';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_caja',
        'id_tienda',
        'descripcion',
        'id_status',
        
    ];

    protected $primaryKey = 'id_caja';

    public function pagos()
    {
       return $this->hasMany('App\Models\Pagos', 'id_caja', 'id_caja');
    }

    public function status()
    {
    return $this->belongsTo('App\Models\Status', 'id_status', 'id_status');
    }
}
