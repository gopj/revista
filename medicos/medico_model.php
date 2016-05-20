<?php

	function medicos_all_results() {
		$conn = conn();

		$sql = "SELECT * FROM revista.medicos; ";
		$result = $conn->query($sql);

		return $result;

	}

	function insert_medico($nombre, $apellido, $correo, $telefono, $image){
		$conn = conn();

		
		$sql = "INSERT INTO revista.medicos (
					nombre,
					apellido,
					correo,
					imagen
				)

				VALUES (
					'{$nombre}',
					'{$apellido}',
					'{$correo}',
					'{$image}'
				);

			   ";

		$conn->query($sql);


		return "ok";
	}

	function show_medico($id){
		$conn = conn();

		$sql = "SELECT * FROM revista.medicos WHERE id_medico={$id}; ";
		$result = $conn->query($sql);

		return $result;
	}

	function update_medico($id, $nombre, $apellido, $correo, $telefono, $direccion, $image){
		$conn = conn();


		$sql = " UPDATE revista.medicos SET
					nombre 		= '{$nombre}',
					apellido 	= '{$apellido}',
					correo 		= '{$correo}',
					telefono 	= '{$telefono}',
					imagen 		= '{$image}'

				WHERE id_medico={$id}; ";

		$result = $conn->query($sql);

		return "ok";
	}

	function delete_medico($id){
		$conn = conn();

		$sql = "SELECT * FROM revista.medicos where id_medico={$id};";
		$result = $conn->query($sql);

		while ($row = @mysqli_fetch_assoc($result)) {
			$result = $row["imagen"];
		}

		$sql = "DELETE FROM revista.medicos WHERE id_medico={$id}; ";
		$conn->query($sql);


		return $result;
	}


	function get_image($id){
		$conn = conn();

		$imagen = "";

		$sql = " SELECT imagen FROM revista.medicos WHERE id_medico={$id}; ";
		$result = $conn->query($sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$imagen = @$row["imagen"];
		}

		return $imagen;
	};

	function get_name($id){
		$conn = conn();

		$name = "";

		$sql = " SELECT nombre FROM revista.medicos WHERE id_medico={$id}; ";
		$result = $conn->query($sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$name = $row["nombre"];
		}

		return $name;
	};

?>