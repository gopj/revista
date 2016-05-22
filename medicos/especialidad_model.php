<?php
	
	function especialidades_all_results() {
		$conn = conn();

		$sql = "SELECT * FROM revista.especialidades; ";
		$result = $conn->query($sql);

		return $result;

	}

	function add_especialidad($nombre){
		$conn = conn();

		$sql = "INSERT INTO revista.especialidades (
					nombre
				)

				VALUES (
					'{$nombre}',
				);

			   ";

		$conn->query($sql);

		return "ok";
	}

	function show_especialidad($id){
		$conn = conn();

		$sql = "SELECT * FROM revista.especialidades WHERE id_especialidad={$id}; ";
		$result = $conn->query($sql);

		return $result;
	}

	function update_especialidad($id, $nombre){
		$conn = conn();

		$sql = " UPDATE revista.especialidades SET
					nombre 		= '{$nombre}',
				WHERE id_especialidad={$id}; ";

		$conn->query($sql);

		return "ok";
	}

	function delete_especialidad($id){
		$conn = conn();

		$sql = "DELETE FROM revista.especialidades WHERE id_especialidad={$id}; ";
		$conn->query($sql);

		return $result;
	}


?>