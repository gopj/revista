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

		function insert_medico($nombre, $apellido, $correo, $telefono){
			$conn = conn();
			
			$sql = "INSERT INTO revista.medicos (nombre, apellido, correo, telefono) VALUES ('{$nombre}', '{$apellido}', '{$correo}', '{$telefono}'); ";
			$conn->query($sql);


			return "ok";
		}

		function edit_medico($id){
			$conn = conn();
			
			$sql = "SELECT * FROM revista.medicos WHERE id_medico={$id}; ";
			$result = $conn->query($sql);

			return $result;
		}

		function update_medico($id, $nombre, $apellido, $correo, $telefono){
			$conn = conn();

			
			$sql = "UPDATE revista.medicos SET nombre='{$nombre}', apellido='{$apellido}', correo='{$correo}', telefono='{$telefono}' WHERE id_medico={$id}; ";

			$result = $conn->query($sql);
			
			return "ok";
		}

		function delete_medico($id){
			$conn = conn();
			
			$sql = "DELETE FROM revista.medicos WHERE id_medico={$id}; ";
			$result = $conn->query($sql);


			return $result;
		}

		
		$conn->close();
?>