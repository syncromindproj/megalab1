<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTest extends Model
{
    protected $table = 'tipotest';
    protected $primarykey = 'id';

    protected $fillable = ['id', 'descripcion'];

}
