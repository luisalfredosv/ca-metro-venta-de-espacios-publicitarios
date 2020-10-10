<?php
$accion = $_GET['accion'];


if($accion=="presupuesto"){
	$searchTerm = $_GET['term'];
	require_once("conexion.php");
	$sql = "SELECT codigo FROM ppto_informacion WHERE codigo LIKE '%$searchTerm%' AND estatus = '1' LIMIT 5 ";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$data = utf8_encode($row['codigo']);
	// $data = utf8_encode($row['fecha_ad']);
	$datos[] = $data;
	}
		echo json_encode($datos);
	} else {
	echo "0 results";
	}$mysqli->close();
}



if($accion=="dat_presupuesto"){
	$searchTerm = $_POST['term'];
	require_once("conexion.php");
	$sql = "SELECT a.codigo, a.cod_int, a.fecha_ad, b.cod, b.tip, b.rif FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.anunciantes AS b WHERE codigo LIKE '%$searchTerm%' AND a.cod_int = b.cod AND estatus > '1'";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	// $data = utf8_encode($row['nombre']);
	$data = utf8_encode($row['fecha_ad']);
	$data =  utf8_encode($row['tip']);
	$data =  utf8_encode($row['rif']);
	$datos[] = $data;
	}
		echo json_encode($datos);
	} else {
	//echo "0 results";
	}$mysqli->close();
}






if($accion=="presupuesto_det"){
	$searchTerm = $_GET['term'];
	require_once("conexion.php");
	$sql = "SELECT a.codigo, a.cod_int, b.cod, b.nom FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.anunciantes AS b WHERE a.cod_int = b.cod AND a.codigo LIKE '%$searchTerm%' AND a.estatus = '1' LIMIT 5 ";

// SELECT a.codigo, a.cod_int, b.cod, b.nom FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.anunciantes AS b WHERE a.cod_int = b.cod AND a.codigo LIKE '%$searchTerm%' AND a.estatus = '1' LIMIT 5 
	
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$data =utf8_encode($row['nom'])." ".utf8_encode($row['codigo']);
	// $data = utf8_encode($row['fecha_ad']);
	$datos[] = $data;
	}
		echo json_encode($datos);
	} else {
	//echo "0 results";
	}$mysqli->close();
}



if($accion=="dat_presupuesto_det"){
	$searchTerm = $_POST['term'];
	$ppto = substr(strrchr($searchTerm, "GMC"), 0);
	require_once("conexion.php");
	$sql = "SELECT a.codigo, a.cod_int, a.estatus , date_format(a.fecha_ad,'%d/%m/%Y') AS fecha, a.duracion, b.cod, b.tip, b.rif, b.tel1, b.tel2, b.cor1 FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.anunciantes AS b WHERE a.codigo = '$ppto' AND a.cod_int = b.cod AND a.estatus = '1'";
	$result = $mysqli->query($sql);
	$data = new stdClass();
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {

		$data->result = 1;

		
		$data->cod_int = utf8_encode($row['cod_int']);
		$data->fecha_ad = utf8_encode($row['fecha']);
		$data->tip = utf8_encode($row['tip']);
		$data->rif = utf8_encode($row['rif']);
		$data->tel1 = utf8_encode($row['tel1']);
		$data->tel2 = utf8_encode($row['tel2']);
		$data->cor1 = utf8_encode($row['cor1']);
		$data->lap = utf8_encode($row['duracion'])." Meses";


	}
		echo json_encode($data);
	} else {
	//echo "0 results";
	}$mysqli->close();

}




if($accion=="presupuesto_del"){
	$searchTerm = $_GET['term'];
	require_once("conexion.php");
	$sql = "SELECT a.codigo, a.cod_int, b.cod, b.nom FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.anunciantes AS b WHERE a.cod_int = b.cod AND a.codigo LIKE '%$searchTerm%' AND a.estatus != '0' LIMIT 5 ";

// SELECT a.codigo, a.cod_int, b.cod, b.nom FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.anunciantes AS b WHERE a.cod_int = b.cod AND a.codigo LIKE '%$searchTerm%' AND a.estatus = '1' LIMIT 5 
	
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$data =utf8_encode($row['nom'])." ".utf8_encode($row['codigo']);
	// $data = utf8_encode($row['fecha_ad']);
	$datos[] = $data;
	}
		echo json_encode($datos);
	} else {
	//echo "0 results";
	}$mysqli->close();
}



if($accion=="contratos"){
	$searchTerm = $_GET['term'];
	require_once("conexion.php");
	$sql = "SELECT cod_contrato FROM contratos WHERE estado='1' AND cod_contrato LIKE '%$searchTerm%' LIMIT 5";

// SELECT a.codigo, a.cod_int, b.cod, b.nom FROM espacios_publicitarios.ppto_informacion AS a, espacios_publicitarios.anunciantes AS b WHERE a.cod_int = b.cod AND a.codigo LIKE '%$searchTerm%' AND a.estatus = '1' LIMIT 5 
	
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$data =utf8_encode($row['cod_contrato']);
	// $data = utf8_encode($row['fecha_ad']);
	$datos[] = $data;
	}
		echo json_encode($datos);
	} else {
	//echo "0 results";
	}$mysqli->close();
}



if($accion=="contratos_nom"){
	$searchTerm = $_GET['term'];
	require_once("conexion.php");
	$sql = "
	SELECT a.cod_contrato, b.nom
		FROM espacios_publicitarios.contratos AS a, 
		espacios_publicitarios.anunciantes AS b
		WHERE 
		a.cod_anunciante = b.cod
		AND estado='1' 
		AND cod_contrato LIKE '%$searchTerm%' LIMIT 5";


	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	$data =utf8_encode($row['cod_contrato']." ".$row['nom']);
	$datos[] = $data;
	}
		echo json_encode($datos);
	} else {
	echo "0 results";
	}$mysqli->close();
}


if($accion=="contratos_dat"){
	$searchTerm = $_POST['term'];
	require_once("conexion.php");
	$sql = "SELECT 
	a.cod_contrato, a.cod_anunciante, a.presupuesto, date_format(a.fecha,'%d-%m-%Y')AS fecha, a.estado, a.tip_reg, a.sexo, a.nacionalidad,	a.dir_rif, a.reg_mercantil, 
	a.tip_ci, a.cedula, a.nombres, a.apellidos, a.cargo,  
	d.cod, d.nom, d.tel1, d.tel2, d.tip, d.rif, d.cor1,
    e.codigo, e.duracion, date_format(e.fecha_ad,'%d-%m-%Y')AS fecha_pre
	FROM 
	espacios_publicitarios.contratos AS a, 
	espacios_publicitarios.anunciantes AS d, 
	espacios_publicitarios.ppto_informacion AS e 
	WHERE 
	cod_contrato = '$searchTerm' AND 
	a.estado = '1' AND  
	a.cod_anunciante = d.cod AND 
	a.presupuesto = e.codigo";


	
	$data = new stdClass();

	//echo $sql;

	$result = $mysqli->query($sql);
	while($row = $result->fetch_assoc()) {

		$data->result = 1;

		$data->tip = utf8_encode($row['tip']);
		$data->rif = utf8_encode($row['rif']);
		$data->nom = utf8_encode($row['nom']);
		$data->tel1 = utf8_encode($row['tel1']);
		$data->tel2 = utf8_encode($row['tel2']);
		$data->cor1 = utf8_encode($row['cor1']);
		$data->codigo = utf8_encode($row['codigo']);
		$data->fecha_pre = utf8_encode($row['fecha_pre']);
		$data->duracion = utf8_encode($row['duracion']);

		
		$data->cod_contrato = utf8_encode($row['cod_contrato']);
		$data->cod_anunciante = utf8_encode($row['cod_anunciante']);
		$data->presupuesto = utf8_encode($row['presupuesto']);
		$data->fecha = utf8_encode($row['fecha']);
		$data->cod_anu = utf8_encode($row['cod_anunciante']);


		$data->dir_rif = ($row['dir_rif']);
		$data->reg_mercantil = ($row['reg_mercantil']);


		$data->tip_ci = utf8_encode($row['tip_ci']);
		$data->cedula = utf8_encode($row['cedula']);


		$data->nombres = utf8_encode($row['nombres']);
		$data->apellidos = utf8_encode($row['apellidos']);
		$data->cargo = utf8_encode($row['cargo']);
		$data->estado = utf8_encode($row['estado']);
		$data->tip_reg = $row['tip_reg'];

		$data->sexo = utf8_encode($row['sexo']);
		$data->nacionalidad = utf8_encode($row['nacionalidad']);


	}$mysqli->close();

	echo json_encode($data);
}
?> 