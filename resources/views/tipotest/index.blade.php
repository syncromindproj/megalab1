@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        	@if(Session::has("message"))
				<div class="alert alert-success">{{ Session::get('message') }}</div>
        	@endif

            <div class="panel panel-default">
                <div class="panel-heading">Tipo de Test</div>

                <div class="panel-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                    		@foreach($tipotests as $tipotest)
                    			<tr>
									<td>{{ $tipotest->descripcion }}</td>
									<td>
										{!! Form::open(array('route'=>['tipotest.destroy', $tipotest->id], 'method'=>'DELETE')) !!}
											{{ link_to_route('tipotest.edit', 'Editar', [$tipotest->id], ['class'=>'btn btn-primary']) }}
											|
											{!! Form::button('Eliminar',['class'=>'btn btn-danger', 'type'=>'submit']) !!}
										{!! Form::close() !!}
									</td>
								</tr>
                    		@endforeach

                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
			{{ link_to_route('tipotest.create', 'Agregar tipo', null, ['class'=>'btn btn-success']) }}
            
        </div>
    </div>
</div>

<script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


@endsection
