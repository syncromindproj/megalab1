@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-12">

        	@if(Session::has("message"))
				<div class="alert alert-success">{{ Session::get('message') }}</div>
        	@endif
            <div class="panel panel-default">
                <div class="panel-heading">Datos del paciente</div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre y apellidos</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="inputEmail3">
                            </div>
                            <div class="col-sm-3">
                                Sexo:<br>
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                Mujer
                              </label>
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                Hombre
                              </label>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Fecha de nacimiento</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Fecha de análisis</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Nombre del médico</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Tipo de Examen</div>
                <div class="panel-body">
                    <div id="tipotest"></div>
                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Analisis</div>

                <div class="panel-body">
                    <div id="opciones"></div>


                    <!--table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                    		@foreach($analisis as $analis)
                    			<tr>
									<td>{{ $analis->descripcion }}</td>
									<td>
										{!! Form::open(array('route'=>['analisis.destroy', $analis->id], 'method'=>'DELETE')) !!}
											{{ link_to_route('analisis.edit', 'Editar', [$analis->id], ['class'=>'btn btn-primary']) }}
											|
											{!! Form::button('Eliminar',['class'=>'btn btn-danger', 'type'=>'submit']) !!}
										{!! Form::close() !!}
									</td>
								</tr>
                    		@endforeach

                            
                        </tbody>
                    </table-->
                    
                </div>
            </div>
			<!--{{ link_to_route('analisis.create', 'Agregar tipo', null, ['class'=>'btn btn-success']) }} -->
            <input type="button" id="btn-generar" class="btn btn-success" value="Generar Reporte" />
            
        </div>
    </div>
</div>

<script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script>

    function get_analisis(id){
        //alert(id);
        //$("input:checkbox").prop('checked', false);  
        $.ajax({
            type: 'GET', 
            url: "getlista/" + id,
            dataType: 'json',
            success: function(result){
                //console.log(result);
                data = result['analisis'];
                for (i = 0; i < data.length; i++) {
                    var item = data[i];
                    var idanalisis = item["idanalisis"];
                    
                    $("#checkbox_" + idanalisis).prop('checked', true);
                    //alert(idanalisis);
                    //items[id] = { id: id, descripcion: descripcion, item: item };
                    //source[id] = items[id];
                
                }
            }
        });

    }

    var buildUL = function (parent, items, precio) {
        $.each(items, function () {
            if (this.descripcion) {
                // create LI element and append it to the parent element.
                var html = "";

                if(this.parentid == null && precio == false){
                    html = "<li><input onclick='get_analisis("+ this.id +");' id='checkbox_tipo_"+ this.id +"' type='checkbox' value='"+ this.id +"' />";
                    html += "<label for='checkbox_tipo_"+ this.id +"'>"+ this.descripcion +"</label></li>";
                }

                if(this.parentid == null && precio == true){
                    html = "<li>"+ this.descripcion +"</li>";
                }

                if(this.parentid != null && precio == true){
                    if(precio){
                        html = "<li><input id='checkbox_"+ this.id +"' type='checkbox' value='"+ this.precio +"' />";
                    }else{
                        html = "<li><input id='checkbox_"+ this.id +"' type='checkbox' value='"+ this.id +"' />";
                    }
                    html += "<label for='checkbox_"+ this.id +"'>"+ this.descripcion +"</label></li>";
                }
                
                var li = $(html);

                li.appendTo(parent);
                // if there are sub items, call the buildUL function.
                if (this.items && this.items.length > 0) {
                    var ul = $("<ul></ul>");
                    ul.appendTo(li);
                    if(precio){
                        buildUL(ul, this.items, true);
                    }else{
                        buildUL(ul, this.items, false);
                    }
                }

            }
        });
    }

    $(document).ready(function() {
        $("#btn-generar").click(function(){
            var total = 0;
            $("input:checkbox:checked").each(function() {
                total += eval($(this).val());
            });
            alert(total);
        });


        $.ajax({
            type: 'GET',
            url: "{{ route('listadoanalisis') }}",
            dataType: 'json',
            success: function(result){
                var source = [];
                var items = [];

                data = result['analisis'];
                for (i = 0; i < data.length; i++) {
                    var item = data[i];
                    var descripcion = item["descripcion"];
                    var precio = item["precio"];
                    var parentid = item["parentid"];
                    var id = item["id"];

                    if (items[parentid]) {
                        var item = { id: id, parentid: parentid, descripcion: descripcion, precio: precio, item: item };
                        if (!items[parentid].items) {
                            items[parentid].items = [];
                        }
                        items[parentid].items[items[parentid].items.length] = item;
                        items[id] = item;
                    }
                    else {
                        items[id] = { id: id, parentid: parentid, descripcion: descripcion, precio: precio, item: item };
                        source[id] = items[id];
                    }
                }
                //console.log(source);
                datos = source;
                var ul = $("<ul></ul>");
                ul.appendTo("#opciones");
                buildUL(ul, datos, true);

            }
        });
        //console.log(datos);

        $.ajax({
            type: 'GET',
            url: "{{ route('listadotipotest') }}",
            dataType: 'json',
            success: function(result){
                var source = [];
                var items = [];

                data = result['tipotests'];
                for (i = 0; i < data.length; i++) {
                    var item = data[i];
                    var descripcion = item["descripcion"];
                    var id = item["id"];

                    items[id] = { id: id, descripcion: descripcion, item: item };
                    source[id] = items[id];
                
                }
                //console.log(source);
                datos = source;
                var ul = $("<ul></ul>");
                ul.appendTo("#tipotest");
                buildUL(ul, datos, false);

            }
        });
       
    });

</script>

@endsection
