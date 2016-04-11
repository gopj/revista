<?php 


require 'medicos_model.php';

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


<?php
		$id = $_GET['id'];

		$result = edit_medico($id);
		while ($row = $result->fetch_assoc()){
?>

<h3> Detalles - <?php echo $row['nombre'] ?> </h3>

	Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" />
	Apellido: <input type="text" name="apellido" value="<?php echo $row['apellido'] ?>"/>
	Correo: <input type="text" name="correo" value="<?php echo $row['correo'] ?>" />
	Teléfono: <input type="text" name="telefono" value="<?php echo $row['telefono'] ?>" />

<?php } ?>

</body>
</html>