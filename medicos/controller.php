<?php

require 'model.php';

$op = @$_GET['op'];

$id 		= @$_GET['id'];
$nombre 	= @$_POST['nombre'];
$apellido	= @$_POST['apellido'];
$correo 	= @$_POST['correo'];
$telefono 	= @$_POST['telefono'];
$direccion 	= @$_POST['direccion'];
$lat 		= @$_POST['lat'];
$lng 		= @$_POST['lng'];
$image_edit	= @$_POST['imagen'];

$image_dir 	= "/images/medicos/";

//image control
if (@$_FILES["image"]["error"] > 0) {
	//echo "Error: " . $_FILES["image"]["error"] . "<br>";
	$image_dir = $image_dir . "default.png";
}  else {
	$image_dir = "/images/medicos/" . image_name() . ".jpg";
	move_uploaded_file(@$_FILES['image']['tmp_name'], ".." . $image_dir);
	
	//Image Delete but not default image
	if ($image_edit =! "/images/medicos/default.png"){
		@unlink(".." . $image_edit);
	}
}


if ($op == "A") {
	//Option A - Add
	insert_medico($nombre, $apellido, $correo, $telefono, $direccion, $lat, $lng, $image_dir);
} elseif ($op == "E") {
	//Oprion E - Edit
	update_medico($id, $nombre, $apellido, $correo, $telefono, $direccion, $lat, $lng, $image_dir);
} elseif ($op == "D") {
	//Option D - Delete
	$del = delete_medico($id); // ejecución de borrado

	//Image Delete but not default image
	if ($del =! "/images/medicos/default.png") {
		unlink(".." . $del);
	}
	
}

//nombre diferente para cada imagen usando la fecha actual
function image_name(){
	$date = date("H:i:s");;
	$date = strtotime($date);

	return $date;
}

header("Location: control.php");

?>