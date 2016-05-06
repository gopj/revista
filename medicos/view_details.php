<?php

include 'model.php';

$id = $_GET["id"];

$lat = getLat($id);
$lng = getLng($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Vista</title>
</head>

<script type="text/javascript">
	var init = "v";
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


<input type="text" id="dbLat" value="<?= $lat; ?>" hidden />
<input type="text" id="dbLng" value="<?= $lng; ?>" hidden />


<?php
$result = show_medico($id);
while ($row = $result->fetch_assoc()){
?>

<h1> <?= $row["nombre"] . " " .  $row["apellido"] ?> </h1>

	<img src="<?= '..'.$row['imagen'] ?> " height="100" width="100">

	Nombre: 	<input type="text" name="nombre" 	value="<?php echo $row['nombre'] ?>" 	disabled />
	Apellido: 	<input type="text" name="apellido" 	value="<?php echo $row['apellido'] ?>"	disabled />
	Correo: 	<input type="text" name="correo" 	value="<?php echo $row['correo'] ?>" 	disabled />
	Teléfono: 	<input type="text" name="telefono" 	value="<?php echo $row['telefono'] ?>" 	disabled />
	Dirección: 	<input type="text" name="direccion"	value="<?php echo $row['direccion'] ?>" disabled />
	Latitud: 	<input type="text" name="lat" 		id="markerLat" hidden />
	Longitud: 	<input type="text" name="lng"		id="markerLng" hidden />
	Imágen: 	<input type="text" name="imagen" 	value="<?php echo $row['imagen'] ?>" 	disabled />

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

<a href="control.php"> Regresar </a>

</body>
</html>