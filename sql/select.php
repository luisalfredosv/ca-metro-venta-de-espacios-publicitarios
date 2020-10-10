<?php 

$select = $_POST['select'];

	if ($select=="tipo_rif") {

	require_once("conexion.php");
	$sql =" SELECT * FROM select_rif  order by id";
	$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
				$option="<option value=''>Elegir</option>";
			while($row = $result->fetch_assoc()) {
				$option.=utf8_encode("<option value='".$row['tipo']."'>".$row['tipo']."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}

	if ($select=="tipo_anu") {
	
	require_once("conexion.php");
	$sql =" SELECT * FROM select_tip_anu  order by cod";
	$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
				$option="<option value=''>Seleccione</option>";
			while($row = $result->fetch_assoc()) {
				$option.=utf8_encode("<option value='".$row['cod']."'>".$row['nom']."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}


	if ($select=="estaciones") {
	
	require_once("conexion.php");
	$sql =" SELECT * FROM espacios_pub  order by cod";
	$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
				$option="<option value=''>Seleccione</option>";
			while($row = $result->fetch_assoc()) {
				$option.=utf8_encode("<option value='".$row['cod']." ".utf8_decode($row['nom'])."'>".utf8_decode($row['nom'])."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}


	if ($select=="materiales") {
	
	require_once("conexion.php");
	$sql =" SELECT * FROM materiales  order by cod";
	$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
				//$option="<option value=''>Seleccione</option>";
				$option="";
			while($row = $result->fetch_assoc()) {
				$option.=utf8_encode("<option value='".$row['cod']." ".utf8_decode($row['nom'])."'>".utf8_decode($row['nom'])."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}

	if ($select=="fpago") {
	$lap_neg = $_POST['lap_neg'];
	
	require_once("conexion.php");

	if ($lap_neg <= 6) {
		$sql =" SELECT * FROM select_pago WHERE cod < '6' AND status = '1' order by cod";
	}else{
		$sql =" SELECT * FROM select_pago WHERE status = '1' order by cod";
	}
	
	$result = $mysqli->query($sql);
	$option="";
		if ($result->num_rows > 0) {
				$option="<option value=''>Seleccione</option>";
				
			while($row = $result->fetch_assoc()) {
				$option.=utf8_encode("<option value='".$row['cod']."'>".utf8_decode($row['nombre'])."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}


	if ($select=="ccuotas") {
		
	$fpago = $_POST['fpago'];
	$lap_neg = $_POST['lap_neg'];
	require_once("conexion.php");

	if ($fpago=="1" && $lap_neg=="6") {
		$sql =" SELECT * FROM select_cuotas WHERE cod <= '6' AND status = '1' order by id asc";
	}elseif($fpago=="2" && $lap_neg=="6"){
		$sql =" SELECT * FROM select_cuotas WHERE cod <= '3' AND status = '1' order by id asc";
	}elseif($fpago=="3" && $lap_neg=="6"){
		$sql =" SELECT * FROM select_cuotas WHERE cod <= '2' AND status = '1' order by id asc";
	}elseif($fpago=="1" && $lap_neg=="12"){
		$sql =" SELECT * FROM select_cuotas WHERE status = '1' order by id asc";
	}elseif($fpago=="2" && $lap_neg=="12"){
		$sql =" SELECT * FROM select_cuotas WHERE cod <= '6' AND status = '1' order by id asc";
	}elseif($fpago=="3" && $lap_neg=="12"){
		$sql =" SELECT * FROM select_cuotas WHERE cod <= '4' AND status = '1' order by id asc";
	}elseif($fpago=="6" && $lap_neg=="12"){
		$sql =" SELECT * FROM select_cuotas WHERE cod <= '2' AND status = '1' order by id asc";
	}else{
		
	}


	
	//$sql =" SELECT * FROM c_cuotas WHERE status = '1' order by id asc";
	$result = $mysqli->query($sql);
	$option="";
		if ($result->num_rows > 0) {
				$option="<option value=''>Seleccione</option>";
				
			while($row = $result->fetch_assoc()) {
				$option.=utf8_encode("<option value='".$row['cod']."'>".utf8_decode($row['nombre'])."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}



	if ($select=="lap_neg") {
	
	require_once("conexion.php");
	$sql =" SELECT * FROM select_lapso WHERE status = '1' order by id asc";
	$result = $mysqli->query($sql);
		
		$option="";
		if ($result->num_rows > 0) {
			$option="<option value=''>Seleccione</option>";

			while($row = $result->fetch_assoc()) {
				$option.=utf8_encode("<option value='".$row['cod']."'>".utf8_decode($row['nombre'])."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}



	if ($select=="cargo") {
	
	require_once("conexion.php");
	$sql =" SELECT * FROM select_cargo WHERE status = '1' order by id asc";
	$result = $mysqli->query($sql);
		
		$option="";
		if ($result->num_rows > 0) {
			$option="<option value=''>Seleccione</option>";

			while($row = $result->fetch_assoc()) {
				$option.=utf8_encode("<option value='".$row['cod']."'>".utf8_decode($row['nombre'])."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}

	if ($select=="tipo_ci") {

	require_once("conexion.php");
	$sql =" SELECT * FROM select_rif WHERE id <= '2' order by id";
	$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
				$option="";
			while($row = $result->fetch_assoc()) {
				$option.=utf8_encode("<option value='".$row['id']."'>".$row['tipo']."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}


	if ($select=="for_pag") {

	require_once("conexion.php");
	$sql =" SELECT * FROM select_for_pag order by id";
	$result = $mysqli->query($sql);
				$option="";
		if ($result->num_rows > 0) {
				$option="<option value=''>Seleccione</option>";
			while($row = $result->fetch_assoc()) {
				$option.=("<option value='".$row['id']."'>".($row['tipo'])."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}



	if ($select=="tipo_sexo") {

	require_once("conexion.php");
	$sql =" SELECT * FROM select_sexo order by id";
	$result = $mysqli->query($sql);
				$option="";
		if ($result->num_rows > 0) {
				$option="<option value=''>Seleccione</option>";
			while($row = $result->fetch_assoc()) {
				$option.=("<option value='".$row['cod']."'>".($row['nombre'])."</option>");
			}
		} else {
			//echo "0 results";
		}$mysqli->close();

	echo json_encode($option);
	}
?>