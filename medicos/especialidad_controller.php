<?php

require 'conn_open.php';
require 'lugar_model.php';
require 'conn_close.php';

$op = @$_GET['op'];

$id 		= @$_GET['id'];
$nombre 	= @$_POST['nombre'];
$telefono 	= @$_POST['telefono'];
$direccion 	= @$_POST['direccion'];
$lat 		= @$_POST['lat'];
$lng 		= @$_POST['lng'];

if ($op == "A") {
	//Option A - Add
	add_especialidad($nombre);
} elseif ($op == "E") {
	//Oprion E - Edit
	update_lugar($id, $nombre);
} elseif ($op == "D") {
	//Option D - Delete
	delete_lugar($id); // ejecución de borrado
}

header("Location: lugar_control.php");
?>