<?php 
session_start();

$user = $_POST['user'];
$password = md5($_POST['password']);

// $query="SELECT a.id, a.user, a.password, a.nvl_acc, a.nom_usr, a.ape_usr, a.ger_usr, a.est_usr, a.fec_ven 
// 		FROM project.usuarios as a WHERE a.user='$user'";
// $consulta = mysql_query ($query);
// if (mysql_num_rows($consulta)>0){
// $row=mysql_fetch_array($consulta);

$data = new stdClass();
require_once("conexion.php");
$query = "SELECT * FROM usuarios WHERE user='$user' ";


        if($resultado = $mysqli->query($query)) {
                $row_cnt = mysqli_num_rows($resultado);
                if ($row_cnt> 0){
                
                        while($row = $resultado->fetch_array()) {
                                if($row['password']==$password){

                                $fec_ven = $row['fec_ven'];
                                $estatus = $row['est_usr'];

                                if ($estatus=="1") {

                                $loc_dat = date("Y-m-d");
                                if($fec_ven > $loc_dat OR $fec_ven =='0000-00-00'){

                                $_SESSION['id_usr'] = $row['id'];
                                $_SESSION['user'] = $row['user'];
                                $_SESSION['niv_user'] = $row['nvl_acc'];

                                $_SESSION['nom_usr'] = $row['nom_usr'];
                                $_SESSION['ape_usr'] = $row['ape_usr'];
                                $_SESSION['ger_usr'] = $row['ger_usr'];


                                $data->result = 1;    		// OK - ACTIVO

                                }else{
                                $data->result = 6; 				// VENCIDO
                                }

                                }elseif ($estatus=="2") {
                                $data->result = 4; 					// INACTIVO
                                }elseif ($estatus=="3") {
                                $data->result = 5; 					// BLOQUEADO
                                }

                                }else{
                                $data->result = 2;					// PASS INCORRECTA
                                }
                        }$resultado->close();
                }else{
	        	$data->result = 3; 						// USUARIO NO EXISTE
                }
                $data->user =$user;
        }$mysqli->close();

echo json_encode($data);


?>