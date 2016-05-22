<?php
require 'conn_open.php';
include 'medico_model.php';
include 'lugar_model.php';
require 'conn_close.php';

$id = $_GET["id"];
$show_image = get_image($id);
$show_places= get_places($id);


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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjp7zmJJGVcBhZNEfOyiJlmKgiO8FLIU" type="text/javascript"></script>
<script src="/revista/medicos/maps/map_lugares.js" type="text/javascript"></script>


<?php include '../layouts/libraries.php'; ?>

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

<body onload="load()">

<?php include '../layouts/header_medicos.php'; ?>

<div class="container">

<div class="page-header bs-header">
	<h1 id="editar" class="text">
		<a class="kv-anchor" title="Permalink" href="#editar" data-toggle="tooltip">
			<span class="glyphicon glyphicon-list-alt"></span>
		</a> Ver <small></small>

		<img src="<?= '../' . $show_image ?>" height="100" width="100" class="img-circle">
	</h1>
</div>



<?php
$result = show_medico($id);
while ($row = $result->fetch_assoc()){
?>
	<input type="text" name="id" value="<?php echo $row['id_medico'] ?>" hidden />

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

<?php } ?>

<div class="form-group">
	<div class="full_page_photo"><div id="map"></div> </div>
	
	<div class="form-group">
		<div class="col-sm-offset-5 col-sm-4">
			<br>
			<a href="medico_control.php" class="btn btn-success btn-lg"> Regresar </a>
			<br>
		</div>
	</div>


</div>



</div>
</div>

<br /> <br /> <br /> <br /> 

</body>
<?php include '../layouts/footer.php'; ?>
</html>

