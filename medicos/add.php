<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Agregar</title>
</head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjp7zmJJGVcBhZNEfOyiJlmKgiO8FLIU" type="text/javascript"></script>
<script src="/revista/medicos/maps/function_maps.js" type="text/javascript"></script>
<script src="/revista/js/jquery-1.9.0.min.js" type="text/javascript"></script>

<script type="text/javascript">
	var init = "a";
</script>

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

<h1>Agregar</h1>

<form action="controller.php?op=A" method="POST" >
	Nombre: 	<input type="text" name="nombre" />
	Apellido: 	<input type="text" name="apellido" />
	Correo:		<input type="text" name="correo" />
	Teléfono: 	<input type="text" name="telefono" />
	Dirección: 	<input type="text" name="direccion" />
	Latitud: 	<input type='text' id='markerLat' name="lat" />
	Longitud:	<input type='text' id='markerLng' name="lng" />

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


</body>
</html>