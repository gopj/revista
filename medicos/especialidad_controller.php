<?php

require 'conn_open.php';
require 'especialidad_model.php';
require 'conn_close.php';

$op = @$_GET['op'];

$id 		= @$_GET['id'];
$nombre 	= @$_POST['nombre'];
$nombre_edit= @$_POST['nombre_modal'];

if ($op == "A") {
	//Option A - Add
	add_especialidad($nombre);
} elseif ($op == "E") {
	//Oprion E - Edit
	update_especialidad($id, $nombre_edit);
} elseif ($op == "D") {
	//Option D - Delete
	delete_especialidad($id); // ejecución de borrado
}

header("Location: especialidad_control.php");
?>