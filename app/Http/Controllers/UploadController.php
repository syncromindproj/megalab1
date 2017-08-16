<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\Input;
use App\TipoTestAnalisis;
use App\TipoTest;
use App\Analisis;
use DB;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload.index');
    }


    public function upload(){
        return view('analisis.upload');
    }

    public function ImportarAnalisis(){
        DB::statement('DELETE from tipotest_analisis;');
        DB::statement('DELETE from tipotest;');
        //DB::statement('DELETE from analisis where parentid is not null;');
        DB::statement('UPDATE analisis SET parentid = NULL WHERE parentid IS NOT NULL;');
        DB::statement('DELETE from analisis where parentid is not null;');
        DB::statement('DELETE from analisis;');

        $file = Input::file('archivo');
        $file_name = $file->getClientOriginalName();
        $file->move('files', $file_name);
        
        $ruta = 'files/'.$file_name;
        Excel::selectSheetsByIndex(0)->load($ruta, function($hoja){
            $hoja->each(function($fila){
                $tipotest = new TipoTest;
                $tipotest->id = $fila->id;
                $tipotest->descripcion = $fila->descripcion;
                $tipotest->save();
            });
        });

        Excel::selectSheetsByIndex(1)->load($ruta, function($hoja){
            $hoja->each(function($fila){
                $analisis = new Analisis;
                $analisis->id = $fila->id;
                $analisis->parentid = $fila->parentid;
                $analisis->descripcion = $fila->descripcion;
                $analisis->precio = $fila->precio;
                $analisis->save();
            });
        });

        Excel::selectSheetsByIndex(2)->load($ruta, function($hoja){
            $hoja->each(function($fila){
                $tipotestanalisis = new TipoTestAnalisis;
                $tipotestanalisis->id = $fila->id;
                $tipotestanalisis->idtipotest = $fila->idtipotest;
                $tipotestanalisis->idanalisis = $fila->idanalisis;
                $tipotestanalisis->save();
            });
        });

        return redirect()->route('upload.index')->with('message', 'Datos actualizados satisfactoriamente');
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
