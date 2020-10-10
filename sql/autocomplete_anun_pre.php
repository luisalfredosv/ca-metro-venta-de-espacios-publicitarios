<?php
$accion = $_GET['accion'];

if($accion=="autocomplete"){
	$searchTerm = $_GET['term'];
	require_once("conexion.php");
	$sql = "SELECT * FROM anunciantes WHERE 
	nom LIKE '%$searchTerm%' AND est = '1' limit 5";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$data = utf8_encode($row['nom']);
	//$data = utf8_encode($row['cargo'])
	$datos[] = $data;
	}
		echo json_encode($datos);
	} else {
	//echo "0 results";
	}$mysqli->close();
}

if ($accion=="consultar") {
	
$searchTerm = $_POST['term'];

	require_once("conexion.php");
	$sql = "SELECT * FROM anunciantes WHERE 
	nom = '$searchTerm' AND est = '1'";

	$result = $mysqli->query($sql);
	$data = new stdClass();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		
		$data->result = 1;
		$data->nom = ($row['nom']);
		$data->tip = ($row['tip']);
		$data->rif = ($row['rif']);
		$data->exp = ($row['exp']);
		$data->cod_int =  ($row['cod']);
			
		} 
	}else {
	$data->result = 2;
	//echo "0 results";
	}
	echo json_encode($data);

	$mysqli->close();
	
}

if ($accion=="cons_anu") {

$searchTerm = $_POST['term'];

	require_once("conexion.php");
	$sql = "SELECT * FROM anunciantes WHERE 
	nom = '$searchTerm' AND est = '1'";

	$result = $mysqli->query($sql);
	$data = new stdClass();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		
		$data->result = 1;
		$data->nom = ($row['nom']);
		$data->tip = ($row['tip']);
		$data->rif = ($row['rif']);
		//$data->exp = ($row['exp']);
		//$data->cod_int =  ($row['cod']);
		$data->tel1 = ($row['tel1']);
		$data->tel2 = ($row['tel2']);	
		$data->cor1 = ($row['cor1']);
		} 
	}else {
	$data->result = 2;
	//echo "0 results";
	}
	echo json_encode($data);

	$mysqli->close();

}




?> 