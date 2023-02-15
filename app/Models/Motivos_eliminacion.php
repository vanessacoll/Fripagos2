<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivos_eliminacion extends Model
{
    use HasFactory;

    protected $table = 'motivos_eliminacion';

    public $timestamps = false;

    protected $fillable = [
        'id_motivo',
        'motivo_eliminacion',
       ];

    protected $primaryKey = 'id_motivo';
}
