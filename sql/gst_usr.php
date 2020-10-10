<?php  
// $accion = $_POST['accion'];
$accion =  isset($_POST['accion']) ?  $_POST['accion'] :  $_GET['accion'];

	if ($accion=="save") {

	$ced = $_POST['ced'];
	$usr = $_POST['usr1'];
	$niv = $_POST['niv'];
	$nom = $_POST['nom'];
	$ape = $_POST['ape'];
	$fec = $_POST['fec'];
	$pas = md5($_POST['pas']);
	$est = $_POST['est'];

	include("conexion.php");

	$query ="
	INSERT INTO usuarios (user,password,nvl_acc,ced_usr,nom_usr,ape_usr,ger_usr,fec_reg,fec_ven,est_usr) 
	VALUES 
	('$usr','$pas','$niv','$ced','$nom','$ape','14',NOW(),STR_TO_DATE('$fec', '%d-%m-%Y'), '$est')";

	$data = new stdClass();

	    if ($mysqli->query($query) === TRUE) {

	    	$data->result = 1; //OK

	    } else {

			$error=$mysqli->errno;
			$data->result = 2;
			$data->error = $error;

	    } $mysqli->close();

	echo json_encode($data);
	}


	if ($accion=="update") {

		$ced = $_POST['ced'];
		$usr = $_POST['usr1'];
		$niv = $_POST['niv'];
		$nom = $_POST['nom'];
		$ape = $_POST['ape'];
		$fec = $_POST['fec'];
		$pas = md5($_POST['pas']);
		$est = $_POST['est'];


		require_once('conexion.php');
		$query = "UPDATE usuarios
		SET 
		password = '$pas',
		nvl_acc  = '$niv',
		fec_ven  = STR_TO_DATE('$fec', '%d-%m-%Y'),
		est_usr  = '$est'
		WHERE user='$usr'";		

		$data = new stdClass();		
		if ($mysqli->query($query) === TRUE) {
			$data->result = 3;
			$data->sql=$query;
		} else {
			$data->result = 4;
		}
		$mysqli->close();
		echo json_encode($data);
	}



	if ($accion=="list") {

		$searchTerm = $_GET['term'];
		require_once("conexion.php");
		$sql = "SELECT user FROM usuarios WHERE user LIKE '%$searchTerm%' AND (user !='root' AND user !='lasv') limit 5";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			$data = utf8_encode($row['user']);
			$datos[] = $data;
			}
				echo json_encode($datos);
		} else {
			echo "0 results";
		}$mysqli->close();
	}

	if ($accion=="con_usr") {
	$usr = $_POST['term'];
	require_once("conexion.php");
	$sql = "SELECT password,nvl_acc,ced_usr,nom_usr,ape_usr,date_format(fec_ven,'%d-%m-%Y') as fec_ven,est_usr
			FROM usuarios
			WHERE user = '$usr' AND (user !='root' AND user !='lasv')";
		$data = new stdClass();
		if($resultado = $mysqli->query($sql)) {
		while($row = $resultado->fetch_array()) {
				$data->result = 1;
				$data->pas = utf8_encode($row['password']);
				$data->niv = utf8_encode($row['nvl_acc']);
				$data->ced = utf8_encode($row['ced_usr']);
				$data->nom = utf8_encode($row['nom_usr']);
				$data->ape = utf8_encode($row['ape_usr']);
				$data->fec = utf8_encode($row['fec_ven']);
				$data->est = utf8_encode($row['est_usr']);
			}

		}else{
			$data->result = 2;
		}
		
		echo json_encode($data);
		$mysqli->close();
	}



if ($accion =="gen_tab") {
require_once("conexion.php");
$sql3="SELECT id, user, nvl_acc, est_usr FROM usuarios WHERE (user !='root' AND user !='lasv') ORDER BY id DESC ";
		if($resultado3 = $mysqli->query($sql3)) {
		$row_cnt = 1;
		$tabla = "";
		while($row3 = $resultado3->fetch_array()) {
		 if ($row3["nvl_acc"]==1) {
		 	$nivel = "Administrador";
		 }elseif ($row3["nvl_acc"]==2) {
		 	$nivel = "Gestor";
		 }elseif($row3["nvl_acc"]==3) {
		 	$nivel = "Operador";
		 }


		 if ($row3["est_usr"]==1) {
		 	$est = "Activo";
		 }elseif ($row3["est_usr"]==0) {
		 	$est = "Inactivo";
		 }

			$tabla.="<tr>";
			//$tabla.="<td>".$row_cnt++."</td>";
			$tabla.="<td>".$row3["id"]."</td>";
			$tabla.="<td><span id='pag".$row3["user"]."''>".$row3["user"]."</span></td>";	
			$tabla.="<td><span id='tip".$row3["user"]."''>".$nivel."</span></td>";
			$tabla.="<td><span id='fec".$row3["user"]."''>".$est."</span></td>";
			//$tabla.="<td><button type='button' class='btn btn-sm btn-primary edit' name='edit' value='".$row3['user']."'><span class='glyphicon glyphicon-edit'></span> Edit</button></td>";
			$tabla.="</tr>";

	        }

	    echo $tabla;
		}$mysqli->close();

}	 



if ($accion =="buscar_emp"){

$ced = $_POST['ced'];
	require_once("conexion_emp.php");
	$sql = "SELECT nombre, apellido
			FROM empleado
			WHERE cedula = '$ced'";
		$data = new stdClass();
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$data->result = 1;

				$result1= (utf8_encode($row['nombre']));
				$result2= (utf8_encode($row['apellido']));

				$data->nom = $result1;
				$data->ape = $result2;	
			}
		}else{

				$sql = "SELECT nombre, apellido
						FROM comision
						WHERE cedula = '$ced'";

					$result = $mysqli->query($sql);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {

							$data->result = 1;
							$result1= (utf8_encode($row['nombre']));
							$result2= (utf8_encode($row['apellido']));

							$data->nom = $result1;
							$data->ape = $result2;	
						}
					}else{
								$sql = "SELECT nombre, apellido
										FROM pasante
										WHERE cedula = '$ced'";
									$data = new stdClass();
									$result = $mysqli->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) {
											$data->result = 1;
											$result1= (utf8_encode($row['nombre']));
											$result2= (utf8_encode($row['apellido']));

											$data->nom = $result1;
											$data->ape = $result2;	
										}	
									}else{
											$sql = "SELECT nombre, apellido
													FROM hp
													WHERE cedula = '$ced'";
												$data = new stdClass();
												$result = $mysqli->query($sql);
												if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {
														$data->result = 1;
														$result1= (utf8_encode($row['nombre']));
														$result2= (utf8_encode($row['apellido']));

														$data->nom = $result1;
														$data->ape = $result2;	
													}
												}	



									}



					
					}





		}$mysqli->close();

echo json_encode($data);
}



?>