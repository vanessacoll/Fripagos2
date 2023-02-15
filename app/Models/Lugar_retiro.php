<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar_retiro extends Model
{
    use HasFactory;

    protected $table = 'lugar_retiro';

    public $timestamps = false;

    protected $fillable = [
        'id_lugar_retiro',
        'descripcion',
       ];

    protected $primaryKey = 'id_lugar_retiro';
}
