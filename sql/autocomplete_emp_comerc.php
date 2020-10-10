<?php
$accion = $_GET['accion'];

if($accion=="autocomplete"){
	$searchTerm = $_GET['term'];
	$gerencia = "Gerencia de Mercadeo y Comercialización";
	require_once("conexion_emp.php");
	$sql = "SELECT * FROM empleado WHERE 
	cedula LIKE '%$searchTerm%' AND gerencia = '$gerencia' AND statu = 'Activo' OR 
	nombre LIKE '%$searchTerm%' AND gerencia = '$gerencia' AND statu = 'Activo' OR 
	apellido LIKE '%$searchTerm%' AND gerencia = '$gerencia' AND statu = 'Activo' limit 5";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$data = utf8_encode($row['nombre'])."  ".utf8_encode($row['apellido']);
	//$data = utf8_encode($row['cargo'])
	$datos[] = $data;
	}
		
	} else {
	
	}$mysqli->close();
	echo json_encode($datos);
}

if ($accion=="cons_info") {
	

$emp = $_POST['emp'];

	$cadena = explode("  ", $emp);
	$nombre = $cadena[0]; // porción1
	$apellido =  $cadena[1]; // porción2

	$gerencia = "Gerencia de Mercadeo y Comercialización";
	require_once("conexion_emp.php");
	$sql = "SELECT * FROM empleado WHERE gerencia = '$gerencia' AND statu = 'Activo' AND 
	nombre = '$nombre' AND apellido = '$apellido'";

	$result = $mysqli->query($sql);
	$data = new stdClass();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		
		$data->result = 1;
		$data->cargo = ($row['cargo']);
		$data->ci = ($row['cedula']);
			
		} 
	}else {
	$data->result = 2;
	//echo "0 results";
	}
	echo json_encode($data);

	$mysqli->close();
	
}




?> 