<?php

	function medicos_all_results() {
		$conn = conn();

		$sql = "SELECT * FROM revista.medicos; ";
		$result = $conn->query($sql);

		return $result;

	}

	function insert_medico($data){
		$conn = conn();

		$sql = "INSERT INTO revista.medicos (
					nombre,
					apellido,
					correo,
					imagen
				)

				VALUES (
					\"{$data['nombre']}\",
					\"{$data['apellido']}\",
					\"{$data['correo']}\",
					\"{$data['image_dir']}\"	
				);
		";

		$conn->query($sql);
		/*
			Insertar medicos lugares tabla de relaciones
		*/
		$sql = "SELECT * FROM revista.medicos ORDER BY id_medico DESC LIMIT 1; "; // id del medico
		$result = $conn->query($sql);
		$id_medico = 0; //Agregar lugares para el medico
		if ($data["lugares"]) { //si el array ligares contiene información
			
			while ($row = mysqli_fetch_assoc($result)) {
				$id_medico = @$row["id_medico"];
			}			

			$sql = "INSERT INTO revista.medico_lugares (
						id_medico,
						id_lugar
					) ";

			foreach ($data["lugares"] as $value) {
				$conn->query($sql . "
					VALUES (
						{$id_medico},
						{$value}
					);
				");	
			} 

		}

		/*
			Insertar medicos especialidades tabla de relaciones
		*/
		$sql = "SELECT * FROM revista.medicos ORDER BY id_medico DESC LIMIT 1; "; // id del medico
		$result = $conn->query($sql);
		$id_medico = 0; //Agregar especialidades para el medico
		if ($data["especialidades"]) { //si el array ligares contiene información - hacer fix en edit para lugares y especialidades
			
			while ($row = mysqli_fetch_assoc($result)) {
				$id_medico = @$row["id_medico"];
			}			

			$sql = "INSERT INTO revista.medico_especialidades (
						id_medico,
						id_especialidad
					) ";

			foreach ($data["especialidades"] as $value) {
				$conn->query($sql . "
					VALUES (
						{$id_medico},
						{$value}
					);
				");	
			} 

		}
	
	}

	function show_medico($id){
		$conn = conn();

		$sql = "SELECT * FROM revista.medicos WHERE id_medico={$id}; ";
		$result = $conn->query($sql);

		return $result;
	}

	function update_medico($data){
		$conn = conn();

		$sql = " UPDATE revista.medicos SET
					nombre 		= \"{$data['nombre']}\",
					apellido 	= \"{$data['apellido']}\",
					correo 		= \"{$data['correo']}\",
					imagen 		= \"{$data['image_dir']}\"

				WHERE id_medico={$data['id']}; ";
		$result = $conn->query($sql);

		$sql = " DELETE FROM revista.medico_lugares WHERE id_medico={$data['id']}; ";
		$conn->query($sql);

		if ($data["lugares"]) { //si el array ligares contiene información
			$id_medico = $data["id"];	

			$sql = "INSERT INTO revista.medico_lugares (
						id_medico,
						id_lugar
					) ";

			foreach ($data["lugares"] as $value) {

				$conn->query($sql . "
					VALUES (
						{$id_medico},
						{$value}
					);
				");	

			} 

		} 

		$sql = " DELETE FROM revista.medico_especialidades WHERE id_medico={$data['id']}; ";
		$conn->query($sql);

		if ($data["especialidades"]) { //si el array ligares contiene información - hacer fix en edit para lugares y especialidades
			$id_medico = $data["id"];

			$sql = "INSERT INTO revista.medico_especialidades (
						id_medico,
						id_especialidad
					) ";

			foreach ($data["especialidades"] as $value) {
				$conn->query($sql . "
					VALUES (
						{$id_medico},
						{$value}
					);
				");	 //insert especialidad
			} 

		}

		return "ok";
	}

	function delete_medico($id){
		$conn = conn();

		$sql = " DELETE FROM revista.medico_lugares WHERE id_medico={$id}; "; //borra reclacion de medico y lugar
		$conn->query($sql);

		$sql = " DELETE FROM revista.medico_especialidades WHERE id_medico={$id}; "; //borra reclacion de medico y lugar
		$conn->query($sql);

		$sql = "DELETE FROM revista.medicos WHERE id_medico={$id};"; //borra medico
		$result = $conn->query($sql);

		while ($row = @mysqli_fetch_assoc($result)) {
			$image_del = $row["imagen"]; //para el borrado de la imgaen
		}

		return $image_del;
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