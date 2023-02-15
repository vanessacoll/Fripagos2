<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_retiro extends Model
{
    use HasFactory;

    protected $table = 'tipo_retiro';

    public $timestamps = false;

    protected $fillable = [
        'id_tipo_retiro',
        'descripcion',
       ];

    protected $primaryKey = 'id_tipo_retiro';
}
