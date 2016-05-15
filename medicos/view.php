<?php

//require $path . '/app/controller/medicos_medico_controller.php';

// $__PATH = dirname(dirname(__FILE__));
require 'medico_model.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Médicos - Control</title>

	<?php include '../layouts/libraries.php'; ?>

	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#control_medicos').DataTable();
		} );
	</script>

</head>
<body>

<?php include '../layouts/header.php'; ?>

<div class="container">

<div class="row">
	<div class="col-sm-12">
		<br>
		<div class="row">
			<div class="col-xs-8 col-sm-6">
				<h2> Control Medicos </h2>
			</div>
			<div class="col-xs-8 col-sm-6" align="right">
				<a  href="medico_add.php" class="btn btn-primary btn-lg" role="button"> Agregar </a>
			</div>
		</div>
	</div>
</div>

<table id="control_medicos" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo</th>
			<th>Teléfono</th>
			<th>Dirección</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if (medicos_all_results() != "") {

				$result = medicos_all_results();


				// output data of each row
				while($row = $result->fetch_assoc()) {
					$id = $row["id_medico"];
					echo "<tr>";
						echo "<td>" . $id 	. "</td>";
						echo "<td>" . $row["nombre"] 	. "</td>";
						echo "<td>" . $row["apellido"] 	. "</td>";
						echo "<td>" . $row["correo"] 	. "</td>";
						echo "<td>" . $row["telefono"] 	. "</td>";
						echo "<td>" . $row["direccion"] 	. "</td>";
						echo "<td>" . @$row["imagen"] 	. "</td>";
						
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

		?>
	</tbody>
</table>

</div>

<?php include '../layouts/footer.php'; ?>

</body>
</html>