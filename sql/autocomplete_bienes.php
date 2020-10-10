<?php
$dat = $_GET['dat'];
$searchTerm = $_GET['term'];

//$cod_are = utf8_encode($cod_are);

require_once("conexion.php");
$sql = "SELECT cod FROM bienes WHERE cod LIKE '%$searchTerm%' AND cod_are='$dat' AND est ='1' LIMIT 18 ";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$data = utf8_encode($row['cod']);
	$datos[] = $data;
	}
		echo json_encode($datos);
} else {
	//echo "0 results";
}$mysqli->close();

?> 