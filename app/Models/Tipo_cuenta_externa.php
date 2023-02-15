<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_cuenta_externa extends Model
{
    use HasFactory;

    protected $table = 'tipo_cuenta_externa';

    public $timestamps = false;

    protected $fillable = [
        'id_tipo_cuenta_externa',
        'descripcion',
       ];

    protected $primaryKey = 'id_tipo_cuenta_externa';
}
