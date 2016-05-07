<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Agregar</title>

<?php include '../layouts/libraries.php'; ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjp7zmJJGVcBhZNEfOyiJlmKgiO8FLIU" type="text/javascript"></script>
<script src="/revista/medicos/maps/function_maps.js" type="text/javascript"></script>

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
</head>

<body>

<?php include '../layouts/header.php'; ?>

<div class="container">

<h2>Agregar</h2>

<form action="controller.php?op=A" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label for="image">Imágen</label>
		<input type="file" name="image" id="image">
		<p class="help-block">Carga una imágen.</p>
	</div>

	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" id="nombre" placeholder="Choche">
	</div>
	<div class="form-group">
		<label for="apellido">Apellido</label>
		<input type="text" class="form-control" id="apellido" placeholder="Bronco">
	</div>
		<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" placeholder="choche@bronco.com">
	</div>
	</div>
		<div class="form-group">
		<label for="telefono">Teléfono</label>
		<input type="tel" class="form-control" id="telefono" placeholder="3134332345">
	</div>

	</div>
	Imagen 		<input type="file" name="image" id="image" />
	Nombre: 	<input type="text" name="nombre" />
	Apellido: 	<input type="text" name="apellido" />
	Correo:		<input type="text" name="correo" />
	Teléfono: 	<input type="text" name="telefono" />
	Dirección: 	<input type="text" name="direccion" />
	Latitud: 	<input type="text" name="lat" id="markerLat" hidden />
	Longitud:	<input type="text" name="lng" id="markerLng" hidden />

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

</div>
</body>
</html>