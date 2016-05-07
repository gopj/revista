<?php
		$conn = conn();
		// This function is used to create connections to the DB
		function conn() {
			$servername = "localhost";
			$username = "root";
			$password = "";

			// Create connection
			$conn = new mysqli($servername, $username, $password);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

			return $conn;
		}

		// This function return all the results from table resultados, concurso > 11032
		function medicos_all_results() {
			$conn = conn();

			$sql = "SELECT * FROM revista.medicos; ";
			$result = $conn->query($sql);

			return $result;

		}

		function insert_medico($nombre, $apellido, $correo, $telefono, $direccion, $lat, $lng, $image){
			$conn = conn();

			$sql = "INSERT INTO revista.medicos (
						nombre,
						apellido,
						correo,
						telefono,
						direccion,
						lat,
						lng,
						imagen
					)

					VALUES (
						'{$nombre}',
						'{$apellido}',
						'{$correo}',
						'{$telefono}',
						'{$direccion}',
						{$lat},
						{$lng},
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

		function update_medico($id, $nombre, $apellido, $correo, $telefono, $direccion, $lat, $lng, $image){
			$conn = conn();


			$sql = " UPDATE revista.medicos SET
						nombre 		= '{$nombre}',
						apellido 	= '{$apellido}',
						correo 		= '{$correo}',
						telefono 	= '{$telefono}',
						direccion 	= '{$direccion}',
						lat 		= {$lat},
						lng 		= {$lng},
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

		function getLat($id){
			$conn = conn();

			$lat = 0;

			$sql = " SELECT lat FROM revista.medicos WHERE id_medico={$id}; ";
			$result = $conn->query($sql);

			while ($row = mysqli_fetch_assoc($result)) {
				$lat = $row["lat"];
			}

			return round($lat, 10); //decimal
		};

		function getLng($id){
			$conn = conn();

			$lng = 0;

			$sql = " SELECT lng FROM revista.medicos WHERE id_medico={$id}; ";
			$result = $conn->query($sql);

			while ($row = mysqli_fetch_assoc($result)) {
				$lng = $row["lng"];
			}

			return round($lng, 10); //decimal
		};

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


		$conn->close();
?>