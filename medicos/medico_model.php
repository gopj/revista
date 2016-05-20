<?php

	function medicos_all_results() {
		$conn = conn();

		$sql = "SELECT * FROM revista.medicos; ";
		$result = $conn->query($sql);

		return $result;

	}

	function insert_medico($nombre, $apellido, $correo, $image, $lugares){
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

		$sql = "SELECT * FROM revista.medicos ORDER BY id_medico DESC LIMIT 1; ";
		$result = $conn->query($sql);

		$id_medico = 0;
		while ($row = mysqli_fetch_assoc($result)) {
			$id_medico = @$row["id_medico"];
		}			

		$sql = "INSERT INTO revista.medico_lugares (
					id_medico,
					id_lugar
				) ";

		foreach ($lugares as $value) {
			$conn->query($sql . "
				VALUES (
					{$id_medico},
					{$value}
				);
			");	
		} 
	
	}

	function show_medico($id){
		$conn = conn();

		$sql = "SELECT * FROM revista.medicos WHERE id_medico={$id}; ";
		$result = $conn->query($sql);

		/*"	select 
				m.nombre, 
				m.apellido, 
				ml.id_medico, 
				l.nombre,
				l.lat, 
				l.lng
			from 
				revista.medicos as m, 
				revista.lugares as l, 
				revista.medico_lugares as ml
			where 
				m.id_medico = ml.id_medico and 
				l.id_lugar = ml.id_lugar and 
				ml.id_medico = 4; ";*/

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