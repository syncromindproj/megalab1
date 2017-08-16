@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Categoria</div>

                <div class="panel-body">
                    
                    {!! Form::open(array('route'=>'categoria.store')) !!}
                        <div class="form-group">
                            {!! Form::label('descripcion', 'Ingrese la descripcion') !!}
                            {!! Form::text('descripcion', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::button('Crear', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>
            @if($errors->has('descripcion'))
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            
        </div>
    </div>
</div>

<script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


@endsection
