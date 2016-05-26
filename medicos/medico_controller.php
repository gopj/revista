<?php

require 'conn_open.php';
require 'medico_model.php';
require 'conn_close.php';

$op = @$_GET['op'];

$data["id"] 			= @$_GET['id'];
$data["nombre"] 		= @$_POST['nombre'];
$data["apellido"]		= @$_POST['apellido'];
$data["correo"] 		= @$_POST['correo'];
$data["image_edit"]		= @$_POST['imagen'];
$data["image_del"]		= @$_POST['imagen_del'];
$data["lugares"]		= @$_POST['lugares']; //Lugares ids
$data["especialidades"]	= @$_POST['especialidades']; //Lugares ids

$data["image_dir"] 	= "/images/medicos/";

//image control
if (@$_FILES["image"]["error"] > 0) {
	//echo "Error: " . $_FILES["image"]["error"] . "<br>"; die();

	if ($op == "A") {
		$data["image_dir"] = $data["image_dir"] . "default.png";
	}elseif ($op == "E") {
		if ($data["image_edit"] == "Default") {
			$data["image_dir"] = "/images/medicos/default.png";

			if ($data["image_del"] == "/images/medicos/default.png") {
				echo "ok";
			} else {
				@unlink(".." . $data["image_del"]);
			}

		} else{
			$data["image_dir"] = $data["image_edit"];
		}

	}

}  else {

	$data["image_dir"] = "/images/medicos/" . image_name() . ".jpg";
	move_uploaded_file(@$_FILES['image']['tmp_name'], ".." . $data["image_dir"]);

	//$respImage_dir = $image_dir;

	if ($data["image_edit"] == "/images/medicos/default.png"){
		echo "ok";
	} else {
		@unlink(".." . $data["image_edit"]);
	}

}

if ($op == "A") {
	//Option A - Add Medico, lugares table medico-lugares query add
	insert_medico($data);
} elseif ($op == "E") {
	//Oprion E - Edit
	update_medico($data);
} elseif ($op == "D") {
	//Option D - Delete
	$del = delete_medico($data["id"]); // ejecución de borrado

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

header("Location: medico_control.php");

?>