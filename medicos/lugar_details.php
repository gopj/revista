<?php
require 'conn_open.php';
require 'lugar_model.php';
require 'conn_close.php';

$id = $_GET["id"];

$lat = get_lugar_lat($id);
$lng = get_lugar_lng($id);

$name = get_lugar_name($id);

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
<?php include '../layouts/header_lugares.php'; ?>

<div class="container">

<form action="lugar_controller.php?op=E&id=<?=$id?>" method="POST" enctype="multipart/form-data">

<?php
$result = show_lugar($id);
while ($row = $result->fetch_assoc()){
?>

<div class="main">
	<section class="hgroup centered">
		<div class="container">
			<ul class="breadcrumb pull-right">
				<li><a href="lugar_control.php">Inicio</a> </li>
				<li class="active">Detalles del Centro Médico</li>
			</ul>
		</div>
	</section>
	<section class="service_teasers">
		<div class="container">
				<div class="row">
					
					<div class="service_details col-sm-8 col-md-8">
						<h2 class="section_header skincolored"><b><?= $row['nombre'] ?></b> <small>{Descripción}</small></h2>

						<p>
							<strong>Nombre: </strong> <?= $row['nombre']  ?> <br>
							<strong>Télefono: </strong> <?= $row['telefono']  ?> <br>
							<strong>Dirección: </strong> <?= $row['direccion']  ?> <br>
						</p>

					</div>
			</div>
		</div>
	</section>
</div>

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
			<a href="lugar_control.php" class="btn btn-success btn-lg"> Regresar </a>
			<br>
		</div>
	</div>


</div>

</form >

</div>

</body>
<?php include '../layouts/footer.php'; ?>
</html>