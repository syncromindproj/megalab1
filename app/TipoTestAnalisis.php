<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTestAnalisis extends Model
{
    protected $table = 'tipotest_analisis';
    protected $primarykey = 'id';

    protected $fillable = ['id', 'idtipotest', 'idanalisis'];
}
