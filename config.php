<?php
	//Config 
	//Usando para el path de directorios
	
	function path(){

		$arr_dir[] = explode("\\", getcwd());
		$path = $arr_dir[0][0] . "/" . $arr_dir[0][1] . "/" . $arr_dir[0][2] . "/" . $arr_dir[0][3] . "/" . $arr_dir[0][4];
		
		return 
	}

	function _pre(){
		echo "<pre>";
			print_r($result);
		echo "</pre>";
		die();
	}

?>