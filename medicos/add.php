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
		<input type="text" name="image" class="form-control" id="nombre" placeholder="Choche">
	</div>

	<div class="form-group">
		<label for="apellido">Apellido</label>
		<input type="text" name="apellido" class="form-control" id="apellido" placeholder="Bronco">
	</div>
		<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" class="form-control" id="email" placeholder="choche@bronco.com">
	</div>

	<div class="form-group">
		<label for="telefono">Teléfono</label>
		<input type="tel" name="telefono" class="form-control" id="telefono" placeholder="3134332345">
	</div>

	<div class="form-group">
		<label for="direccion">Dirección</label>
		<input type="text" name="direccion" class="form-control" id="direccion" placeholder="Av. Siempre vida #1234">
	</div>



 	<input type="text" name="lat" id="markerLat" hidden />
	<input type="text" name="lng" id="markerLng" hidden />

	<div class="form-group">
		<div id="mapCanvas" class="form-control"> </div>


		<div id="infoPanel">
			<b>Estado del marcador:</b>
				<div id="markerStatus"><i>Click y arrastra el marcador.</i></div>
			<b>Posición actual:</b>
				<div id="info"></div>
			<b>Dirección mas cercana:</b>
				<div id="address"></div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-5 col-sm-4">
				<br>
				<a href="control.php" class="btn btn-danger btn-lg"> Cancelar </a>
				<input type="submit"  class="btn btn-primary btn-lg" value="Guardar" />
				<br>
			</div>
		</div>


	</div>



</form >


</div>

<?php include '../layouts/footer.php'; ?>


</body>
</html>