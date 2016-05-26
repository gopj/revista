<?php
	
	function lugares_all_results() {
		$conn = conn();

		$sql = "SELECT * FROM revista.lugares; ";
		$result = $conn->query($sql);

		return $result;

	}

	function insert_lugar($nombre, $telefono, $direccion, $lat, $lng){
		$conn = conn();

		$sql = "INSERT INTO revista.lugares (
					nombre,
					telefono,
					direccion,
					lat,
					lng
				)

				VALUES (
					'{$nombre}',
					{$telefono},
					'{$direccion}',
					{$lat},
					{$lng}
				);

			   ";

		$conn->query($sql);

		return "ok";
	}

	function show_lugar($id){
		$conn = conn();

		$sql = "SELECT * FROM revista.lugares WHERE id_lugar={$id}; ";
		$result = $conn->query($sql);

		return $result;
	}

	function update_lugar($id, $nombre, $telefono, $direccion, $lat, $lng){
		$conn = conn();


		$sql = " UPDATE revista.lugares SET
					nombre 		= '{$nombre}',
					telefono 	= '{$telefono}',
					direccion 	= '{$direccion}',
					lat 		= {$lat},
					lng 		= {$lng}

				WHERE id_lugar={$id}; ";

		$result = $conn->query($sql);

		return "ok";
	}

	function delete_lugar($id){
		$conn = conn();

		$sql = "DELETE FROM revista.lugares WHERE id_lugar={$id}; ";
		$conn->query($sql);

		$sql = " DELETE FROM revista.medico_lugares WHERE id_lugar={$id}; ";
		$conn->query($sql);

		return $result;
	}

	function get_lugar_lat($id){
		$conn = conn();

		$lat = 0;

		$sql = " SELECT lat FROM revista.lugares WHERE id_lugar={$id}; ";
		$result = $conn->query($sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$lat = $row["lat"];
		}

		return round($lat, 10); //decimal
	};

	function get_lugar_lng($id){
		$conn = conn();

		$lng = 0;

		$sql = " SELECT lng FROM revista.lugares WHERE id_lugar={$id}; ";
		$result = $conn->query($sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$lng = $row["lng"];
		}

		return round($lng, 10); //decimal
	};


	function get_lugar_name($id){
		$conn = conn();

		$name = "";

		$sql = " SELECT nombre FROM revista.lugares WHERE id_lugar={$id}; ";
		$result = $conn->query($sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$name = $row["nombre"];
		}

		return $name;
	};

	function get_places($id){
		$conn = conn();

		$sql = "
				SELECT 
					ml.id_medico, 
					l.nombre,
					l.direccion,
					l.telefono,
					l.lat, 
					l.lng,
					ml.id_lugar
				FROM 
					revista.medicos as m, 
					revista.lugares as l, 
					revista.medico_lugares as ml
				WHERE 
					m.id_medico = ml.id_medico and 
					l.id_lugar = ml.id_lugar and 
					ml.id_medico = {$id}; 
			   ";
		$result = $conn->query($sql);

		return $result;
	};

?>