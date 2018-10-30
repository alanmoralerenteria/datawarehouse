<?php $__env->startSection('body'); ?>
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
                        		
                        	</div>
                        	
                        	<form action="<?php echo e(asset('/home')); ?>" method="post" role="form">
                        		<?php echo e(csrf_field()); ?>

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
                                		<td><input type="text" name="tablas" placeholder="Ej: usuarios, áreas, libros, cursos ..." class="form-control"> </td>
                                	</tr>
                                	<tr>
                                		<td>Los campos:</td>
                                		<td><input type="text" name="campos" placeholder="Ej: Todos, usuarios.edad, libros.titulo, área.nombre ..." class="form-control"> </td>
                                	</tr>

                                </tbody>
                            </table>


                            
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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(asset('/sb-admin/vendor/datatables/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')); ?>"></script>

<script>

$(document).ready(function(){
	$('#btn-add-clausula').click(function(){
		agregarClausula();
	});
});

var cont=0;

function agregarClausula(){
	if(cont >0){
		document.getElementById('select'+cont).disabled = true;
		document.getElementById('campo'+cont).disabled = true;
	}
	cont++;
	var fila='<tr id=fila'+cont+'>'
		+'<td>'
				+'<button type="button" class="close" aria-label="Close" onClick="eliminarfila('+cont+')">'
  				+'<span aria-hidden="true">&times;</span>'
				+'</button>' 
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
	document.getElementById('campo'+cont).innerHTML = opt.text;
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
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>