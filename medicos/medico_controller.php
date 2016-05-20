<?php

require 'conn_open.php';
require 'medico_model.php';
require 'conn_close.php';

$op = @$_GET['op'];

$id 		= @$_GET['id'];
$nombre 	= @$_POST['nombre'];
$apellido	= @$_POST['apellido'];
$correo 	= @$_POST['correo'];
$telefono 	= @$_POST['telefono'];
$direccion 	= @$_POST['direccion'];
$image_edit	= @$_POST['imagen'];
$image_del	= @$_POST['imagen_del'];
$lugares	= @$_POST['lugares'];

$image_dir 	= "/images/medicos/";

//image control
if (@$_FILES["image"]["error"] > 0) {
	//echo "Error: " . $_FILES["image"]["error"] . "<br>";

	if ($op == "A") {
		$image_dir = $image_dir . "default.png";
	}elseif ($op == "E") {
		if ($image_edit == "Default") {
			$image_dir = "/images/medicos/default.png";

			if ($image_del == "/images/medicos/default.png") {
				echo "ok";
			} else {
				@unlink(".." . $image_del);
			}

		} else{
			$image_dir = $image_edit;
		}

	}

}  else {

	$image_dir = "/images/medicos/" . image_name() . ".jpg";
	move_uploaded_file(@$_FILES['image']['tmp_name'], ".." . $image_dir);

	$respImage_dir = $image_dir;

	if ($image_edit == "/images/medicos/default.png"){
		echo "ok";
	} else {
		@unlink(".." . $image_edit);
	}

}


if ($op == "A") {
	//Option A - Add Medico, lugares tabla medico-lugares
	insert_medico($nombre, $apellido, $correo, $image_dir, $lugares);
} elseif ($op == "E") {
	//Oprion E - Edit
	update_medico($id, $nombre, $apellido, $correo, $image_dir);
} elseif ($op == "D") {
	//Option D - Delete
	$del = delete_medico($id); // ejecución de borrado

	//Image Delete but not default image
	if ($del != "/images/medicos/default.png") {
		@unlink(".." . $del);
	}

}

//nombre diferente para cada imagen usando la fecha actual
function image_name(){
	$date = date("H:i:s");;
	$date = strtotime($date);

	return $date;
}

$_SESSION["active_tab"] = 1;

header("Location: control.php");

?>