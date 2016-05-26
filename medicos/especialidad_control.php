<?php

require 'conn_open.php';
require 'especialidad_model.php';
require 'conn_close.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Especilidades - Control</title>

	<?php include '../layouts/libraries.php'; ?>

	
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#control_especialidades').DataTable( {
				"language": {
					"lengthMenu": "Mostrar _MENU_ registros por página",
					"zeroRecords": "Nada encontrado - lo siento",
					"info": "Mostrando página _PAGE_ de _PAGES_",
					"infoEmpty": "No hay información disponible",
					"infoFiltered": "(Filtrado de _MAX_ del total de registros)",
					"search": "Buscar: ",
					"paginate": {
						"first": 		"Primero",
						"last": 		"Último",
						"next": 		"Siguente",
						"previous": 	"Anterior"
					},
				}
			} );
		} );

	</script>

	<script type="text/javascript">

		function delete_especialidad(id, nombre){
			var url_delete = "especialidad_controller.php?id=" + id + "&op=D";

			document.getElementById('eliminar_span').textContent = nombre ;
			document.getElementById("a_delete").setAttribute("href", url_delete);
		}

		function edit_especialidad(id, nombre){
			var url_edit = "especialidad_controller.php?id=" + id + "&op=E";

			document.getElementById('edit_span').textContent = nombre ;
			document.getElementById('nombre_modal').value = nombre ;
			document.getElementById("form_edit").setAttribute("action", url_edit);
		}

	</script>


	</script>

</head>
<body>

<?php include '../layouts/header_especialidades.php'; ?>

<div class="container">
	
	<!-- Centros -->
	<div role="tabpanel" class="tab-pane" id="centros">
		<div class="row">
			<div class="col-sm-12">
				<br>
				<div class="row">
					<div class="col-xs-8 col-sm-6">
						<h2> Especialidades </h2>
					</div>
				</div>
			</div>
		</div>

		<form  class="form-inline" action="especialidad_controller.php?op=A" method="POST">

			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre de especialidad">
			</div>
			<input type="submit"  class="btn btn-primary btn-lg" value="Guardar" />
			<br />

		</form >

		<table id="control_especialidades" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th width="11%">Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if (especialidades_all_results() != "") {

						$result = especialidades_all_results();
						// output data of each row
						while($row = $result->fetch_assoc()) {
							$id = $row["id_especialidad"];
							$nombre = $row["nombre"];

							echo "<tr>";
								echo "<td>" . $id. "</td>";
								echo "<td>" . $nombre 	. "</td>";
								echo "<td valign='center' align='center'>
											<button type='button' class='btn btn-primary btn-xs' 
											data-toggle='modal' data-target='.bs-modal-edit' 
											id='eliminar' onclick='edit_especialidad($id, \"{$nombre}\")'> 
											Editar </button>

											<button type='button' class='btn btn-danger btn-xs' 
											data-toggle='modal' data-target='.bs-modal-del' 
											id='eliminar' onclick='delete_especialidad($id, \"{$nombre}\")'> 
											<span class='glyphicon glyphicon-remove'></span> </button>
									</td>";
							echo "</tr>";
						}
					} else {
						echo "0 results";
					}

				?>
			</tbody>
		</table>
	</div>
	<!-- / Centros !-->

<div class="modal fade bs-modal-del" tabindex=-1 role=dialog aria-labelledby=mySmallModalLabel> <!-- modal bs-modal-del -->
	<div class="modal-dialog modal-sm"> 
		<div class=modal-content> 
			<div class=modal-header> 
				<button type=button class=close data-dismiss=modal aria-label=Close>
				<span aria-hidden=true>&times;</span>

				</button> <h4 class=modal-title id=mySmallModalLabel>Eliminar</h4> 
			</div> 
			<div class=modal-body>
				¿Deseas eliminar la especialidad: <strong> <span id="eliminar_span"></span></strong>?
			</div>
			<div class=modal-footer>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        		<a href="" id='a_delete' class='btn btn-danger'role='button'><span class='glyphicon glyphicon-remove'></span> Eliminar</a>
			</div>
		</div> 
	</div>
</div><!-- Modal -->

<form action="" method="POST" id="form_edit">
	<div class="modal fade bs-modal-edit" tabindex=-1 role=dialog aria-labelledby=mySmallModalLabel> 
		<div class="modal-dialog modal-sm"> 
			<div class=modal-content> 
				<div class=modal-header> 
					<button type=button class=close data-dismiss=modal aria-label=Close>
					<span aria-hidden=true>&times;</span>

					</button> <h4 class=modal-title id=mySmallModalLabel>Editar - <span id='edit_span'></span> </h4> 
				</div> 
				<div class=modal-body>
					<div class="form-group">
						<label for="nombre_modal">Nombre</label>
						<input type="text" name="nombre_modal" class="form-control" id="nombre_modal" value="">
					</div>
					
				</div>
				<div class=modal-footer>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	        		<input type="submit"  class="btn btn-primary" value="Guardar" />
				</div>
			</div> 
		</div>
	</div><!-- Modal -->
</form>

</div> <!-- Container -->

</body>
<?php include '../layouts/footer.php'; ?>
</html>