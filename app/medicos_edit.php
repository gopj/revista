<?php

include 'medicos_model.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Editar</title>
</head>
<body>

<h3>Editar</h3>
<?php 

	
?>


<form action="medicos_controller.php" method="POST" >

	<?php
		$result = edit($_GET["id"]);
		while ($row = $result->fetch_assoc()){
	?>
	<input type="text" name="id" value="<?php echo $row['id'] ?>" hidden></input>
	Nombre: <input type="text" name="nombre" value="<?php echo $row['nombre'] ?>" />
	Apellido: <input type="text" name="apellido" value="<?php echo $row['apellido'] ?>"/>
	Correo: <input type="text" name="correo" value="<?php echo $row['correo'] ?>" />
	Teléfono: <input type="text" name="telefono" value="<?php echo $row['telefono'] ?>" />

	<?php } ?>

    <input type="submit" value="Guardar" />

</form >


</body>
</html>