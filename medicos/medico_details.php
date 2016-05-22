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

<div class="container"> <br>

<?php
$result = show_medico($id);
while ($row = $result->fetch_assoc()){
?>
	<div class="service_teaser elegant">
		<div class="container">
			<div class="row">
				<div class="service_photo col-sm-4 col-md-4 wow animated rollIn">
					<figure style="background-image:url(<?= '../' . $show_image ?>)"></figure>
				</div>
				<div class="service_details col-sm-8 col-md-8 wow animated slideInRight">
					<h2 class="section_header elegant"><?php echo $row['nombre'] . " " . $row['apellido'] . "&nbsp; &nbsp; -" ?> <small> <?php echo $row['correo'] ?> </small></h2>
					<p><strong>Centros médicos</strong><p>
					<hr>
						<?php 
							foreach ($show_places as  $value) {
								echo "<strong> {$value['nombre']}: </strong> {$value['direccion']} <br>";
								echo "<strong> Contacto: </strong> (+52) {$value['telefono']} <hr>";
							} 
						?>
				</div>
			</div>
		</div>
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


</body>
<?php include '../layouts/footer.php'; ?>
</html>

