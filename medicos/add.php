<?php


?>

<!DOCTYPE html>
<html>
<head>
	<title> Medicos - Agregar</title>
</head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxjp7zmJJGVcBhZNEfOyiJlmKgiO8FLIU" type="text/javascript"></script>
<script src="/revista/medicos/maps/function_maps.js" type="text/javascript"></script>
<script src="/revista/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<body>

<h1>Agregar</h1>

<form action="controller.php?op=A" method="POST" >
	Nombre: 	<input type="text" name="nombre" />
	Apellido: 	<input type="text" name="apellido" />
	Correo:		<input type="text" name="correo" />
	Teléfono: 	<input type="text" name="telefono" />
	Latitud: 	<input type='text' id='markerLat' value='' />
	Longitud:	<input type='text' id='markerLng' value='' />


	<div id="map_canvas" style="width: 600px; height: 400px; float: left; position: relative; background-color: rgb(229, 227, 223); overflow: hidden;"></div>

    <input type="submit" value="Guardar" />

</form >


</body>
</html>