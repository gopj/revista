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

		function insert($nombre, $apellido, $correo, $telefono){
			$conn = conn();
			
			$sql = "INSERT INTO revista.medicos (nombre, apellido, correo, telefono) VALUES ('{$nombre}', '{$apellido}', '{$correo}', '{$telefono}'); ";
			$conn->query($sql);


			return "ok";
		}

		function update($id, $nombre, $apellido, $correo, $telefono){
			$conn = conn();

			
			$sql = "UPDATE revista.medicos SET nombre='{$nombre}', apellido='{$apellido}', correo='{$correo}', telefono='{$telefono}' where id_medico={$id}; ";
			$result = $conn->query($sql);


			return "ok";
		}

		function edit($id){
			$conn = conn();
			
			$sql = "SELECT * FROM revista.medicos where id_medico={$id}; ";
			$result = $conn->query($sql);


			return $result;
		}

		
		$conn->close();
?>