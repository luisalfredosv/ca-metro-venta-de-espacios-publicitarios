<?php

$searchTerm = $_GET['term'];
require_once("conexion.php");
$sql = "SELECT * FROM anunciantes WHERE cod LIKE '%$searchTerm%' OR nom LIKE '%$searchTerm%' limit 5";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$data = utf8_encode($row['cod'])." | ".utf8_encode($row['nom']);
	$datos[] = $data;
	}
		echo json_encode($datos);
} else {
	//echo "0 results";
}$mysqli->close();

?> 