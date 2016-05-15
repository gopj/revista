<?php
require 'conn_open.php';
include 'medico_model.php';
include 'lugar_model.php';
require 'conn_close.php';

$id = $_GET["id"];

$lat = getLat($id);
$lng = getLng($id);

$show_image = get_image($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Editar</title>
</head>

<link rel="stylesheet" type="text/css" href="/revista/css/bootstrap-select.min.css" />
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjp7zmJJGVcBhZNEfOyiJlmKgiO8FLIU" type="text/javascript"></script>
<script src="/revista/medicos/maps/function_maps.js" type="text/javascript"></script>


<?php include '../layouts/libraries.php'; ?>

<script type="text/javascript">
	var init = "e";
</script>


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

		<img src="<?= '../' . $show_image ?>" height="100" width="100" class="img-circle">
	</h1>
</div>

<form action="medico_controller.php?op=E&id=<?=$id?>" method="POST" enctype="multipart/form-data">

	<?php
	$result = show_medico($id);
	while ($row = $result->fetch_assoc()){
	?>
		<input type="text" name="id" value="<?php echo $row['id_medico'] ?>" hidden />

		<div class="form-group">
			<label class="control-label">Selecciona imágen</label>
			<input id="image" name="image" type="file" multiple class="file-loading form-control">
		</div>

		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $row['nombre'] ?>">
		</div>

		<div class="form-group">
			<label for="apellido">Apellido</label>
			<input type="text" name="apellido" class="form-control" id="apellido" value="<?php echo $row['apellido'] ?>">
		</div>
			<div class="form-group">
			<label for="correo">Correo</label>
			<input type="correo" name="correo" class="form-control" id="correo" value="<?php echo $row['correo'] ?>">
		</div>

		<div class="form-group">
			<label for="telefono">Teléfono</label>
			<input type="tel" name="telefono" class="form-control" id="telefono" value="<?php echo $row['telefono'] ?>">
		</div>

		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" name="direccion" class="form-control" id="direccion" value="<?php echo $row['direccion'] ?>" >
		</div>

		<div class="form-group">
			<label for="imagen">Ruta de imágen</label> <div id="defaultimg" role='button' class='btn btn-danger btn-xs'>Default</div>
			<input type="text" name="imagen" class="form-control" id="imagen" value="<?php echo $row['imagen'] ?>" readonly="readonly">
		</div>


		<div class="form-group">
			<label for="basic">Centros Medicos</label>

			<select class="selectpicker form-control" multiple="" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true">
				<optgroup label="Centros Médicos" data-subtext="Selecciona uno o varios">
					<option>ASD</option>
					<option>Bla</option>
					<option>Ble</option>
				</optgroup>
			</select>
			
		</div>
	
		<!-- .container-fluid -->
	

		<input type="text" name="imagen_del" id="imagen_del" value="<?php echo $row['imagen'] ?>" hidden >
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