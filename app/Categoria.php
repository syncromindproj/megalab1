<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    protected $primarykey = 'id';

    protected $fillable = ['id', 'descripcion'];
}
