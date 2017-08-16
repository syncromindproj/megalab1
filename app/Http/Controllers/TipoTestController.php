<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoTest;
use App\Http\Requests\TipoTestRequest;

class TipoTestController extends Controller
{
    public function index(){
    	$tipotests = TipoTest::all();
    	return view('tipotest.index', compact('tipotests'));
    }

    /*public function listartipotests()
    {
        $tipotests = TipoTest::all();
        return view('tipotest.index', compact('tipotests'));
    }*/

    public function listartipotests()
    {
        $tipotests = TipoTest::all();
                    
        return response()->json([
            'body' => view('tipotest.index', compact('tipotests'))->render(),
            'tipotests' => $tipotests,
        ]);
    }

    public function create()
    {
        return view('tipotest.create');
    }

    public function store(TipoTestRequest $request)
    {
        TipoTest::create($request->all());
        return redirect()->route('tipotest.index')->with('message', 'Registro guardado satisfactoriamente');
    }
}
