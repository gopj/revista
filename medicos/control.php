<?php

//require $path . '/app/controller/medicos_controller.php';

// $__PATH = dirname(dirname(__FILE__));
require 'model.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Médicos - Control</title>

	<style type="text/css">
	/*	body {
				background-color:black;
				color:#259b24;
				font-family: "Consolas";

			}
	*/
	</style>
</head>
<body>


<table>

<h3> Control Medicos </h3>

<a href="add.php"> Agregar </a>

<table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo</th>
			<th>Teléfono</th>
			<th>Dirección</th>
			<th>Latitud</th>
			<th>Longitud</th>
			<th>Opcion</th>
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
						echo "<td>" . $row["nombre"] 	. "</td>";
						echo "<td>" . $row["apellido"] 	. "</td>";
						echo "<td>" . $row["correo"] 	. "</td>";
						echo "<td>" . $row["telefono"] 	. "</td>";
						echo "<td>" . $row["direccion"] 	. "</td>";
						echo "<td>" . @$row["lat"] 	. "</td>";
						echo "<td>" . @$row["lng"] 	. "</td>";
						echo "<td> <a href='view_details.php?id={$id}' >Ver</a> | <a href='edit.php?id={$id}' >Editar</a> | <a href='controller.php?id={$id}&op=D' >Borrar</a></td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

		?>
	</tbody>
</table>

</body>
</html>