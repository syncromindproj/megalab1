<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoTest;

class TipoTest extends Controller
{
    public function index(){
    	$tipotests = TipoTest::all();
    	return view('tipotests.index');
    }
}
