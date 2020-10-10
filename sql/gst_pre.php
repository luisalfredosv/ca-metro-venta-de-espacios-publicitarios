<?php 

// DATOS DE PRUEBA DEL SISTEMA
// 
// 
// 
// $accion = 	"g_presupuesto";
// $cod = 	"GMC-MV-PPTO-00001-2018";
// $fecha = 	"07/11/2018";
// $lap_neg = 	"6";
// $obs = 	"";
// $imp_let = 	"Nueve Mil Con Cero Bolívares";
// $tab_pre = 	'[{"n":"1","ubic":"Est.+Monumental","codi":"CI-MON-AND-01","cant":"1","desc":"Cartelera+Institucional","mate":"Vinil","pre":"1.500,00","meeh":"6","tota":"9.000,00"}]';
// $tab_pag = 	'[{"id":"1","concpt":"Cuota+1+de+4","monto_c":"2.250,00","monto_r":"6.750,00","fecha_p":"7-11-2018"},{"id":"2","concpt":"Cuota+2+de+4","monto_c":"2.250,00","monto_r":"4.500,00","fecha_p":"7-12-2018"},{"id":"3","concpt":"Cuota+3+de+4","monto_c":"2.250,00","monto_r":"2.250,00","fecha_p":"7-1-2019"},{"id":"4","concpt":"Cuota+4+de+4","monto_c":"2.250,00","monto_r":"0,00","fecha_p":"7-2-2019"}]';
// $fech_inic = 	"07/11/2018";
// $fpago = 	"1";
// $cuotas = 	"4";
// $elab_by = 	"13533084";
// $revi_by = 	"14277541";
// $apro_by = 	"14277541";
// $cod_int = 	"A-00001";
// $sub_total = 	"9.000,00";
// $porcentaje = 	"0";
// $descuento = 	"0,00";
// $montototal = 	"9.000,00";
// $import_cuo = 	"Dos Mil Doscientos Cincuenta Con Cero Bolívares";
// $inic_mont = 	"0";
// $json_pres = $tab_pre;
// $json_pago = $tab_pag;
// 
// 
// 
// FIN DE DATOS DE PRUEBA



$accion = $_POST['accion'];

$error_det = "";
$error_cuo = "";
$error_inf = "";
$error_bie = "";

$insert_detalles = 0;
$insert_cuotas = 0;
$insert_informacion = 0;
$update_bienes = 0;

if ($accion=="buscar_bien") {

$bien = $_POST['bien'];

	require_once("conexion.php");
	$data = new stdClass();
	$sql = "SELECT *
			FROM bienes
			WHERE cod='$bien'";
	if ($bien!="") {
		if($resultado = $mysqli->query($sql)) {
			$row_cnt = mysqli_num_rows($resultado);
			if ($row_cnt> 0){
			
				while($row = $resultado->fetch_array()) {
					$data = new stdClass();
					$data->result = 1;
					$data->anc = utf8_encode($row['anc']);
					$data->alt = utf8_encode($row['alt']);
					$data->desc = utf8_encode($row['desc']);
				}

			}else{

				$data->result = 2;
			}
		

		}
			
	}else{
		$data->result = 3;
	}
echo json_encode($data);

}


if ($accion=="gen_cod") {

	$anio=date("Y");
	require_once("conexion.php");
	$data = new stdClass();

	$sql = "SELECT codigo
			FROM ppto_informacion
			ORDER BY codigo ASC";

	if($resultado = $mysqli->query($sql)) {
		$row_cnt = mysqli_num_rows($resultado);
		$data = new stdClass();
		if ($row_cnt> 0){

			while($row = $resultado->fetch_array()) {
				$cod_int = $row['codigo'];

				// $cod = intval(preg_replace('/[^0-9]+/', '', $cod), 10); 
				// $cod=$cod+1;
				// $cod=str_pad($cod, 5, "0", STR_PAD_LEFT );
				
				$cod = substr($cod_int, 12, -5)+1;
				$res = substr($cod_int, 4);
				$cod=str_pad($cod, 5, "0", STR_PAD_LEFT);
				$gen_cod="GMC-MV-PPTO-".$cod."-".$anio;
				$data->result = 1;
				$data->cod = utf8_encode($gen_cod);
			}

		}else{
			$gen_cod="GMC-MV-PPTO-00001-".$anio;
			$data->result = 1;
			$data->cod = utf8_encode($gen_cod);
		}

	echo json_encode($data);
	}
}




if ($accion=="g_presupuesto") {


	$cod = $_POST['cod'];
	$fecha=substr($_POST['fecha'],6,4)."-".substr($_POST['fecha'],3,2)."-".substr($_POST['fecha'],0,2);
	$lap_neg = $_POST['lap_neg'];
	// $rif = $_POST['rif'];
	$obs = $_POST['obs'];
	$imp_let = $_POST['imp_let'];
	$import_cuo = $_POST['import_cuo'];


	$json_pres = $_POST['tab_pre'];
	$json_pago = $_POST['tab_pag'];
	$fech_inic=substr($_POST['fech_inic'],6,4)."-".substr($_POST['fech_inic'],3,2)."-".substr($_POST['fech_inic'],0,2);
	$fpago = $_POST['fpago'];
	$cuotas = $_POST['cuotas'];
	$elab_by = $_POST['elab_by'];
	$apro_by = $_POST['apro_by'];
	$revi_by = $_POST['revi_by'];
	$cod_int = $_POST['cod_int'];

	$porcentaje = $_POST['porcentaje'];
	$descuento = $_POST['descuento'];

	$sub_total = $_POST['sub_total'];
	$montototal = $_POST['montototal'];
	$inic_mont =  $_POST['inic_mont'];


	//$descuento = substr($descuento, 5);
	$descuento = str_replace(".", "", $descuento);
	$descuento = str_replace(",", ".", $descuento);

	//$sub_total = substr($sub_total, 5);
	$sub_total = str_replace(".", "", $sub_total);
	$sub_total = str_replace(",", ".", $sub_total);

	//$montototal = substr($montototal, 5);
	$montototal = str_replace(".", "", $montototal);
	$montototal = str_replace(",", ".", $montototal);

	// monto de inicial
	$inic_mont = str_replace(".", "",$inic_mont);
	$inic_mont = str_replace(",", ".", $inic_mont);


	//$data = new stdClass();
	require_once("conexion.php");
	if ($mysqli->ping()) {
	    $insertpres = 1;
	} else {
		$insertpres = 0;

		$error=$mysqli->errno;
		$data->result = 2;
		$data->error = $error;
	}



	// PRESUPUESTO
	if($insertpres == 1){
		$array_presupuesto = json_decode($json_pres);
		$n = 0;
		for($i=0;$i<count($array_presupuesto);$i++){
		    $n = $n + 1;
		    $item = $array_presupuesto[$i]->n;
		    $ubic = $array_presupuesto[$i]->ubic;
		    $cod_bien = $array_presupuesto[$i]->codi;
		    $cantidad = $array_presupuesto[$i]->cant;
		    $descripcion = $array_presupuesto[$i]->desc;
		    $material = $array_presupuesto[$i]->mate;
		    $montoxmes = $array_presupuesto[$i]->pre;
		    $meses = $array_presupuesto[$i]->meeh;
		    $total = $array_presupuesto[$i]->tota;

			// $montoxmes = substr($montoxmes, 5);
			$montoxmes = str_replace(".", "", $montoxmes);
			$montoxmes = str_replace(",", ".", $montoxmes); 

			// $total = substr($total, 5);
			$total = str_replace(".", "", $total);
			$total = str_replace(",", ".", $total);

		  require_once("conexion.php");
		  $query_pre ="INSERT INTO ppto_detalles (codigo, item, ubicacion, cod_bien, cantidad, descripcion, material, montoxmes, meses, total, estatus) 
		  VALUES ('$cod','$item','$ubic','$cod_bien','$cantidad','$descripcion','$material','$montoxmes','$meses','$total','1')";

		    //$data = new stdClass();
		    if ($mysqli->query($query_pre) === TRUE) {
		    // $data->result = 1;

		    $inset_ppto = 1;



			// $quer6 = "UPDATE bienes
			// SET 
			// est = '3'
			// WHERE cod='$cod_bien'";		

			// if ($cod_bien != "") {
			// 	if ($mysqli->query($quer6) === TRUE) {
			// 		//$data->result = 3;   //OK

			// 		//$update_bien_ant =  1;
			// 	} else {
			// 		//$data->result = 4; 	 //ERROR
			// 	}
				
			// }


		    
		    } else {
		    $inset_ppto = 0;
		     $error_det=$mysqli->errno;
		    // $data->result = 22;
		    //$data->sql = $array_presupuesto;//$query_pre;
		    // $data->error = $error;

		    }
		  // echo json_encode($data);

		}

		
	}

	// PAGO 
	if($inset_ppto == 1){
		$array_pago = json_decode($json_pago);
		$n = 0;
		for($i=0;$i<count($array_pago);$i++){

		    $n = $n + 1;
		    $item = $array_pago[$i]->id;
		    $concpt = $array_pago[$i]->concpt;
		    $monto_c = $array_pago[$i]->monto_c;
		    $monto_r = $array_pago[$i]->monto_r;
		    $fecha_p = $array_pago[$i]->fecha_p;

			// $monto_c = substr($monto_c, 5);
			$monto_c = str_replace(".", "", $monto_c);
			$monto_c = str_replace(",", ".", $monto_c);

			// $monto_r = substr($monto_r, 5);
			$monto_r = str_replace(".", "", $monto_r);
			$monto_r = str_replace(",", ".", $monto_r);


		  require_once("conexion.php");
		  $query_pag ="INSERT INTO ppto_cuotas (cod, item, concepto, mcuota, mrest, mesdpago, estatus) 
		  VALUES ('$cod','$item','$concpt','$monto_c','$monto_r',STR_TO_DATE('$fecha_p', '%d-%m-%Y'),'1')";

		    //$data = new stdClass();
		    if ($mysqli->query($query_pag) === TRUE) {
		    // $data->result = 1;

		   	$insert_cuotas = 1;

		    } else {
		    $insert_cuotas = 0;

		    $error_cuo=$mysqli->errno;
		    // $data->result = 33;
		    // $data->error = $error;
		    }
		    //echo json_encode($data);

		}
	}




if ($insert_cuotas == 1) {
$array_bien = json_decode($json_pres);

	$n = 0;
	for($i=0;$i<count($array_presupuesto);$i++){
  		$cod_bien = $array_presupuesto[$i]->codi;

			require_once('conexion.php');
			$quer = "UPDATE bienes
			SET 
			est = '3'
			WHERE cod='$cod_bien'";		

			if ($cod_bien != "") {
				if ($mysqli->query($quer) === TRUE) {
					$update_bienes = 1;
					//$data->resul = 1; // save
				} else {
					//$data->resul = 2; // error
					$error_bie=$mysqli->errno;
					$update_bienes = 2;
				}
			}else{
				$update_bienes = 2;
			}
				
				//$mysqli->close();



	}
 		//cod 	 	est
		//echo json_encode($data);
}



	// DETALLES
	if ($update_bienes == 1) {

	  	  require_once("conexion.php");
		  $query_det ="INSERT INTO ppto_informacion 
		  (codigo, fecha_ad, duracion, cod_int, sub_total, p_desc, descuento, 
		  total, import_let, fecha_in, forma_pago, n_cuotas, mont_cuotas, import_cuo, elab_by, revi_by, apro_by, estatus, inic_mont) 
		  VALUES ('$cod','$fecha','$lap_neg','$cod_int','$sub_total','$porcentaje','$descuento',
		  '$montototal','$imp_let','$fech_inic','$fpago','$cuotas','$monto_c','$import_cuo','$elab_by','$revi_by','$apro_by','1', '$inic_mont')";

		  	//$data = new stdClass();
		    if ($mysqli->query($query_det) === TRUE) {
		    //$data->result = 1;
		   // $data->codigo = $cod;
		    $insert_informacion = 1;
// insertpago
// insertdetalles
		    } else {

		   $error_inf=$mysqli->errno;
		   // $data->result = 44;
		    //$data->error = $error;
		    $insert_informacion = 2;
		    }
		   // echo json_encode($data);

	}

// echo "insert detalles". $inset_ppto ."<br>";
// echo "insert cuotas". $insert_cuotas  ."<br>";
// echo "insert informacion". $insert_informacion ."<br>";
// echo "update bien". $update_bienes ."<br>";


// echo "Error detalles ".$error_det ."<br>";
// echo "Error cuotas".$error_cuo ."<br>";
// echo "Error informacion".$error_inf ."<br>";
// echo "Error bien".$error_bie."<br>";

	$data = new stdClass();

	if ($inset_ppto == 1 AND $insert_cuotas == 1 AND $insert_informacion == 1 AND $update_bienes == 1) {

		 $data->codigo = $cod;
		 $data->result = 1;
		
		//echo "Guardo fino";
	}else{

		$borradoporerrores = 0;

		
		require_once("conexion.php");
		$sql1 = "DELETE FROM ppto_detalles WHERE codigo = '$cod'";

			if ($mysqli->query($sql1) === TRUE) {
			   $borradoporerrores = $borradoporerrores + 1;
			} else {
			    echo "Error deleting record: ppto_detalles";
			}
		

		
		require_once("conexion.php");
		$sql2 = "DELETE FROM ppto_cuotas WHERE cod = '$cod'";

			if ($mysqli->query($sql2) === TRUE) {
			    $borradoporerrores = $borradoporerrores + 1;
			} else {
			    echo "Error deleting record: ppto_cuotas";
			}
		

		
		require_once("conexion.php");
		$sql3 = "DELETE FROM ppto_informacion WHERE codigo = '$cod'";

			if ($mysqli->query($sql3) === TRUE) {
			    $borradoporerrores = $borradoporerrores + 1;
			} else {
			    echo "Error deleting record: ppto_informacion";
			}
		

		
		$array_bien = json_decode($json_pres);

			$n = 0;
			for($i=0;$i<count($array_presupuesto);$i++){

		  		$cod_bien = $array_presupuesto[$i]->codi;


					require_once('conexion.php');
					$quer = "UPDATE bienes
					SET 
					est = '1'
					WHERE cod='$cod_bien'";		

					if ($cod_bien != "") {
						if ($mysqli->query($quer) === TRUE) {
								$borradoporerrores = $borradoporerrores + 1;
						} else {
								echo "Error deleting record: bienes";
						}
						
					}else{
						
					}


			}
		


		// $data->borradoporerrores = $borradoporerrores;
		// $data->result = 2;
		if ($borradoporerrores==4) {
			//echo "Finalizo el preoceso de eliminacion de datos";
			$data->codigo = "";
		 	$data->result = 2;
		}else{
			echo "Error en el limpiado de los datos";
			$data->codigo = "";
		 	$data->result = 3;
		}
		
	}

	echo json_encode($data);

}



if ($accion=="eliminar_ppto") {
	$ppto = $_POST['ppto'];
	$data = new stdClass();
	$update_ppto_det = 0;
	$update_ppto_inf = 0;
	$update_ppto_cuo = 0;
	$update_ppto_bie = 0;


	$sql = "SELECT presupuesto FROM contratos WHERE  presupuesto = '$ppto'";
	require_once("conexion.php");
	if($resultado = $mysqli->query($sql)) {
		$row_cnt = mysqli_num_rows($resultado);
			if ($row_cnt > 0) {
				$data->result = 2;
				// while($row = $resultado->fetch_array()) {
				// }
			}else{
		
		require_once("conexion.php");
				$quer8 = " UPDATE ppto_detalles SET estatus = '0' WHERE codigo = '$ppto'";		

					if ($mysqli->query($quer8) === TRUE) {
						$update_ppto_det = 1;
					} else {
						$data->result = "fail sql 8";
					}

				if ($update_ppto_det == 1) {
					require_once("conexion.php");
					$quer9 = "UPDATE ppto_informacion SET estatus = '0' WHERE codigo = '$ppto'";		

						if ($mysqli->query($quer9) === TRUE) {
							$update_ppto_inf = 1;
						} else {
							$data->result = "fail sql 9";
						}
				}

				if ($update_ppto_inf == 1) {
					require_once("conexion.php");
					$quer10 = "UPDATE ppto_cuotas SET estatus = '0' WHERE cod = '$ppto'";		

						if ($mysqli->query($quer10) === TRUE) {
							$update_ppto_cuo = 1;
						} else {
							$data->result = "fail sql 10";
						}
				}


				if ($update_ppto_cuo == 1) {
					require_once("conexion.php");
					$sql11 = "SELECT cod_bien FROM ppto_detalles WHERE codigo = '$ppto'";
					if($resultado11 = $mysqli->query($sql11)) {
						$row_cnt11 = mysqli_num_rows($resultado11);
						if ($row_cnt11> 0){

						
							while($row11 = $resultado11->fetch_array()) {
								$cod_bien = $row11["cod_bien"];
								require_once("conexion.php");
								$quer12 = "UPDATE bienes
								SET 
								est = '1'
								WHERE cod='$cod_bien'";		

								if ($mysqli->query($quer12) === TRUE) {
									$update_ppto_bie = 1;
								} else {
									$data->result = "fail sql 12";
								}
							}
						}
					}else{
						$data->result = "fail sql 11";
					}
				}


				if ($update_ppto_det == 1 && $update_ppto_inf == 1 && $update_ppto_cuo == 1 && 	$update_ppto_bie == 1) {
					$data->result = 1;
				}else{
					$data->result = 2;
				}

			}
			
	
	}

	echo json_encode($data);
}

?>