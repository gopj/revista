<?php

require 'medicos_model.php';

print_r($_POST);

$id = @$_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];

if ($id != "") {
	echo update($id, $nombre, $apellido, $correo, $telefono);
	header("Location: medicos_control.php");
}

if ($nombre != "") {

	echo insert($nombre, $apellido, $correo, $telefono);
	header("Location: medicos_control.php");

} else {
	header("Location: medicos_add.php");
	exit;
}

?>