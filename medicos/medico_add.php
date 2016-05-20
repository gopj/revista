<?php
require 'conn_open.php';
require 'lugar_model.php';
require 'medico_model.php';
require 'conn_close.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Agregar</title>

<?php include '../layouts/libraries.php'; ?>
<link rel="stylesheet" type="text/css" href="/revista/css/bootstrap-select.min.css" />

<script type="text/javascript">
	var init = "a";

	$(document).on('ready', function() {
		$("#image").fileinput({showCaption: false});
	});
</script>
</head>

<body>

<?php include '../layouts/header.php'; ?>

<div class="container">

<div class="page-header bs-header">
	<h2 id="agregar" class="text">
		<a class="kv-anchor" title="Permalink" href="#agregar" data-toggle="tooltip">
			<span class="glyphicon glyphicon-plus"></span>
		</a> Agregar
	</h2>
</div>



<form action="medico_controller.php?op=A" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label class="control-label">Selecciona imágen</label>
		<input id="image" name="image" type="file" multiple class="file-loading">
	</div>

	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Choche">
	</div>

	<div class="form-group">
		<label for="apellido">Apellido</label>
		<input type="text" name="apellido" class="form-control" id="apellido" placeholder="Bronco">
	</div>
		<div class="form-group">
		<label for="correo">Email</label>
		<input type="correo" name="correo" class="form-control" id="correo" placeholder="choche@bronco.com">
	</div>

	<div class="form-group">
		<label for="telefono">Teléfono</label>
		<input type="tel" name="telefono" class="form-control" id="telefono" placeholder="3134332345">
	</div>

	<div class="form-group">
		<label for="basic">Centros Medicos</label>

		<select class="selectpicker form-control" multiple="multiple" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" name="lugares[]" id="lugares">
			<optgroup label="Centros Médicos" data-subtext="Selecciona uno o varios">
				<?php 
					if (lugares_all_results()) {
						$result = lugares_all_results();

						while ($row = $result->fetch_assoc()) {
							$id = $row["id_lugar"];
							$dir = $row["direccion"];
							echo "<option data-subtext='{$dir}' value='$id'>" . $row["nombre"] . "</option>";
						}
					}
				?>
			</optgroup>
		</select>
	</div>

	<div class="form-group">

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