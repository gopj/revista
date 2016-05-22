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
			$('#control_especilidades').DataTable( {
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

		function delete_medico(id, nombre, apellido){
			var url_delete = "medico_controller.php?id=" + id + "&op=D";

			document.getElementById('eliminar_span').textContent = nombre + " " + apellido;
			document.getElementById("a_delete").setAttribute("href", url_delete);
		}
	</script>

	<script type="text/javascript">

		function delete_lugar(id, nombre){
			var url_delete = "lugar_controller.php?id=" + id + "&op=D";

			document.getElementById('eliminar_span').textContent = nombre;
			document.getElementById("a_delete").setAttribute("href", url_delete);
		}
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
						<h2> Centros Medicos </h2>
					</div>
					<div class="col-xs-8 col-sm-6" align="right">
						<a href="especilidad_add.php" class="btn btn-primary btn-lg" role="button"> 
							Agregar 
						</a>
					</div>
				</div>
			</div>
		</div>

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

							$nombre = $row["nombre"];

							echo "<tr>";
								echo "<td>" . $id 	. "</td>";
								echo "<td>" . $row["nombre"] 	. "</td>";
								echo "<td valign='center' align='center'>
											<a href='lugar_edit.php?id={$id}'
											class='btn btn-primary btn-xs'
											role='button'>Editar</a>

											<button type='button' class='btn btn-danger btn-xs' 
											data-toggle='modal' data-target='.bs-example-modal-sm' 
											id='eliminar' onclick='delete_lugar($id, \"{$nombre}\")'> 
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

<div class="modal fade bs-example-modal-sm" tabindex=-1 role=dialog aria-labelledby=mySmallModalLabel> 
	<div class="modal-dialog modal-sm"> 
		<div class=modal-content> 
			<div class=modal-header> 
				<button type=button class=close data-dismiss=modal aria-label=Close>
				<span aria-hidden=true>&times;</span>

				</button> <h4 class=modal-title id=mySmallModalLabel>Eliminar</h4> 
			</div> 
			<div class=modal-body>
				¿Deseas eliminar a <strong> <span id="eliminar_span"></span> </strong>?
			</div>
			<div class=modal-footer>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        		<a href="" id='a_delete' class='btn btn-danger'role='button'><span class='glyphicon glyphicon-remove'></span> Eliminar</a>
			</div>
		</div> 
	</div>
</div><!-- Modal -->

</div> <!-- Container -->

</body>
<?php include '../layouts/footer.php'; ?>
</html>