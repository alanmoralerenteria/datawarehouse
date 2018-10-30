@extends('plantilla')

@section('body')
<style type="text/css">
	.input-group-addon {
    min-width:100px;
    text-align:right;
}
.form-aux {
    min-width:400px;
}
</style>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
            <h1 class="page-header">Sistema 0.1</h1> 
        </div>

		
		<div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
							<div class="tooltip-demo">
                            Consultas SQL y NoSQL

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        	<div id="errores">
                                @isset($errores)
                        		{{$errores}}
                                <?php 
                                    print_r($data);
                                ?>
                                @endisset
                        	</div>
                        	
                        	<form action="{{asset('/home')}}" method="post" role="form">
                        		{{ csrf_field() }}
                            <table width="100%" class="table  table-bordered" style="background-color: white" id="clausulas">

                                <thead>
                                    <tr>

                                        <th>Clausula</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>

                                	<tr>
                                		<td>Muestra de las tablas:</td>
                                		<td><input type="text" name="tablas" placeholder="Ej:libros..." class="form-control"> </td>
                                	</tr>
                                	<tr>
                                		<td>Los campos:</td>
                                		<td><input type="text" name="campos" placeholder="Ej: titulo,autor,genero ..." class="form-control"> </td>
                                	</tr>

                                </tbody>
                            </table>

                            <input type="hidden" name="contador" id="contador">
                            
                            <div class="col-lg-6">
	                			<button class="btn btn-success btn-block" type="submit">
	                				Realizar Consulta
	                			</button>
                            </div>
                            
                            </form>
                                	
                            <div class="col-lg-6">
	                			<button class="btn btn-info btn-block" id="btn-add-clausula">	
	                				Añadir Clausula
	                			</button>
                            </div>
                        </div>
                        <!-- /.panel-body -->

                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->

@endsection


@section('scripts')

<script src="{{asset('/sb-admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>

<script>

$(document).ready(function(){
	$('#btn-add-clausula').click(function(){
		agregarClausula();
	});
});

var cont=0;

function agregarClausula(){
	
	cont++;
	document.getElementById("contador").value = cont;
	var fila='<tr id=fila'+cont+'>'
		+'<td>' 
			+'<select class="form-control" id="select'+cont+'" onClick="obtieneOpciones();">'
  				+'<option ></option>'
  				+'<option >Donde</option>'
  				+'<option >Agrupados por</option>'
  				+'<option >Ordenados por</option>'
			+'</select>'
		+'</td>'
		+'<td id="campo'+cont+'">'
			
		+'</td>'
	+'</tr>';
	$('#clausulas').append(fila);
}

function obtieneOpciones(){

	var sel = document.getElementById('select'+cont);
	var opt = sel.options[sel.selectedIndex];
	var opt = getSelectedOption(sel);
	
	switch(opt.text){
		case "Donde":
			document.getElementById('campo'+cont).innerHTML = '<br><input type text name="campo'+cont+'-val1" class="form-control" placeholder="EJ: alumnos.promedio, cursos.area ..."></input>'
			+'<select name="campo'+cont+'-val2" class="form-control">'
  				+'<option>Igual</option>'
  				+'<option>Menor qué</option>'
  				+'<option>Mayor qué</option>'
  				+'<option>Diferente de</option>'
			+'</select>'
			+'<input type text name="campo'+cont+'-val3" class="form-control">'
            +'<input type hidden name="select'+cont+'" value="Donde">'
			;
		break;
		case "Ordenados por":
			document.getElementById('campo'+cont).innerHTML = '<br><input type text name="campo'+cont+'-val1" class="form-control" placeholder="EJ: alumnos.promedio, cursos.area ..."></input>'
            +'<input type hidden name="select'+cont+'" value="Ordenados por">'
            ;
		break;
		case "Agrupados por":
			document.getElementById('campo'+cont).innerHTML = '<br><input type text name="campo'+cont+'-val1" class="form-control" placeholder="EJ: alumnos.promedio, cursos.area ..."></input>'
            +'<input type hidden name="select'+cont+'" value="Agrupados por">'
            ;
		break;

		default :
			document.getElementById('campo'+cont).innerHTML = "Opcion Invalida";
		break;
	}
	
};

function getSelectedOption(sel) {
    var opt;
    for ( var i = 0, len = sel.options.length; i < len; i++ ) {
        opt = sel.options[i];
        if ( opt.selected === true ) {
            break;
        }
    }
    return opt;
}

function eliminarfila(num) {
    $('#fila'+cont).remove();
    cont--;
    document.getElementById("contador").value = cont;
}

</script>

@endsection