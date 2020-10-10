<?php 

// $accion="actualizar_contrato";
// $presupuesto="GMC-MV-PPTO-0000-2018";
// $fec_con="07-11-2018";
// $cod_con="CJ-AEPC-18-001";
// $cod_int="A-00001";
// $reg_mercantil="inscrita ante la oficina del Registro Mercantil Segundo del estado Carabobo, en fecha 00 de enero del año 0000, bajo el N° 0, Tomo 000-A 000";
// $dir_rif="avenida Montes de Oca Nivel PB Local 000 Centro de Valencia Carabobo Zona Postal 0000, Municipio Valencia, del Estado Carabobo ";
// $tip_ci="1";
// $cedula="555555";
// $nombres="Nombre Nombres";
// $apellidos="Apellido Apellidos";
// $cargo="3";
// $pres_ant="GMC-MV-PPTO-00001-2018";
// $tip_reg="1";
// $estado="1";
// $sexo="M";
// $nacionalidad="boliviana";


$accion =  isset($_POST['accion']) ?  $_POST['accion'] :  $_GET['accion'];

if ($accion=="consultar_disp_cod") {
	$cod_con = $_POST['cod_con'];

	require_once("conexion.php");
	$sql = "SELECT cod_contrato FROM contratos WHERE cod_contrato = '$cod_con' AND estado = '1'";

	$result = $mysqli->query($sql);
	$data = new stdClass();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$data->result = 1;
		} 

	}else{
	$data->result = 2;
	}

	echo json_encode($data);
	$mysqli->close();
	
}
  

if ($accion=="nacionalidad") {

	$searchTerm = $_GET['term'];
	require_once("conexion.php");
	$sql = "SELECT nombre FROM nacionalidades WHERE nombre LIKE '%$searchTerm%' limit 5";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		$data = ($row['nombre']);
		$datos[] = $data;
		}
			echo json_encode($datos);
	} else {
		//echo "0 results";
	}$mysqli->close();

} 

if ($accion=="guardar_contrato") {

$cod_con = $_POST['cod_con'];
$result1 =  isset($_REQUEST['result1']) ?  $_REQUEST['result1'] : NULL;
$result2 =  isset($_REQUEST['result2']) ?  $_REQUEST['result2'] : NULL;
$result3 =  isset($_REQUEST['result3']) ?  $_REQUEST['result3'] : NULL;
$result4 =  isset($_REQUEST['result4']) ?  $_REQUEST['result4'] : NULL;
$result5 =  isset($_REQUEST['result5']) ?  $_REQUEST['result5'] : NULL;


$cod_int = $_POST['cod_int'];
$fec_con = $_POST['fec_con'];
$estado = $_POST['estado'];

$dir_rif = $_POST['dir_rif'];
$reg_mercantil = $_POST['reg_merc'];

$tip_ci = $_POST['tipo'];
$cedula = $_POST['cedula'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cargo = $_POST['cargo'];
$tip_reg = $_POST['tip_reg'];

$nacionalidad = $_POST['nacionalidad'];
$sexo = $_POST['sexo'];

$data = new stdClass();
if ($cod_con != "") {




$presupuesto = substr(strrchr($_POST['presupuesto'], "GMC"), 0);
//$presupuesto = ['presupuesto'];

	  require_once("conexion.php");

$query_pre1 ="INSERT INTO contratos (
cod_contrato ,cod_anunciante, presupuesto, dir_rif, reg_mercantil, estado, tip_ci,	cedula,	nombres, apellidos, cargo, fecha, tip_reg, nacionalidad, sexo) 
VALUES (
'$cod_con', '$cod_int', '$presupuesto', '$dir_rif', '$reg_mercantil','$estado', '$tip_ci', '$cedula', '$nombres', '$apellidos', '$cargo', STR_TO_DATE('$fec_con', '%d-%m-%Y'), '$tip_reg', '$nacionalidad', '$sexo')";

	    if ($mysqli->query($query_pre1) === TRUE) {

	    	$result1 = 1; //OK
	    	
	    
	    } else {

		    $result1 = 11; //ERROR


	    }

}


if ($result1 == 1) {   // Inactiva los presupuestos para que no sean asignados a contratos
			require_once('conexion.php');
			$query = "UPDATE ppto_informacion
			SET 
			estatus='2'
			WHERE codigo='$presupuesto'";		
		
			
			if ($mysqli->query($query) === TRUE) {


			$sql8 ="SELECT codigo, cod_bien 
			FROM ppto_detalles 
			WHERE codigo = '$presupuesto'";

			require_once("conexion.php");
			if($res8 = $mysqli->query($sql8)) {
				$row_cnt8 = mysqli_num_rows($res8);
				if ($row_cnt8> 0){
					while($row8 = $res8->fetch_array()) {
						$cod_bien = $row8["cod_bien"] ;

						$quer9 = "UPDATE bienes
						SET 
						est = '2'
						WHERE cod='$cod_bien'";		

						if ($cod_bien != "") {
							if ($mysqli->query($quer9) === TRUE) {
								$data->result = 4;
								$data->cod_con = $cod_con;
							} else {
								$data->result = 4444; 	 //ERROR
							}
							
						}

					}

				}	

			}

			} else {
				$data->result = 44;
			}
			$mysqli->close();	
}else{

	$data->result = 444;
}




echo json_encode($data);

}






if ($accion=="actualizar_contrato") {

$presupuesto = substr(strrchr($_POST['presupuesto'], "GMC"), 0); // Codigo de presupuesto
//$presupuesto = ['presupuesto'];
$cod_con = $_POST['cod_con'];   // Codigo de contrato
$pres_ant = $_POST['pres_ant']; // Presupuesto guardado en base de datos

$fec_con = $_POST['fec_con']; 
$estado = $_POST['estado'];   

$dir_rif = $_POST['dir_rif'];
$reg_mercantil = $_POST['reg_merc'];

$tip_ci = $_POST['tipo'];
$cedula = $_POST['cedula'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cargo = $_POST['cargo'];

$tip_reg = $_POST['tip_reg'];

$nacionalidad = $_POST['nacionalidad'];
$sexo = $_POST['sexo'];


$data = new stdClass();


			if ($presupuesto == $pres_ant && $estado == 1) {  

			# actualizacion del contrato sin modificacion del presupuesto estado activo

				require_once('conexion.php');
					$query = "
					UPDATE contratos
					SET 
						dir_rif = '$dir_rif',	
						reg_mercantil = '$reg_mercantil',	
						tip_ci = '$tip_ci',	
						cedula = '$cedula',	
						nombres = '$nombres',	
						apellidos = '$apellidos',	
						cargo = '$cargo',	
						fecha =  STR_TO_DATE('$fec_con', '%d-%m-%Y'),	
						estado= '$estado',
						tip_reg= '$tip_reg',
						sexo = '$sexo',
						nacionalidad = '$nacionalidad'
					WHERE cod_contrato = '$cod_con'";		

					if ($mysqli->query($query) === TRUE) {
						$data->result = 1; 	// actualizó
						$data->cod_con = $cod_con;
						// echo "Update datos de contratos";
					} else {
						$data->query = $query;
						$data->result = 2;	// no actualizó
						//echo "Error 1";
					}
					$mysqli->close();

			echo json_encode($data);

			}elseif($presupuesto != $pres_ant && $estado == 1){															
			
			# Eliminacion del contrato de la bd
			
			
			$update_contrato = 0;
			$update_ppto_act = 0;
			$update_ppto_ant = 0;
			$update_bien_ant = 0;
			$update_bien_act = 0;

				require_once('conexion.php');
					$query = "
					UPDATE contratos
					SET 
						presupuesto = '$presupuesto',	
						dir_rif = '$dir_rif',	
						reg_mercantil = '$reg_mercantil',	
						tip_ci = '$tip_ci',	
						cedula = '$cedula',	
						nombres = '$nombres',	
						apellidos = '$apellidos',	
						cargo = '$cargo',	
						fecha =  STR_TO_DATE('$fec_con', '%d-%m-%Y'),	
						estado= '$estado',
						tip_reg= '$tip_reg'

					WHERE cod_contrato = '$cod_con'";		

						if ($mysqli->query($query) === TRUE) {

							# Retener ppto

							require_once('conexion.php');
							$query = "UPDATE ppto_informacion
							SET 
							estatus='2'
							WHERE codigo='$presupuesto'";	

							$update_contrato =  1;	//1
							
								if ($mysqli->query($query) === TRUE) {


										$update_ppto_act =  1;

										# Liberar ppto 

										require_once('conexion.php');
										$query = "UPDATE ppto_informacion
										SET 
										estatus='1'
										WHERE codigo='$pres_ant'";

											if ($mysqli->query($query) === TRUE) {

												# liberar bienes del ppto anterior
												
												$update_ppto_ant =  1;

												$sql6 ="SELECT codigo, cod_bien 
												FROM ppto_detalles 
												WHERE codigo = '$pres_ant'";

												require_once("conexion.php");
												if($res = $mysqli->query($sql6)) {
													$row_cnt = mysqli_num_rows($res);
													if ($row_cnt> 0){
														while($row6 = $res->fetch_array()) {
															$cod_bien = $row6["cod_bien"] ;
															$quer6 = "UPDATE bienes
															SET 
															est = '1'
															WHERE cod='$cod_bien'";		

															if ($cod_bien != "") {
																if ($mysqli->query($quer6) === TRUE) {
																	//$data->result = 3;   //OK
											
																	$update_bien_ant =  1;
																} else {
																	$data->result = 4; 	 //ERROR
																}
																
															}

														}

													}	

												}

												# Bloquea bienes del nuevo ppto

												$sql8 ="SELECT codigo, cod_bien 
												FROM ppto_detalles 
												WHERE codigo = '$presupuesto'";

												require_once("conexion.php");
												if($res8 = $mysqli->query($sql8)) {
													$row_cnt8 = mysqli_num_rows($res8);
													if ($row_cnt8> 0){
														while($row8 = $res8->fetch_array()) {
															$cod_bien_d = $row8["cod_bien"] ;

															$quer9 = "UPDATE bienes
															SET 
															est = '2'
															WHERE cod='$cod_bien_d'";		

															if ($cod_bien_d != "") {
																if ($mysqli->query($quer9) === TRUE) {
																	//	$data->result = 3;   //OK
																	

																	$update_bien_act =  1;

																} else {
																	$data->result = 4; 	 //ERROR
																}
																
															}

														}

													}	

												}


											# Se valida que los pasos anteriores se realizaron correctamente!

											if ($update_contrato == 1 && $update_ppto_act == 1 && $update_ppto_ant == 1 && $update_bien_ant == 1 && $update_bien_act == 1 ) { 
												$data->result = 3;   //OK
												$data->estatus = 5;
												$data->cod_con = $cod_con;
											}else{
												$data->result = 4; 	 //ERROR
												$data->estatus = 0;
												$data->cod_con = $cod_con;
											}


											} else {
												$data->result = 5;  // ERROR
												// echo "Error 4";
											}

								} else {
									$data->result = 6;  // ERROR
									// echo "Error 5";
								}
								
						} else {
							$data->result = 7; // ERROR
							// echo "Error 6";
						}echo json_encode($data);

					}elseif ($estado == 0) {

					 #  Eliminacion del contrato 

					require_once('conexion.php');
					$query = "
					UPDATE contratos
					SET 
						-- presupuesto = '$presupuesto',	
						-- dir_rif = '$dir_rif',	
						-- reg_mercantil = '$reg_mercantil',	
						-- tip_ci = '$tip_ci',	
						-- cedula = '$cedula',	
						-- nombres = '$nombres',	
						-- apellidos = '$apellidos',	
						-- cargo = '$cargo',	
						-- fecha =  STR_TO_DATE('$fec_con', '%d-%m-%Y'),	
						estado= '$estado'
						-- tip_reg= '$tip_reg'

					WHERE cod_contrato = '$cod_con'";		

						if ($mysqli->query($query) === TRUE) {
	

							# liberar ppto

							require_once('conexion.php');
							$query = "UPDATE ppto_informacion
							SET 
							estatus='1'
							WHERE codigo='$pres_ant'";

								if ($mysqli->query($query) === TRUE) {

									# liberar bienes
									
									$sql6 ="SELECT codigo, cod_bien 
									FROM ppto_detalles 
									WHERE codigo = '$pres_ant'";

									require_once("conexion.php");
									if($res = $mysqli->query($sql6)) {
										$row_cnt = mysqli_num_rows($res);
										if ($row_cnt> 0){
											while($row6 = $res->fetch_array()) {
												$cod_bien = $row6["cod_bien"] ;
												$quer6 = "UPDATE bienes
												SET 
												est = '1'
												WHERE cod='$cod_bien'";		

												if ($cod_bien != "") {
													if ($mysqli->query($quer6) === TRUE) {
														$data->result = 8;  // OK
														$data->estado = $estado;
														$data->cod_con = $cod_con;
													} else {
														$data->result = 9; 	// ERROR
														$data->estado = $estado;
														$data->cod_con = $cod_con;

													}
													
												}

											}

										}	

									}


								} else {
									$data->result = 12;  // ERROR
									// echo "Error 4";
								}

								
						} else {
							$data->result = 13; // ERROR
							// echo "Error 6";
						}echo json_encode($data);


					}



}

?>