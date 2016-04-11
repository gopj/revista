<?php

$arr_dir[] = explode("\\", getcwd());
$path = $arr_dir[0][0] . "/" . $arr_dir[0][1] . "/" . $arr_dir[0][2] . "/" . $arr_dir[0][3];

?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - EliminarS</title>
</head>
<body>

<h3>Agregar</h3>

<form action="medicos_controller.php" method="POST" >
	Nombre: <input type="text" name="nombre" />
	Apellido: <input type="text" name="apellido" />
	Correo: <input type="text" name="correo" />
	Teléfono: <input type="text" name="telefono" />

    <input type="submit" value="Guardar" />

</form >


</body>
</html>