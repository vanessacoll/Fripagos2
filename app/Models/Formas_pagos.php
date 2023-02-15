<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formas_pagos extends Model
{
    use HasFactory;

    protected $table = 'formas_pagos';

    public $timestamps = false;

    protected $fillable = [
        'id_forma_pago',
        'descripcion',
       ];

    protected $primaryKey = 'id_formas_pago';

    public function pagos()
    {
       return $this->hasMany('App\Models\Pagos', 'id_forma_pago', 'id_forma_pago');
    }
}
