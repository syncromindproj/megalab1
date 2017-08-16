<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    protected $table = 'analisis';
    protected $primarykey = 'id';

    protected $fillable = ['id', 'parentid', 'descripcion', 'precio'];
}
