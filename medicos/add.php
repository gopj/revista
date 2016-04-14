<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Agregar</title>
</head>

<script src="http://maps.googleapis.com/maps/api/js"></script>
<body>

<h3>Agregar</h3>

<form action="controller.php?op=A" method="POST" >
	Nombre: <input type="text" name="nombre" />
	Apellido: <input type="text" name="apellido" />
	Correo: <input type="text" name="correo" />
	Teléfono: <input type="text" name="telefono" />

    <input type="submit" value="Guardar" />

</form >


</body>
</html>