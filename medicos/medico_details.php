<?php

require 'conn_open.php';
include 'medico_model.php';
require 'conn_close.php';

$id = $_GET["id"];

$lat = getLat($id);
$lng = getLng($id);

$show_image = get_image($id);
$name = get_name($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Vista</title>
</head>
<?php include '../layouts/libraries.php'; ?>


<script type="text/javascript">
	var init = "v";
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjp7zmJJGVcBhZNEfOyiJlmKgiO8FLIU" type="text/javascript"></script>
<script src="/revista/medicos/maps/function_maps.js" type="text/javascript"></script>


<style>

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

<form action="medico_controller.php?op=E&id=<?=$id?>" method="POST" enctype="multipart/form-data">

	<?php
	$result = show_medico($id);
	while ($row = $result->fetch_assoc()){
	?>

<div class="main">
	<section class="hgroup centered">
		<div class="container">
			<ul class="breadcrumb pull-right">
				<li><a href="control.php">Inicio</a> </li>
				<li class="active">Detalles de Médico</li>
			</ul>
		</div>
	</section>
	<section class="service_teasers">
		<div class="container">
			<div class="service_teaser">
				<div class="row">
					<div class="service_photo col-sm-4 col-md-4">
						<figure style="background-image:url(<?= '../' . $show_image ?>)"></figure>
					</div>
					<div class="service_details col-sm-8 col-md-8">
						<h2 class="section_header skincolored"><b><?= $row['nombre'] ?></b> <?= $row['apellido'] ?> <small>{Especialidad}</small></h2>

						<p>
							<strong>Correo: </strong> <?= $row['correo']  ?> <br>
							<strong>Télefono: </strong> <?= $row['telefono']  ?> <br>
							<strong>Dirección: </strong> <?= $row['direccion']  ?> <br>
						</p>

					</div>
			   </div>
			</div>
		</div>
	</section>
</div>




		<input type="text" name="imagen_del" id="imagen_del" value="<?php echo $row['imagen'] ?>" hidden >
		<input type="text" name="lat" 	id="markerLat" hidden />
		<input type="text" name="lng"	id="markerLng" hidden />


		<input type="text" id="dbLat" value="<?= $lat; ?>" hidden />
		<input type="text" id="dbLng" value="<?= $lng; ?>" hidden />

	<?php } ?>

	<div class="form-group">


		<div class="full_page_photo"><div id="map"></div></div>

		<div class="form-group">
			<div class="col-sm-offset-5 col-sm-4">
				<br>
				<a href="control.php" class="btn btn-success btn-lg"> Regresar </a>

				<br>
			</div>
		</div>


	</div>

</form >

</div>

<?php include '../layouts/footer.php'; ?>

</body>
</html>