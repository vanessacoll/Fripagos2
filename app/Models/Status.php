<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status';

    public $timestamps = false;

    protected $fillable = [
        'id_status',
        'des_status',
       ];

    protected $primaryKey = 'id_status';

    public function solicitud()
    {
       return $this->hasMany('App\Models\Solicitud_retiro', 'id_status', 'id_status');
    }

    public function cajas()
    {
       return $this->hasMany('App\Models\Cajas', 'id_status', 'id_status');
    }
}
