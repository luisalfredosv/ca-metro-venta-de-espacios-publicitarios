<?php 
$accion =  isset($_POST['accion']) ?  $_POST['accion'] :  $_GET['accion'];


if ($accion=="anunciante") {
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
}






if ($accion=="buscar") {
	$cod = $_POST['cod'];
	// $cod = base64_decode($cod);
	// $cod = intval(preg_replace('/[^0-9]+/', '', $cod), 10);	


	require_once("conexion.php");
	$data = new stdClass();
	$sql = "SELECT *
			FROM anunciantes
			WHERE cod='$cod'";
	if ($cod!="") {
		if($resultado = $mysqli->query($sql)) {
			$row_cnt = mysqli_num_rows($resultado);
			if ($row_cnt> 0){
			
				while($row = $resultado->fetch_array()) {
					$data = new stdClass();
					$data->result = 1;
					$data->cod = utf8_encode($row['cod']);
					$data->nom = utf8_encode($row['nom']);
					$data->dir = utf8_encode($row['dir']);

					$data->tip_anu = utf8_encode($row['tip_anu']);
					
					$data->tel1 = utf8_encode($row['tel1']);
					$data->tel2 = utf8_encode($row['tel2']);

					$data->tip = utf8_encode($row['tip']);
					$data->rif = utf8_encode($row['rif']);
					$data->cor1 = utf8_encode($row['cor1']);
					$data->cor2 = utf8_encode($row['cor2']);
					$data->cor3 = utf8_encode($row['cor3']);
					$data->ddc = utf8_encode($row['ddc']);
					$data->tdc = utf8_encode($row['tdc']);
					$data->est = utf8_encode($row['est']);

					$data->tip_anu = utf8_encode($row['tip_anu']);
					$data->cdc = utf8_encode($row['cdc']);
					$data->exp = utf8_encode($row['exp']);
					
				}

			}else{

				$data->result = 2;
				$data->cod =  $cod;
			}
		

		}
			
	}else{
		$data->result = 3;
	}
echo json_encode($data);
}



if ($accion=="guardar") {

	$cod = $_POST['cod'];
	$nom = $_POST['nom'];
	$dir = $_POST['dir'];
	$tel1 = $_POST['tel1'];
	$tel2 = $_POST['tel2'];
	$tip = $_POST['tip'];
	$rif = $_POST['rif'];
	$cor1 = $_POST['cor1'];
	$cor2 = $_POST['cor2'];
	$cor3 = $_POST['cor3'];
	$ddc = $_POST['ddc'];
	$tdc = $_POST['tdc'];
	$est = $_POST['est'];

	$tip_anu = $_POST['tip_anu'];
	$cdc = $_POST['cdc'];
	$exp = $_POST['exp'];


	if ($cod!="" && $nom!="" && $dir!="" && $tel1!="" && $tip!="" && $rif!="" && $cor1!="" && $ddc!="" && $tdc!="" && $est!="" && $tip_anu!="" && $cdc!="" && $exp!="") {

		require_once("conexion.php");
		$query ="INSERT INTO anunciantes (cod, nom, dir, tel1, tel2, tip, rif, cor1, cor2, cor3, ddc, tdc, est, tip_anu, cdc, exp) 
		VALUES ('$cod','$nom','$dir','$tel1','$tel2','$tip','$rif','$cor1','$cor2','$cor3','$ddc','$tdc','$est', '$tip_anu', '$cdc', '$exp')";

			$data = new stdClass();
			
			if ($mysqli->query($query) === TRUE) {
			$data->result = 1;
			
			} else {
			$error=$mysqli->errno;
			$data->result = 2;
			$data->error = $error;
			}
			echo json_encode($data);
			$mysqli->close();
		
	}else{

		$data = new stdClass();
		$data->result = 3;
		echo json_encode($data);
		$mysqli->close();	
	}
}



if ($accion=="actualizar") {

	$cod = $_POST['cod'];
	// $nom = $_POST['nom'];
	// $dir = $_POST['dir'];
	$tel1 = $_POST['tel1'];
	$tel2 = $_POST['tel2'];
	// $rif = $_POST['rif'];
	$tip_anu = $_POST['tip_anu'];
	$cor1 = $_POST['cor1'];
	$cor2 = $_POST['cor2'];
	$cor3 = $_POST['cor3'];
	$ddc = $_POST['ddc'];
	$tdc = $_POST['tdc'];
	$est = $_POST['est'];
	$cdc = $_POST['cdc'];

		if ($cod!="" && $tel1!="" && $cor1!="" && $ddc!="" && $tdc!="" && $est!="" && $cdc!="" && $tip_anu!="") {

			require_once('conexion.php');
			$query = "UPDATE anunciantes
			SET 
			tel1='$tel1',
			tel2='$tel2',
			cor1='$cor1',
			cor2='$cor2', 
			cor3='$cor3',
			ddc='$ddc',
			tdc='$tdc',
			est='$est',
			cdc='$cdc',
			tip_anu='$tip_anu'
			WHERE cod='$cod'";		
		
			$data = new stdClass();		
			if ($mysqli->query($query) === TRUE) {
				$data->result = 1;
				$data->sql=$query;
			} else {
				$data->result = 2;
			}
			$mysqli->close();
			echo json_encode($data);
		}else{

			$data = new stdClass();
			$data->result = 3;
			echo json_encode($data);
			$mysqli->close();	
		}
}

if ($accion=="cod_reg") {
		include ('conexion.php');
		$sql2 = "SELECT MAX(cod) as cod FROM anunciantes WHERE 1";
		//$cod = isset($_REQUEST['cod']) ? $_REQUEST['cod'] : NULL;
	if ($resultado2 = $mysqli->query($sql2)) {
		$data = new stdClass();
	   
	    while ($row2 = $resultado2->fetch_array()) {
	    $hi=$row2['cod'];
	    $hi=intval(preg_replace('/[^0-9]+/', '', $hi), 10); 
		$hi=$hi+1;
		$hi=str_pad($hi, 5, "0", STR_PAD_LEFT );
		$hi="A"."-".$hi;
		$data->codigo = $hi;
		
	    }

		echo json_encode($data);
	    //$resultado->close();
	}

}



?>