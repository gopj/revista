<?php 


require 'model.php';

// $__PATH = dirname(dirname(__FILE__));


?>
<!DOCTYPE html>
<html>
<head>
	<title>Médicos - Lista</title>

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

<h3> Vista de Medicos </h3>

<table>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Correo</th>
			<th>Teléfono</th>
			<th>Latitud</th>
			<th>Altitud</th>
			<th>Longitud</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			if (medicos_all_results() != "") {

				$result = medicos_all_results();


				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
						echo "<td>" . $row["nombre"] 	. "</td>";
						echo "<td>" . $row["apellido"] 	. "</td>";
						echo "<td>" . $row["correo"] 	. "</td>";
						echo "<td>" . $row["telefono"] 	. "</td>";
						echo "<td>" . $row["latitud"] 	. "</td>";
						echo "<td>" . $row["altitud"] 	. "</td>";
						echo "<td>" . $row["longitud"] 	. "</td>";
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