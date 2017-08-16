<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Analisis;
use App\TipoTestAnalisis;
use DB;
//use App\Http\Requests\CategoriaRequest;

class AnalisisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analisis = Analisis::all();
                    
        return view('analisis.index', compact('analisis'));
    }

    public function listaranalisis()
    {
        $analisis = Analisis::all();
                    
        //return view('analisis.index', compact('analisis'));
        return response()->json([
            'body' => view('analisis.index', compact('analisis'))->render(),
            'analisis' => $analisis,
        ]);
    }

    public function getanalisis($id)
    {
        $analisis2 = TipoTestAnalisis::select('idanalisis')
                    ->where('idtipotest', '=', $id)->get();
        
        //return view('analisis.index', compact('analisis'));
        return response()->json([
            'analisis' => $analisis2,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
