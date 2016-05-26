<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title> Epecialidad - Agregar</title>

<?php include '../layouts/libraries.php'; ?>

<script type="text/javascript">
	var init = "a";
</script>

</head>

<body>

<?php include '../layouts/header_especialidades.php'; ?>

<div class="container">

<div class="page-header bs-header">
	<h2 id="agregar" class="text">
		<a class="kv-anchor" title="Permalink" href="#agregar" data-toggle="tooltip">
			<span class="glyphicon glyphicon-plus"></span>
		</a> Agregar - Especilidad
	</h2>
</div>



<form action="lugar_controller.php?op=A" method="POST" enctype="multipart/form-data">

	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre de especialidad">
	</div>

	<div class="form-group">
		<div class="col-sm-offset-5 col-sm-4">
			<br>
			<a href="lugar_control.php" class="btn btn-danger btn-lg"> Cancelar </a>
			<input type="submit"  class="btn btn-primary btn-lg" value="Guardar" />
			<br>
		</div>
	</div>

</form >


</div>

</body>
<?php include '../layouts/footer.php'; ?>
</html>