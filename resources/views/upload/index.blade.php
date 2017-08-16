@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        	@if(Session::has("message"))
				<div class="alert alert-success">{{ Session::get('message') }}</div>
        	@endif
            <div class="panel panel-default">
                <div class="panel-heading">Subida de archivos</div>

                <div class="panel-body">
                    
                    <form action="ImportarAnalisis" method="post" enctype="multipart/form-data">
                        <label>Subir archivo:</label>
                        
                        <label class="btn btn-default btn-file">
                            Seleccionar archivo <input type="file" name="archivo" style="display: none;">
                        </label>

                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <input type="submit" value="Subir archivo" class="btn btn-primary">
                    </form>

                    
                </div>
            </div>
			<!--{{ link_to_route('analisis.create', 'Agregar tipo', null, ['class'=>'btn btn-success']) }} -->
            <input type="button" id="btn-generar" class="btn btn-success" value="Procesar datos" />
            
        </div>
    </div>
</div>


@endsection
