<?php
require 'conn_open.php';
include 'medico_model.php';
include 'lugar_model.php';
require 'especialidad_model.php';
require 'conn_close.php';

$id = $_GET["id"];
$show_image = get_image($id);
$show_places= get_places($id);
$show_specs = get_specs($id)

?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Editar</title>
</head>

<script type="text/javascript">
	var init = "e";
	var id = "<?php echo $id; ?>"; //variable de id, desde el boton de edit
</script>

<link rel="stylesheet" type="text/css" href="/revista/css/bootstrap-select.min.css" />
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjp7zmJJGVcBhZNEfOyiJlmKgiO8FLIU" type="text/javascript"></script>
<script src="/revista/medicos/maps/map_lugares.js" type="text/javascript"></script>

<?php include '../layouts/libraries.php'; ?>

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

<body onload="load()">

<?php include '../layouts/header_medicos.php'; ?>

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
			<label for="imagen">Ruta de imágen</label> <div id="defaultimg" role='button' class='btn btn-danger btn-xs'>Default</div>
			<input type="text" name="imagen" class="form-control" id="imagen" value="<?php echo $row['imagen'] ?>" readonly="readonly">
		</div>

		<div class="form-group">
			<label for="basic">Centros Medicos</label>

			<select class="selectpicker form-control" multiple="multiple" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" name="lugares[]" id="lugares">
				<optgroup label="Centros Médicos" data-subtext="Selecciona uno o varios">
					<?php
						if (lugares_all_results()) {
							$result = lugares_all_results();

							$p = 0; // To Print Selected
							while ($row = $result->fetch_assoc()) {
								$id = $row["id_lugar"];
								$dir = $row["direccion"];

								foreach ($show_places as $value) {

									if ($value['id_lugar'] == $id) {
										echo "<option data-subtext='{$dir}' value='$id' selected='true'>" . $row["nombre"] . "</option>";
										$p=1;
									}
								}

								if ($p == 0) {
									echo "<option data-subtext='{$dir}' value='$id'>" . $row["nombre"]  . "</option>";
								}
								$p=0;	
							}
						}	
					?>
				</optgroup>
			</select>
		</div>

		<div class="form-group">
			<label for="basic">Especialidades</label>

			<select class="selectpicker form-control" multiple="multiple" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" name="especialidades[]" id="especialidades">
				<optgroup label="Especialidades" data-subtext="Selecciona una o varias">
					<?php
						if (especialidades_all_results()) {
							$result = especialidades_all_results();

							$p = 0; // To Print Selected
							while ($row = $result->fetch_assoc()) {
								$id = $row["id_especialidad"];

								foreach ($show_specs as $value) {
									if ($value['id_especialidad'] == $id) {
										echo "<option value='$id' selected='true'>" . $row["nombre"] . "</option>";
										$p=1;
									}
								}

								if ($p == 0) {
									echo "<option value='$id'>" . $row["nombre"]  . "</option>";
								}
								$p=0;	
							}
						}	
					?>
				</optgroup>
			</select>
		</div>

	<?php } ?>

	<div class="form-group">
		<div class="full_page_photo"><div id="map"></div></div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-5 col-sm-4">
			<br>
			<a href="medico_control.php" class="btn btn-danger btn-lg"> Cancelar </a>
			<input type="submit"  class="btn btn-primary btn-lg" value="Guardar" />
			<br>
		</div>
	</div>

</form>

</div>

</body>
<?php include '../layouts/footer.php'; ?>
</html>