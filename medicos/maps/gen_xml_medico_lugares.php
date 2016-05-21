<?php

$id = $_GET["id"];

function parseToXML($htmlStr) { 

	$xmlStr=str_replace('<','&lt;',$htmlStr); 
	$xmlStr=str_replace('>','&gt;',$xmlStr); 
	$xmlStr=str_replace('"','&quot;',$xmlStr); 
	$xmlStr=str_replace("'",'&#39;',$xmlStr); 
	$xmlStr=str_replace("&",'&amp;',$xmlStr); 

	return $xmlStr; 
} 

// Opens a connection to a MySQL server
$connection=mysql_connect ("localhost", "root", "");
if (!$connection) {
	die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db("revista", $connection);
if (!$db_selected) {
	die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the medico_lugares joined tables with medicos and lugares
$query = "
			SELECT 
				ml.id_medico, 
				l.nombre,
				l.direccion,
				l.lat, 
				l.lng
			FROM 
				revista.medicos as m, 
				revista.lugares as l, 
				revista.medico_lugares as ml
			WHERE 
				m.id_medico = ml.id_medico and 
				l.id_lugar = ml.id_lugar and 
				ml.id_medico = {$id};
		";

$result = mysql_query($query);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}
header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
	// ADD TO XML DOCUMENT NODE
	echo '<marker ';
	echo 'name="' . parseToXML($row['nombre']) . '" ';
	echo 'address="' . parseToXML($row['direccion']) . '" ';
	echo 'lat="' . $row['lat'] . '" ';
	echo 'lng="' . $row['lng'] . '" ';
	echo '/>';
}

// End XML file
echo '</markers>';
?>