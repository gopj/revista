<?php

require 'conn_open.php';
require 'lugar_model.php';
require 'conn_close.php';

$id = $_GET["id"];

$lat = get_lugar_lat($id);
$lng = get_lugar_lng($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Editar</title>
</head>

<?php include '../layouts/libraries.php'; ?>

<script type="text/javascript">
	var init = "e";
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjp7zmJJGVcBhZNEfOyiJlmKgiO8FLIU" type="text/javascript"></script>
<script src="/revista/medicos/maps/function_maps.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).on('ready', function() {
	$("#image").fileinput({showCaption: false});
});

$(function() {
	$("#defaultimg").click( function(){
		document.getElementById('imagen').value = "Default";
	});
});
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

<?php include '../layouts/header.php'; ?>

<div class="container">

<div class="page-header bs-header">
	<h1 id="editar" class="text">
		<a class="kv-anchor" title="Permalink" href="#editar" data-toggle="tooltip">
			<span class="glyphicon glyphicon-list-alt"></span>
		</a> Editar <small></small>
	</h1>
</div>

<form action="lugar_controller.php?op=E&id=<?=$id?>" method="POST">

	<?php
	$result = show_lugar($id);

	while ($row = $result->fetch_assoc()){
	?>
		<input type="text" name="id" value="<?php echo $row['id_lugar'] ?>" hidden />

		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $row['nombre'] ?>">
		</div>

		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input type="tel" name="telefono" class="form-control" id="telefono" value="<?php echo $row['telefono'] ?>">
		</div>

		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" class="form-control" id="direccion" value="<?php echo $row['direccion'] ?>" >
		</div>

		<input type="text" name="lat" 	id="markerLat" hidden />
		<input type="text" name="lng"	id="markerLng" hidden />

		<input type="text" id="dbLat" value="<?= $lat; ?>" hidden />
		<input type="text" id="dbLng" value="<?= $lng; ?>" hidden />

	<?php } ?>

	<div class="form-group">
		<div class="full_page_photo"><div id="map"></div></div>
		<div id="infoPanel">
			<b>Estado del marcador:</b>
				<div id="markerStatus"><i>Click y arrastra el marcador.</i></div>
			<b>Posición actual:</b>
				<div id="info"></div>
			<b>Dirección mas cercana:</b>
				<div id="adress"></div>
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