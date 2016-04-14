<?php

require 'model.php';

$op = @$_GET['op'];

$id 		= @$_GET['id'];
$nombre 	= @$_POST['nombre'];
$apellido	= @$_POST['apellido'];
$correo 	= @$_POST['correo'];
$telefono 	= @$_POST['telefono'];

if ($op == "A") {
	//Option A - Insert
	echo insert_medico($nombre, $apellido, $correo, $telefono);
} elseif ($op == "E") {
	//Oprion E - Edit
	echo update_medico($id, $nombre, $apellido, $correo, $telefono);
} elseif ($op == "D") {
	//Option D - Delete
	echo delete_medico($id);
}

header("Location: control.php");

?>