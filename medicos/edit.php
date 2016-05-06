<?php

include 'model.php';

$id = $_GET["id"];

$lat = getLat($id);
$lng = getLng($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Editar</title>
</head>

<script type="text/javascript">
	var init = "e";
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjp7zmJJGVcBhZNEfOyiJlmKgiO8FLIU" type="text/javascript"></script>
<script src="/revista/medicos/maps/function_maps.js" type="text/javascript"></script>
<script src="/revista/js/jquery-1.9.0.min.js" type="text/javascript"></script>

<style>
	#mapCanvas {
		width: 500px;
		height: 400px;
		float: left;
	}

	#infoPanel {
		float: left;
		margin-left: 10px;
	}

	#infoPanel div {
		margin-bottom: 5px;
	}
</style>

<body>

<h3>Editar</h3>

<input type="text" id="dbLat" value="<?= $lat; ?>" hidden />
<input type="text" id="dbLng" value="<?= $lng; ?>" hidden />

<form action="controller.php?op=E&id=<?=$id?>" method="POST" enctype="multipart/form-data">

	<?php
	$result = show_medico($id);
	while ($row = $result->fetch_assoc()){
	?>
		<input type="text" name="id" value="<?php echo $row['id_medico'] ?>" hidden />

		Imagen: 	<input type="file" name="image" 	id="image" />
		Nombre: 	<input type="text" name="nombre" 	value="<?php echo $row['nombre'] ?>" />
		Apellido: 	<input type="text" name="apellido" 	value="<?php echo $row['apellido'] ?>"/>
		Correo: 	<input type="text" name="correo" 	value="<?php echo $row['correo'] ?>" />
		Teléfono: 	<input type="text" name="telefono" 	value="<?php echo $row['telefono'] ?>" />
		Dirección: 	<input type="text" name="direccion"	value="<?php echo $row['direccion'] ?>" />
		Latitud: 	<input type="text" name="lat" 		id="markerLat" disabled />
		Longitud: 	<input type="text" name="lng"		id="markerLng" disabled />
		Imágen: 	<input type="text" name="imagen" 	value="<?php echo $row['imagen'] ?>" />

	<?php } ?>

	<div id="mapCanvas"></div>
	<div id="infoPanel">
		<b>Marker status:</b>
			<div id="markerStatus"><i>Click and drag the marker.</i></div>
		<b>Current position:</b>
			<div id="info"></div>
		<b>Closest matching address:</b>
			<div id="address"></div>
	</div>


    <input type="submit" value="Guardar" />

</form >

<a href="control.php"> Cancelar </a>

</body>
</html>